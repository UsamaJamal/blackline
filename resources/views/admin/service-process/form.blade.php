@extends('admin.layouts.app')

@section('content')
<div class="admin-header">
    <div style="display: flex; align-items: center; gap: 15px;">
        <a href="{{ route('admin.services.process.index', $slug) }}" class="btn-icon" style="text-decoration: none;">
            <i data-feather="arrow-left"></i>
        </a>
        <div>
            <h1>{{ isset($processItem) ? 'Edit Process Step' : 'Add New Process Step' }}</h1>
            <p>{{ isset($processItem) ? 'Update the details of the timeline step.' : 'Create a new step for the process timeline.' }}</p>
        </div>
    </div>
</div>

<div class="admin-card" style="margin-top: 30px;">
    <form action="{{ isset($processItem) ? route('admin.services.process.update', [$slug, $processItem['id']]) : route('admin.services.process.store', $slug) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @if(isset($processItem))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Step Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $processItem['title'] ?? '') }}" required>
            @error('title') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $processItem['description'] ?? '') }}</textarea>
            @error('description') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="icon">Icon Image (SVG/PNG)</label>
            <input type="file" name="icon" id="icon" class="form-control" accept="image/*,.svg" {{ isset($processItem) ? '' : 'required' }}>
            @if(isset($processItem))
                <div style="margin-top: 10px; padding: 10px; background: rgba(255,255,255,0.05); display: inline-block; border-radius: 8px;">
                    <img src="{{ asset($processItem['icon']) }}" style="width: 40px; height: 40px; object-fit: contain; filter: invert(0.8);" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($processItem['icon'])), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($processItem['icon'])), PATHINFO_FILENAME)))) }}">
                </div>
                <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Leave empty to keep current icon.</small>
            @endif
            @error('icon') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-gold">{{ isset($processItem) ? 'Update Step' : 'Save Step' }}</button>
            <a href="{{ route('admin.services.process.index', $slug) }}" class="btn btn-ghost" style="margin-left: 10px; text-decoration: none; padding: 12px 24px; border-radius: 8px;">Cancel</a>
        </div>
    </form>
</div>

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
