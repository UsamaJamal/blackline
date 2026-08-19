@extends('admin.layouts.app')

@php
    $isEdit = isset($feedback);
@endphp

@section('content')
<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center;">
    <div>
        <h1>{{ $isEdit ? 'Edit Feedback' : 'Add New Feedback' }}</h1>
        <p>{{ $isEdit ? 'Update the details for this testimonial.' : 'Create a new dynamic feedback card.' }}</p>
    </div>
    <a href="{{ route('admin.feedbacks.index') }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px;">
        Cancel &amp; Go Back
    </a>
</div>

<div class="admin-card">
    <form action="{{ $isEdit ? route('admin.feedbacks.update', $feedback['id']) : route('admin.feedbacks.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="form-row">
            <div class="form-group" style="flex: 1;">
                <label for="name">Name (e.g. John Carter)</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $isEdit ? $feedback['name'] : '') }}" required>
                @error('name') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label for="role">Designation / Role (e.g. Creative Director at VERBAND)</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $isEdit ? $feedback['role'] : '') }}" required>
                @error('role') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="description">Feedback / Quote Text</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $isEdit ? $feedback['description'] : '') }}</textarea>
            @error('description') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-row">
            <div class="form-group" style="flex: 1;">
                <label for="logo">Brand Logo / Badge Image (PNG/JPG)</label>
                <input type="file" name="logo" id="logo" class="form-control" accept="image/*" {{ $isEdit ? '' : 'required' }}>
                @if($isEdit && isset($feedback['logo']))
                    <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Current Logo: <img src="{{ asset($feedback['logo']) }}" style="height: 20px; vertical-align: middle; background: #fff; padding: 2px; border-radius: 2px;" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($feedback['logo'])), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($feedback['logo'])), PATHINFO_FILENAME)))) }}"></small>
                @endif
                @error('logo') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label for="video">Background Video (MP4)</label>
                <input type="file" name="video" id="video" class="form-control" accept="video/mp4,video/x-m4v,video/*" {{ $isEdit ? '' : 'required' }}>
                @if($isEdit && isset($feedback['video']))
                    <small style="color: var(--muted); font-size: 13px; display: block; margin-top: 6px;">Current Video: {{ basename($feedback['video']) }}</small>
                @endif
                @error('video') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn-gold">{{ $isEdit ? 'Update Feedback' : 'Save New Feedback' }}</button>
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
.form-row {
    display: flex;
    gap: 24px;
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
@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
        gap: 0;
    }
}
</style>
@endsection
