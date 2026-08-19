@extends('admin.layouts.app')

@section('content')
<div class="admin-header">
    <div style="display: flex; align-items: center; gap: 15px;">
        <a href="{{ route('admin.services.benefits.index', $slug) }}" class="btn-icon" style="text-decoration: none;">
            <i data-feather="arrow-left"></i>
        </a>
        <div>
            <h1>{{ isset($benefit) ? 'Edit Benefit Card' : 'Add New Benefit Card' }}</h1>
            <p>{{ isset($benefit) ? 'Update the details of the benefit card.' : 'Create a new benefit card for the services page.' }}</p>
        </div>
    </div>
</div>

<div class="admin-card" style="margin-top: 30px;">
    <form action="{{ isset($benefit) ? route('admin.services.benefits.update', [$slug, $benefit['id']]) : route('admin.services.benefits.store', $slug) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @if(isset($benefit))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $benefit['title'] ?? '') }}" required>
            @error('title') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $benefit['description'] ?? '') }}</textarea>
            @error('description') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <label for="icon_class" style="margin-bottom: 0;">Icon Code (SVG/HTML)</label>
                <button type="button" class="btn-ghost" style="padding: 4px 10px; font-size: 12px; border-radius: 4px; cursor: pointer;" onclick="openIconPicker()">Choose from Library</button>
            </div>
            <textarea name="icon_class" id="icon_class" class="form-control" rows="3" placeholder='e.g., <svg>...</svg> or <i class="fas fa-star"></i>'>{{ old('icon_class', $benefit['icon_class'] ?? '') }}</textarea>
            <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Provide raw SVG code or an icon class. If provided, this will be used instead of the image below.</small>
            @error('icon_class') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="icon">Icon Image (Fallback)</label>
            <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
            @if(isset($benefit) && !empty($benefit['icon']))
                <div style="margin-top: 10px; padding: 10px; background: rgba(255,255,255,0.05); display: inline-block; border-radius: 8px;">
                    <img src="{{ asset($benefit['icon']) }}" style="width: 40px; height: 40px; object-fit: contain;" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($benefit['icon'])), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($benefit['icon'])), PATHINFO_FILENAME)))) }}">
                </div>
                <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Leave empty to keep current image.</small>
            @endif
            @error('icon') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-gold">{{ isset($benefit) ? 'Update Benefit' : 'Save Benefit' }}</button>
            <a href="{{ route('admin.services.benefits.index', $slug) }}" class="btn btn-ghost" style="margin-left: 10px; text-decoration: none; padding: 12px 24px; border-radius: 8px;">Cancel</a>
        </div>
    </form>
</div>

<div id="iconPickerModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: #1B1B1D; padding: 20px; border-radius: 8px; border: 1px solid var(--gold); width: 400px; max-width: 90%;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; color: #fff; font-size: 18px;">Select an Icon</h3>
            <button type="button" onclick="closeIconPicker()" style="background: none; border: none; color: #fff; font-size: 24px; cursor: pointer;">&times;</button>
        </div>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; max-height: 300px; overflow-y: auto;" id="iconGrid">
            <!-- Icons will be injected here -->
        </div>
    </div>
</div>

<script>
const icons = [
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>'
];

function openIconPicker() {
    const modal = document.getElementById('iconPickerModal');
    const grid = document.getElementById('iconGrid');
    grid.innerHTML = '';
    
    icons.forEach(iconSvg => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.innerHTML = iconSvg;
        btn.style.cssText = 'background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; padding: 15px; color: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s;';
        
        btn.onmouseover = function() {
            this.style.borderColor = '#B0854A';
            this.style.color = '#B0854A';
        };
        btn.onmouseout = function() {
            this.style.borderColor = 'rgba(255,255,255,0.1)';
            this.style.color = '#fff';
        };
        btn.onclick = function() {
            document.getElementById('icon_class').value = iconSvg;
            closeIconPicker();
        };
        grid.appendChild(btn);
    });
    
    modal.style.display = 'flex';
}

function closeIconPicker() {
    document.getElementById('iconPickerModal').style.display = 'none';
}
</script>

<style>
.admin-card {
    background: #1B1B1D;
    border: 1px solid var(--gold-line);
    border-radius: var(--radius);
    padding: 30px;
}
.form-group {
    margin-bottom: 24px;
}
.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--muted);
}
.form-control {
    width: 100%;
    padding: 12px 16px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: #fff;
    font-family: inherit;
    font-size: 15px;
    transition: all 0.25s ease;
}
.form-control:focus {
    outline: none;
    border-color: var(--gold);
    background: rgba(255, 255, 255, 0.08);
}
textarea.form-control {
    resize: vertical;
}
.btn-gold {
    background: linear-gradient(90deg, #B0854A 0%, #E8C988 42%, #E4C982 58%, #BB9362 100%);
    background-size: 200% auto;
    color: #24201A;
    border: none;
    padding: 14px 30px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-gold:hover {
    background-position: right center;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(196, 155, 84, 0.3);
}
.btn-ghost {
    border: 1.5px solid rgba(250, 249, 246, 0.25);
    color: #fff;
    background: transparent;
    transition: all 0.25s ease;
}
.btn-ghost:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(250, 249, 246, 0.6);
}
.btn-icon {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: #fff;
    cursor: pointer;
    transition: all 0.2s ease;
}
.btn-icon:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: var(--gold);
    color: var(--gold);
}
</style>
@endsection
