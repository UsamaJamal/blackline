@extends('admin.layouts.app')

@section('content')
<div class="admin-header">
    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
        <a href="{{ route('admin.services.index') }}" class="btn-icon" style="text-decoration: none;">
            <i data-feather="arrow-left"></i>
        </a>
        <div>
            <h1 style="font-size: 24px; font-weight: 700;">Edit Service Page: <span style="color: var(--gold);">{{ $slug }}</span></h1>
            <p>Configure the layout and sections of this service page.</p>
        </div>
    </div>
</div>

<div style="margin-bottom: 30px; display: flex; gap: 15px; flex-wrap: wrap;">
    <a href="{{ route('admin.services.hero', $slug) }}" class="btn-gold" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="layout"></i> Hero Section
    </a>
    <a href="{{ route('admin.services.overview', $slug) }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="file-text"></i> Overview Section
    </a>
    <a href="{{ route('admin.services.benefits.index', $slug) }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="grid"></i> Benefits Section
    </a>
    <a href="{{ route('admin.services.process.index', $slug) }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="clock"></i> Process Section
    </a>
    <a href="{{ route('admin.services.pricing.index', $slug) }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="dollar-sign"></i> Pricing Section
    </a>
    <a href="{{ route('admin.services.seo', $slug) }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="search"></i> SEO Settings
    </a>
</div>

@if (session('success'))
<div class="alert" style="background: rgba(76, 175, 80, 0.1); border: 1px solid #4CAF50; color: #4CAF50; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

<div class="admin-card">
    <form action="{{ route('admin.services.hero.update', $slug) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf

        <div class="form-group">
            <label for="small_text">Badge</label>
            <input type="text" name="small_text" id="small_text" class="form-control" value="{{ old('small_text', $heroSettings['small_text'] ?? '') }}" required>
            @error('small_text') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="heading">Main Heading</label>
            <input type="text" name="heading" id="heading" class="form-control" value="{{ old('heading', $heroSettings['heading'] ?? '') }}" required>
            @error('heading') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="btn_text">Button Text</label>
            <input type="text" name="btn_text" id="btn_text" class="form-control" value="{{ old('btn_text', $heroSettings['btn_text'] ?? '') }}" required>
            @error('btn_text') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>
        
        <div class="form-group">
            <label for="btn_link">Button Link (URL or #id)</label>
            <input type="text" name="btn_link" id="btn_link" class="form-control" value="{{ old('btn_link', $heroSettings['btn_link'] ?? '') }}" required>
            @error('btn_link') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="image">Background Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg, image/webp">
            @if(!empty($heroSettings['image']))
                <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Current Image: {{ $heroSettings['image'] }}</small>
                <div style="margin-top: 10px; max-width: 300px; border-radius: 8px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
                    <img src="{{ asset($heroSettings['image']) }}" style="width: 100%; display: block;" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($heroSettings['image'])), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($heroSettings['image'])), PATHINFO_FILENAME)))) }}">
                </div>
            @endif
            @error('image') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-gold">Save Settings</button>
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
