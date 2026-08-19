@extends('admin.layouts.app')

@section('content')
<div class="admin-header">
    <h1>{{ isset($item) ? 'Edit Project' : 'Add New Project' }}</h1>
    <p>{{ isset($item) ? 'Modify the details of your portfolio project.' : 'Create a new project to showcase on your portfolio page.' }}</p>
</div>

<div class="admin-card">
    <form action="{{ isset($item) ? route('admin.portfolio.items.update', $item->id) : route('admin.portfolio.items.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @if(isset($item))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
            @error('title') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                @foreach(\App\Models\PortfolioItem::$categories as $slug => $label)
                    <option value="{{ $slug }}" {{ old('category', $item->category ?? 'web-development') === $slug ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Which category card this project appears under on the portfolio page.</small>
            @error('category') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="industry">Industry / Tag (e.g. fashion, real-estate, beauty, saas)</label>
            <input type="text" name="industry" id="industry" class="form-control" value="{{ old('industry', $item->industry ?? '') }}" placeholder="e.g. fashion" required>
            <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Used as a sub-filter inside the category on the portfolio page.</small>
            @error('industry') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Short Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $item->description ?? '') }}</textarea>
            @error('description') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="btn_text">Button Text</label>
            <input type="text" name="btn_text" id="btn_text" class="form-control" value="{{ old('btn_text', $item->btn_text ?? 'View Work') }}" required>
            @error('btn_text') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="btn_link">Button Link (URL)</label>
            <input type="text" name="btn_link" id="btn_link" class="form-control" value="{{ old('btn_link', $item->btn_link ?? '#') }}">
            @error('btn_link') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="image">Project Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" {{ isset($item) ? '' : 'required' }}>
            @if(isset($item) && !empty($item->image))
            <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Current Image: 
                <a href="{{ asset($item->image) }}" target="_blank" style="color: var(--gold); text-decoration: underline;">View Current Image</a>
            </small>
            @endif
            @error('image') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 30px; display: flex; gap: 15px;">
            <button type="submit" class="btn btn-gold">{{ isset($item) ? 'Update Project' : 'Save Project' }}</button>
            <a href="{{ route('admin.portfolio.items.index') }}" class="btn btn-ghost" style="text-decoration: none; padding: 14px 30px; border-radius: 8px; font-weight: 700; font-size: 15px; text-align: center;">Cancel</a>
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
</style>
@endsection
