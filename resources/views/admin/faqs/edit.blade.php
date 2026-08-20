@extends('admin.layouts.app')

@section('content')
<div class="admin-header" style="margin-bottom: 30px;">
    <a href="{{ route('admin.faqs.index') }}" style="color: var(--muted); text-decoration: none; display: inline-flex; align-items: center; gap: 5px; margin-bottom: 10px; font-size: 14px;">
        <i data-feather="arrow-left" style="width: 14px; height: 14px;"></i> Back to FAQs
    </a>
    <h1>Edit FAQ</h1>
</div>

<div class="admin-card">
    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="question">Question <span style="color: #F44336;">*</span></label>
            <input type="text" name="question" id="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
            @error('question') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="answer">Answer <span style="color: #F44336;">*</span></label>
            <textarea name="answer" id="answer" class="form-control" rows="5">{{ old('answer', $faq->answer) }}</textarea>
            @error('answer') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category">Category (Optional)</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $faq->category) }}" placeholder="e.g. Pricing, Process, Timelines">
            <small style="color: var(--muted); font-size: 12px; display: block; margin-top: 5px;">This groups the FAQ on the main FAQ page.</small>
            @error('category') <span class="error" style="color: #F44336; font-size: 13px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group" style="margin-top: 30px;">
            <label style="margin-bottom: 15px; display: block; color: var(--gold);">Assign to Specific Pages (Optional)</label>
            <p style="color: var(--muted); font-size: 13px; margin-bottom: 15px;">Check the boxes below if you want this FAQ to appear at the bottom of these specific pages.</p>
            
            @php
                $assignedPages = is_array($faq->pages) ? $faq->pages : [];
            @endphp

            <div style="display: flex; flex-direction: column; gap: 10px;">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="checkbox" name="pages[]" value="services" {{ (is_array(old('pages')) && in_array('services', old('pages'))) || in_array('services', $assignedPages) ? 'checked' : '' }}>
                    All Services Pages
                </label>
                @foreach(\App\Models\Service::all() as $service)
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; margin-left: 20px;">
                    <input type="checkbox" name="pages[]" value="services/{{ $service->slug }}" {{ (is_array(old('pages')) && in_array('services/'.$service->slug, old('pages'))) || in_array('services/'.$service->slug, $assignedPages) ? 'checked' : '' }}>
                    Service: {{ $service->title }}
                </label>
                @endforeach
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="checkbox" name="pages[]" value="case-study" {{ (is_array(old('pages')) && in_array('case-study', old('pages'))) || in_array('case-study', $assignedPages) ? 'checked' : '' }}>
                    Case Study Page
                </label>
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="checkbox" name="pages[]" value="portfolio" {{ (is_array(old('pages')) && in_array('portfolio', old('pages'))) || in_array('portfolio', $assignedPages) ? 'checked' : '' }}>
                    Portfolio Page
                </label>
            </div>
            @error('pages') <span class="error" style="color: #F44336; font-size: 13px; margin-top: 10px; display: block;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);">
            <button type="submit" class="btn btn-gold">Update FAQ</button>
        </div>
    </form>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#answer' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<style>
    /* Dark mode adjustments for CKEditor */
    .ck.ck-editor__main>.ck-editor__editable {
        background: #1a1a1a !important;
        border-color: rgba(255,255,255,0.1) !important;
        color: #fff !important;
        min-height: 200px;
    }
    .ck.ck-toolbar {
        background: #2a2a2a !important;
        border-color: rgba(255,255,255,0.1) !important;
    }
    .ck.ck-toolbar .ck-button {
        color: #fff !important;
    }
    .ck.ck-toolbar .ck-button:hover {
        background: rgba(255,255,255,0.1) !important;
    }
    .ck.ck-toolbar .ck-button.ck-on {
        background: rgba(229, 202, 131, 0.2) !important;
        color: var(--gold) !important;
    }
</style>
@endsection
