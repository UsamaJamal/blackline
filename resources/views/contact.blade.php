<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Contact Us — Black Line Marketing' }}</title>
<meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Get in touch with Black Line Marketing.' }}">
<meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'contact, black line marketing' }}">
<link rel="canonical" href="{{ url()->
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Contact Us — Black Line Marketing' }}">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Get in touch with Black Line Marketing.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Contact Us — Black Line Marketing' }}">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Get in touch with Black Line Marketing.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
@php
  $settingsData = \App\Models\Setting::whereIn('key', [
      'contact_phone',
      'contact_email',
      'contact_address',
      'contact_facebook',
      'contact_twitter',
      'contact_instagram',
      'contact_youtube'
  ])->pluck('value', 'key');
  
  $contact_phone = isset($settingsData['contact_phone']) ? json_decode($settingsData['contact_phone']) : '1800-518-9441';
  $contact_email = isset($settingsData['contact_email']) ? json_decode($settingsData['contact_email']) : 'support@myboxpackaging.com';
  $contact_address = isset($settingsData['contact_address']) ? json_decode($settingsData['contact_address']) : "132 Dartmouth Street Boston,\nMassachusetts 02156 United States";
  
  $contact_facebook = isset($settingsData['contact_facebook']) ? json_decode($settingsData['contact_facebook']) : '#';
  $contact_twitter = isset($settingsData['contact_twitter']) ? json_decode($settingsData['contact_twitter']) : '#';
  $contact_instagram = isset($settingsData['contact_instagram']) ? json_decode($settingsData['contact_instagram']) : '#';
  $contact_youtube = isset($settingsData['contact_youtube']) ? json_decode($settingsData['contact_youtube']) : '#';
@endphp

<body class="contact-page">

@include('components.header')

<main class="contact-main">
  <div class="container">
    <div class="contact-card">
      <div class="contact-glow"></div>
      
      <div class="contact-info">
        <h2>Get In Touch</h2>
        <p class="sub">Say something to start a live chat!</p>
        
        <ul class="contact-details">
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <span>{{ $contact_phone }}</span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <span>{{ $contact_email }}</span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>{!! nl2br(e($contact_address)) !!}</span>
          </li>
        </ul>
        
        <div class="socials">
          @if($contact_facebook)
          <a href="{{ $contact_facebook }}" target="_blank" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
          @endif
          @if($contact_twitter)
          <a href="{{ $contact_twitter }}" target="_blank" aria-label="Twitter"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg></a>
          @endif
          @if($contact_instagram)
          <a href="{{ $contact_instagram }}" target="_blank" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
          @endif
          @if($contact_youtube)
          <a href="{{ $contact_youtube }}" target="_blank" aria-label="YouTube"><svg viewBox="0 0 576 512" fill="currentColor"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg></a>
          @endif
        </div>
      </div>
      
      <form class="contact-form" onsubmit="return false;">
        <div class="form-row">
          <div class="input-group">
            <label for="first_name">First Name *</label>
            <input type="text" id="first_name" name="first_name" placeholder="Name" required>
          </div>
          <div class="input-group">
            <label for="last_name">Last Name *</label>
            <input type="text" id="last_name" name="last_name" placeholder="Name" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="input-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="input-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Number">
          </div>
        </div>
        
        <div class="input-group">
          <label for="company">Company Name *</label>
          <input type="text" id="company" name="company" placeholder="Your company name" required>
        </div>
        
        <div class="input-group select-group">
          <label for="interest">Area of Interest *</label>
          <select id="interest" name="interest" required>
            <option value="" disabled selected>Service you are looking for</option>
            <option value="marketing">Marketing</option>
            <option value="branding">Branding</option>
            <option value="development">Development</option>
          </select>
          <svg class="sel-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
        
        <div class="input-group">
          <label for="details">Project Details *</label>
          <textarea id="details" name="details" placeholder="" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-gold btn-submit">Submit</button>
      </form>
    </div>
    
    <div class="map-container">
      <iframe class="map-img" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=132+Dartmouth+Street+Boston,+Massachusetts+02156+United+States&t=&z=14&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
  </div>
</main>

@include('components.footer')
<script src="{{ asset('js/home.js') }}"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const noNumbersFields = ['first_name', 'last_name', 'company', 'details'];
    noNumbersFields.forEach(function(id) {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('input', function() {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });
        }
    });

    const phoneEl = document.getElementById('phone');
    if (phoneEl) {
        phoneEl.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }
  });
</script>
</body>
</html>
