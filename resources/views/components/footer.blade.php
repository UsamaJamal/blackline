@php
  $settingsData = \App\Models\Setting::whereIn('key', [
      'contact_phone',
      'contact_email',
      'contact_address',
      'contact_facebook',
      'contact_twitter',
      'contact_instagram',
      'contact_youtube',
      'contact_linkedin',
      'footer_description',
      'footer_useful_links',
      'footer_facebook',
      'footer_twitter',
      'footer_instagram',
      'footer_youtube',
      'footer_linkedin'
  ])->pluck('value', 'key');
  
  $contact_phone = isset($settingsData['contact_phone']) ? json_decode($settingsData['contact_phone']) : '+1 (234) 555-1234';
  $contact_email = isset($settingsData['contact_email']) ? json_decode($settingsData['contact_email']) : 'hello@blackline.co';
  $contact_address = isset($settingsData['contact_address']) ? json_decode($settingsData['contact_address']) : "123 Creative Ave,\nNew York, NY 10001";
  
  // Use footer specific social links if available, fallback to contact links
  $contact_facebook = isset($settingsData['footer_facebook']) && json_decode($settingsData['footer_facebook']) ? json_decode($settingsData['footer_facebook']) : (isset($settingsData['contact_facebook']) ? json_decode($settingsData['contact_facebook']) : '#');
  $contact_twitter = isset($settingsData['footer_twitter']) && json_decode($settingsData['footer_twitter']) ? json_decode($settingsData['footer_twitter']) : (isset($settingsData['contact_twitter']) ? json_decode($settingsData['contact_twitter']) : '#');
  $contact_instagram = isset($settingsData['footer_instagram']) && json_decode($settingsData['footer_instagram']) ? json_decode($settingsData['footer_instagram']) : (isset($settingsData['contact_instagram']) ? json_decode($settingsData['contact_instagram']) : '#');
  $contact_youtube = isset($settingsData['footer_youtube']) && json_decode($settingsData['footer_youtube']) ? json_decode($settingsData['footer_youtube']) : (isset($settingsData['contact_youtube']) ? json_decode($settingsData['contact_youtube']) : '#');
  $contact_linkedin = isset($settingsData['footer_linkedin']) && json_decode($settingsData['footer_linkedin']) ? json_decode($settingsData['footer_linkedin']) : (isset($settingsData['contact_linkedin']) ? json_decode($settingsData['contact_linkedin']) : '#');

  $footer_description = isset($settingsData['footer_description']) && json_decode($settingsData['footer_description']) ? json_decode($settingsData['footer_description']) : 'Transforming ambitious brands into cultural icons. Based in New York, serving the world. Transforming ambitious brands into cultural icons. Based in New York, serving the world.';
  
  $footer_useful_links = isset($settingsData['footer_useful_links']) ? json_decode($settingsData['footer_useful_links'], true) : [];
  
  $footer_services = \App\Models\Service::where('show_in_footer', true)->get();
@endphp

<footer class="site-footer">
  <!-- ============ NEWSLETTER ============ -->
  <section class="newsletter">
    <div class="container news-grid">
      <h2>Sign up for exclusive offers and updates!</h2>
      <form class="news-form" onsubmit="return false;">
        <input type="email" placeholder="Email" aria-label="Email" required>
        <button type="submit" class="btn btn-gold">Subscribe</button>
      </form>
    </div>
  </section>
  <div class="container foot-grid">
    <div class="foot-brand">
      <img class="foot-logo" src="{{ asset('images/logo.png') }}" alt="logo" title="Logo">
      <p>{{ $footer_description }}</p>
      <div class="socials">
        @if($contact_facebook && $contact_facebook !== '#')
        <a href="{{ $contact_facebook }}" target="_blank" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5h1.65V3.6c-.3 0-1.3-.1-2.45-.1-2.4 0-4.05 1.47-4.05 4.17V9.9H7.5V13h2.7v8z"/></svg></a>
        @endif
        @if($contact_twitter && $contact_twitter !== '#')
        <a href="{{ $contact_twitter }}" target="_blank" aria-label="Twitter"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M21 6.1c-.66.3-1.37.5-2.11.59a3.68 3.68 0 0 0 1.62-2.03c-.71.42-1.5.73-2.34.9a3.67 3.67 0 0 0-6.35 2.51c0 .29.03.57.09.84A10.42 10.42 0 0 1 4.34 5.1a3.67 3.67 0 0 0 1.14 4.9c-.6-.02-1.17-.19-1.66-.46v.05a3.68 3.68 0 0 0 2.95 3.6c-.3.08-.6.12-.93.12-.23 0-.45-.02-.66-.06a3.68 3.68 0 0 0 3.43 2.55A7.37 7.37 0 0 1 3 17.3a10.39 10.39 0 0 0 5.62 1.65c6.75 0 10.44-5.6 10.44-10.44v-.48c.72-.52 1.34-1.16 1.83-1.9z"/></svg></a>
        @endif
        @if($contact_instagram && $contact_instagram !== '#')
        <a href="{{ $contact_instagram }}" target="_blank" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><rect x="4" y="4" width="16" height="16" rx="5"/><circle cx="12" cy="12" r="3.6"/><circle cx="16.9" cy="7.1" r="1.1" fill="currentColor" stroke="none"/></svg></a>
        @endif
        @if($contact_linkedin && $contact_linkedin !== '#')
        <a href="{{ $contact_linkedin }}" target="_blank" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.94 8.5H4.3V20h2.64zM5.62 4a1.55 1.55 0 1 0 0 3.1 1.55 1.55 0 0 0 0-3.1M20 13.6c0-3.05-1.63-4.47-3.8-4.47-1.75 0-2.54.96-2.98 1.64V9.35h-2.64V20h2.64v-5.95c0-1.57.3-3.09 2.24-3.09s1.9 1.79 1.9 3.19V20H20z"/></svg></a>
        @endif
        @if($contact_youtube && $contact_youtube !== '#')
        <a href="{{ $contact_youtube }}" target="_blank" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.6 7.9a2.5 2.5 0 0 0-1.76-1.77C18.28 5.7 12 5.7 12 5.7s-6.28 0-7.84.43A2.5 2.5 0 0 0 2.4 7.9C2 9.47 2 12 2 12s0 2.53.4 4.1a2.5 2.5 0 0 0 1.76 1.77c1.56.43 7.84.43 7.84.43s6.28 0 7.84-.43a2.5 2.5 0 0 0 1.76-1.77C22 14.53 22 12 22 12s0-2.53-.4-4.1M10 15.1V8.9l5.2 3.1z"/></svg></a>
        @endif
      </div>
    </div>

    <div class="foot-col">
      <h4>Useful Links</h4>
      <ul>
        @if(!empty($footer_useful_links))
          @foreach($footer_useful_links as $link)
            <li><a href="{{ $link['url'] ?? '#' }}">{{ $link['title'] ?? '' }}</a></li>
          @endforeach
        @else
          <li><a href="{{ route('contact') }}">Contact us</a></li>
          <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
          <li><a href="{{ route('blogs') }}">Blogs</a></li>
          <li><a href="{{ route('faqs') }}">FAQ's</a></li>
          
        @endif
      </ul>
    </div>

    <div class="foot-col">
      <h4>Services</h4>
      <ul>
        @if($footer_services->count() > 0)
          @foreach($footer_services as $service)
            <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
          @endforeach
        @else
          <li><a href="#">Digital Marketing</a></li>
          <li><a href="#">Website Development</a></li>
          <li><a href="#">Social Media Management</a></li>
          <li><a href="#">Content Creation</a></li>
          <li><a href="#">Influencer Marketing</a></li>
          <li><a href="#">Fashion Marketing</a></li>
          <li><a href="#">Real Estate Marketing</a></li>
        @endif
      </ul>
    </div>

    <div class="foot-col">
      <h4>Contact</h4>
      <ul class="contact-list">
        <li>
          <span class="ci"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.2.4 2.4.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.4 0 .8-.2 1z"/></svg></span>
          <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact_phone) }}">{{ $contact_phone }}</a>
        </li>
        <li>
          <span class="ci"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2m0 4.2-8 5-8-5V6l8 5 8-5z"/></svg></span>
          <a href="mailto:{{ $contact_email }}">{{ $contact_email }}</a>
        </li>
        <li>
          <span class="ci"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s7-5.6 7-11a7 7 0 1 0-14 0c0 5.4 7 11 7 11"/><circle cx="12" cy="10" r="2.6"/></svg></span>
          <span>{!! nl2br(e($contact_address)) !!}</span>
        </li>
      </ul>
    </div>
  </div>

  <div class="container foot-bottom">
    <p>&copy; 2024 Black Line Marketing. All rights reserved.</p>
    <div class="pay">
      <img src="{{ asset('images/pay-visa.png') }}" alt="pay visa" title="Pay Visa">
      <img src="{{ asset('images/pay-mastercard.png') }}" alt="pay mastercard" title="Pay Mastercard">
      <img src="{{ asset('images/pay-paypal.png') }}" alt="pay paypal" title="Pay Paypal">
      <img src="{{ asset('images/pay-amex.png') }}" alt="pay amex" title="Pay Amex">
      <img src="{{ asset('images/pay-discover.png') }}" alt="pay discover" title="Pay Discover">
      <img src="{{ asset('images/pay-wire.png') }}" alt="pay wire" title="Pay Wire">
      <img src="{{ asset('images/pay-bank.png') }}" alt="pay bank" title="Pay Bank">
    </div>
  </div>
</footer>

<!-- Custom Cursor Element -->
<div class="custom-cursor"></div>

<style>
    .custom-cursor {
        position: fixed;
        top: -100px;
        left: -100px;
        width: 30px;
        height: 30px;
        border: 2px solid var(--gold, #E5CA83); /* Primary gold color */
        border-radius: 50%; /* Make it round */
        pointer-events: none; /* Allows clicking through it */
        transform: translate(-50%, -50%); /* Centers the gap exactly on the mouse point */
        z-index: 99999; /* Ensure it's on top of everything */
        transition: transform 0.15s ease-out, width 0.2s, height 0.2s, background-color 0.2s; /* Smooth delay effect */
        box-shadow: 0 0 8px rgba(229, 202, 131, 0.3); /* Slight glow matching the gold color */
        display: none;
    }
    @media (pointer: fine) {
        .custom-cursor {
            display: block;
        }
    }
    .custom-cursor.cursor-hover {
        width: 60px;
        height: 60px;
        background-color: rgba(229, 202, 131, 0.15); /* Slight fill inside the circle */
    }
    .custom-cursor.cursor-black {
        border-color: #000;
    }
    .custom-cursor.cursor-primary {
        border-color: var(--gold, #E5CA83) !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cursor = document.querySelector('.custom-cursor');
        if (!cursor) return;
        
        // Update circle position on mouse move
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });

        // Add visual feedback on click (shrinks the circle slightly)
        document.addEventListener('mousedown', () => {
            if (!cursor.classList.contains('cursor-hover')) {
                cursor.style.transform = 'translate(-50%, -50%) scale(0.7)';
            } else {
                cursor.style.transform = 'translate(-50%, -50%) scale(0.9)'; // less shrink if already large
            }
        });
        document.addEventListener('mouseup', () => {
            cursor.style.transform = 'translate(-50%, -50%) scale(1)';
        });

        // Hover effect on buttons, links, and cards using event delegation
        document.addEventListener('mouseover', (e) => {
            if (e.target.closest('a, button, .card, .btn, .filter-button, .close-filter-btn, .burger')) {
                cursor.classList.add('cursor-hover');
            }
            if (e.target.closest('.card')) {
                cursor.classList.add('cursor-black');
            }
            if (e.target.closest('.pill-arrow')) {
                cursor.classList.add('cursor-primary');
            }
        });

        document.addEventListener('mouseout', (e) => {
            if (!e.relatedTarget || !e.relatedTarget.closest('a, button, .card, .btn, .filter-button, .close-filter-btn, .burger')) {
                cursor.classList.remove('cursor-hover');
            }
            if (!e.relatedTarget || !e.relatedTarget.closest('.card')) {
                cursor.classList.remove('cursor-black');
            }
            if (!e.relatedTarget || !e.relatedTarget.closest('.pill-arrow')) {
                cursor.classList.remove('cursor-primary');
            }
        });
    });
</script>
