@extends('admin.layouts.app')

@section('content')
<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h1>Portfolio Settings</h1>
        <p>Manage the dynamic sections and projects on the portfolio page.</p>
    </div>
    <a href="{{ route('admin.portfolio.items.create') }}" class="btn-gold" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="plus"></i> Add Project
    </a>
</div>

<div style="margin-bottom: 30px; display: flex; gap: 15px;">
    <a href="{{ route('admin.portfolio.items.index') }}" class="btn-gold" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="image"></i> Portfolio Projects
    </a>
    <a href="{{ route('admin.portfolio-hero') }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="layout"></i> Hero Section
    </a>
</div>

@if (session('success'))
<div class="alert" style="background: rgba(76, 175, 80, 0.1); border: 1px solid #4CAF50; color: #4CAF50; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Industry</th>
                    <th>Button</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" title="{{ $item->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    </td>
                    <td>
                        <strong style="color: #fff; font-size: 16px;">{{ $item->title }}</strong>
                        <p style="color: var(--muted); font-size: 13px; margin: 4px 0 0;">{{ Str::limit($item->description, 70) }}</p>
                    </td>
                    <td>
                        <span class="badge" style="background: rgba(229, 202, 131, 0.15); color: var(--gold); border: 1px solid rgba(229, 202, 131, 0.3); padding: 4px 10px; border-radius: 99px; font-size: 12px; font-weight: 600; text-transform: uppercase;">
                            {{ $item->industry }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ $item->btn_link }}" target="_blank" style="color: var(--gold); font-size: 14px; text-decoration: underline;">
                            {{ $item->btn_text }}
                        </a>
                    </td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('admin.portfolio.items.edit', $item->id) }}" class="btn btn-sm btn-ghost" style="padding: 8px 12px; font-size: 13px; text-decoration: none;">
                                Edit
                            </a>
                            <form action="{{ route('admin.portfolio.items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-ghost" style="padding: 8px 12px; font-size: 13px; border-color: rgba(244, 67, 54, 0.4); color: #F44336; background: rgba(244, 67, 54, 0.05);">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--muted); padding: 40px 0;">
                        No portfolio projects found. Click "Add Project" to add one!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
.admin-card {
    background: #1B1B1D;
    border: 1px solid var(--gold-line);
    border-radius: var(--radius);
    padding: 30px;
}
.btn-gold {
    background: linear-gradient(90deg, #B0854A 0%, #E8C988 42%, #E4C982 58%, #BB9362 100%);
    background-size: 200% auto;
    color: #24201A;
    border: none;
    padding: 12px 24px;
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
