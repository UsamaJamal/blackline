@extends('admin.layouts.app')

@section('content')
<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center;">
    <div>
        <h1>Feedbacks (Testimonials)</h1>
        <p>Manage the dynamic testimonial cards shown in the feedback section on the homepage.</p>
    </div>
    <a href="{{ route('admin.feedbacks.create') }}" class="btn-gold" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="plus"></i> Add New Feedback
    </a>
</div>

<div style="margin-bottom: 30px; display: flex; gap: 15px;">
    <a href="{{ route('admin.home-hero') }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="layout"></i> Hero Section
    </a>
    <a href="{{ route('admin.case-studies.index') }}" class="btn-ghost" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="video"></i> Case Study Videos
    </a>
    <a href="{{ route('admin.feedbacks.index') }}" class="btn-gold" style="text-decoration: none; padding: 12px 24px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
        <i data-feather="message-square"></i> Feedbacks
    </a>
</div>

@if (session('success'))
<div class="alert" style="background: rgba(76, 175, 80, 0.1); border: 1px solid #4CAF50; color: #4CAF50; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

@if (session('error') || $errors->any())
<div class="alert" style="background: rgba(244, 67, 54, 0.1); border: 1px solid #F44336; color: #F44336; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    {{ session('error') ?? $errors->first() }}
</div>
@endif

<div class="admin-card" style="padding: 0; overflow: hidden;">
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="border-bottom: 1px solid var(--gold-line); background: rgba(255,255,255,0.02);">
                <th style="padding: 18px 24px; font-weight: 600; color: var(--muted);">Name & Role</th>
                <th style="padding: 18px 24px; font-weight: 600; color: var(--muted);">Logo</th>
                <th style="padding: 18px 24px; font-weight: 600; color: var(--muted);">Video</th>
                <th style="padding: 18px 24px; font-weight: 600; color: var(--muted); text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($feedbacks as $feedback)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                <td style="padding: 18px 24px;">
                    <strong style="display: block; font-size: 15px;">{{ $feedback['name'] }}</strong>
                    <span style="color: var(--gold); font-size: 13px;">{{ $feedback['role'] }}</span>
                </td>
                <td style="padding: 18px 24px;">
                    <img src="{{ asset($feedback['logo']) }}" style="height: 30px; border-radius: 4px; background: #fff; padding: 4px;" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($feedback['logo'])), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($feedback['logo'])), PATHINFO_FILENAME)))) }}">
                </td>
                <td style="padding: 18px 24px; font-size: 14px; color: var(--muted-2);">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i data-feather="film" style="width: 16px; height: 16px;"></i>
                        {{ basename($feedback['video']) }}
                    </div>
                </td>
                <td style="padding: 18px 24px; text-align: right;">
                    <div style="display: inline-flex; gap: 10px;">
                        <a href="{{ route('admin.feedbacks.edit', $feedback['id']) }}" class="action-btn edit-btn" title="Edit">
                            <i data-feather="edit-2"></i>
                        </a>
                        <form action="{{ route('admin.feedbacks.destroy', $feedback['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feedback?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn" title="Delete">
                                <i data-feather="trash-2"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="padding: 30px; text-align: center; color: var(--muted);">
                    No feedbacks found. Click "Add New Feedback" to get started.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
.admin-card {
    background: #1B1B1D;
    border: 1px solid var(--gold-line);
    border-radius: var(--radius);
}
.btn-gold {
    background: linear-gradient(90deg, #B0854A 0%, #E8C988 42%, #E4C982 58%, #BB9362 100%);
    background-size: 200% auto;
    color: #24201A;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14.5px;
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
.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    background: rgba(255, 255, 255, 0.05);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.1);
    cursor: pointer;
}
.action-btn i, .action-btn svg {
    width: 16px;
    height: 16px;
}
.action-btn.edit-btn:hover {
    background: rgba(229, 202, 131, 0.15);
    color: var(--gold);
    border-color: var(--gold);
}
.action-btn.delete-btn:hover {
    background: rgba(244, 67, 54, 0.15);
    color: #F44336;
    border-color: #F44336;
}
</style>
@endsection
