@extends('admin.layouts.app')

@section('content')
<div class="admin-header">
    <div style="display: flex; align-items: center; gap: 15px;">
        <a href="{{ route('admin.services.pricing.index', $slug) }}" class="btn-icon" style="text-decoration: none;">
            <i data-feather="arrow-left"></i>
        </a>
        <div>
            <h1>{{ isset($plan) ? 'Edit Pricing Plan' : 'Add New Pricing Plan' }}</h1>
            <p>{{ isset($plan) ? 'Update the details of the pricing plan.' : 'Create a new plan for the pricing section.' }}</p>
        </div>
    </div>
</div>

<div class="admin-card" style="margin-top: 30px;">
    <form action="{{ isset($plan) ? route('admin.services.pricing.update', [$slug, $plan['id']]) : route('admin.services.pricing.store', $slug) }}" method="POST" class="admin-form">
        @csrf
        @if(isset($plan))
            @method('PUT')
        @endif

        <div style="display: flex; gap: 15px;">
            <div class="form-group" style="flex: 1;">
                <label for="name">Plan Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $plan['name'] ?? '') }}" required>
                @error('name') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>


        </div>

        <div class="form-group">
            <label for="description">Plan Description</label>
            <textarea name="description" id="description" class="form-control" rows="2" required>{{ old('description', $plan['description'] ?? '') }}</textarea>
            @error('description') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 15px;">
            <div class="form-group" style="flex: 1;">
                <label for="price">Price (e.g. 4,500)</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $plan['price'] ?? '') }}" required>
                @error('price') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label for="price_small">Price Small Text (e.g. /month)</label>
                <input type="text" name="price_small" id="price_small" class="form-control" value="{{ old('price_small', $plan['price_small'] ?? '') }}">
                @error('price_small') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: flex; gap: 15px;">
            <div class="form-group" style="flex: 1;">
                <label for="btn_text">Button Text</label>
                <input type="text" name="btn_text" id="btn_text" class="form-control" value="{{ old('btn_text', $plan['btn_text'] ?? '') }}" required>
                @error('btn_text') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label for="btn_link">Button Link</label>
                <input type="text" name="btn_link" id="btn_link" class="form-control" value="{{ old('btn_link', $plan['btn_link'] ?? '') }}" required>
                @error('btn_link') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="bullets">Features List (Press enter for the next line)</label>
            <textarea name="bullets" id="bullets" class="form-control" rows="8" required>{{ old('bullets', $plan['bullets'] ?? '') }}</textarea>
            @error('bullets') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="best_for">Best For (Optional, HTML allowed like &lt;br&gt; and &amp;nbsp;)</label>
            <textarea name="best_for" id="best_for" class="form-control" rows="3">{{ old('best_for', $plan['best_for'] ?? '') }}</textarea>
            @error('best_for') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-gold">{{ isset($plan) ? 'Update Plan' : 'Save Plan' }}</button>
            <a href="{{ route('admin.services.pricing.index', $slug) }}" class="btn btn-ghost" style="margin-left: 10px; text-decoration: none; padding: 12px 24px; border-radius: 8px;">Cancel</a>
        </div>
    </form>
</div>

<style>
.admin-card { background: #1B1B1D; border: 1px solid var(--gold-line); border-radius: var(--radius); padding: 30px; }
.form-group { margin-bottom: 24px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: 500; color: var(--muted); }
.form-control { width: 100%; padding: 12px 16px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; font-family: inherit; font-size: 15px; transition: all 0.25s ease; }
.form-control:focus { outline: none; border-color: var(--gold); background: rgba(255, 255, 255, 0.08); }
textarea.form-control { resize: vertical; }
.btn-gold { background: linear-gradient(90deg, #B0854A 0%, #E8C988 42%, #E4C982 58%, #BB9362 100%); background-size: 200% auto; color: #24201A; border: none; padding: 14px 30px; border-radius: 8px; font-weight: 700; font-size: 15px; cursor: pointer; transition: all 0.3s ease; }
.btn-gold:hover { background-position: right center; transform: translateY(-2px); box-shadow: 0 10px 20px rgba(196, 155, 84, 0.3); }
.btn-ghost { border: 1.5px solid rgba(250, 249, 246, 0.25); color: #fff; background: transparent; transition: all 0.25s ease; padding: 12px 24px; border-radius: 8px;}
.btn-ghost:hover { background: rgba(255, 255, 255, 0.1); border-color: rgba(250, 249, 246, 0.6); }
.btn-icon { width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; cursor: pointer; transition: all 0.2s ease; }
.btn-icon:hover { background: rgba(255, 255, 255, 0.1); border-color: var(--gold); color: var(--gold); }
</style>
@endsection
