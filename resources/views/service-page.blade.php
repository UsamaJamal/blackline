<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <base href="{{ url('/') }}/">
    <title>{{ $service->title ?? ($heroSettings['small_text'] ?? 'Service') }} | BlackLine Marketing</title>
    <meta name="description" content="{{ $heroSettings['heading'] ?? 'Strategy-led marketing and management services by BlackLine Marketing. We build brands that command attention.' }}">
    <meta name="keywords" content="{{ strtolower($service->title ?? 'marketing') }}, marketing services, brand strategy, digital agency, BlackLine Marketing">
    <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $service->title ?? ($heroSettings['small_text'] ?? 'Service') }} | BlackLine Marketing">
    <meta property="og:description" content="{{ $heroSettings['heading'] ?? 'Strategy-led marketing and management services by BlackLine Marketing. We build brands that command attention.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $service->title ?? ($heroSettings['small_text'] ?? 'Service') }} | BlackLine Marketing">
    <meta name="twitter:description" content="{{ $heroSettings['heading'] ?? 'Strategy-led marketing and management services by BlackLine Marketing. We build brands that command attention.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <script src="{{ asset('js/service.js') }}" defer></script>
    <style>
        @media (max-width: 768px) {
            .step-icon {
                display: none !important;
            }
        }
    </style>
    @hasSection('schema')
        @yield('schema')
    @else
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Blackline Marketing",
            "url": "{{ url('/') }}"
        }
        </script>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Blackline Marketing",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('images/logo.png') }}"
        }
        </script>
    @endif
</head>
<body>
@include('components.header')
<main>
<section class="hero" style="position: relative; display: grid;">
    <img src="{{ asset($heroSettings['image'] ?? 'assets/pdf/asset-12.png') }}" alt="Hero Background" style="grid-area: 1 / 1; width: 100%; height: auto; display: block; object-fit: contain;">
    <div class="service-page-container" style="grid-area: 1 / 1; position: relative; z-index: 1; display: flex; align-items: flex-end; width: 100%; padding-bottom: 40px;">
        <div class="hero-box" style="margin-bottom: 0;">
            <span>{{ $heroSettings['small_text'] ?? 'SOCIAL MEDIA MANAGEMENT' }}</span>
            <h1>{{ $heroSettings['heading'] ?? 'Your Brand Deserves More Than a Feed.' }}</h1>
            <a href="{{ $heroSettings['btn_link'] ?? route('book-now') }}" class="gold-btn">{!! $heroSettings['btn_text'] ?? 'Book a Discovery Call&nbsp; →' !!}</a>
        </div>
    </div>
</section>
<section class="overview service-page-container" id="about">
    <div>
        <span class="label">{{ $overviewSettings['label'] ?? 'OVERVIEW' }}</span>
        @php
            $desc = $overviewSettings['description'] ?? "At Black Line Marketing, we turn social media into a powerful extension of your brand. We build strategic, visually compelling social experiences designed to capture attention, build meaningful connections, and drive growth.\n\nFrom content planning and creative production to publishing and community management, we handle every part of your social presence with purpose - ensuring your brand stays consistent, relevant, and impossible to ignore.";
            $paragraphs = explode("\n", str_replace('\n', "\n", $desc));
        @endphp
        @foreach($paragraphs as $p)
            @if(trim($p) !== '')
                <p>{{ $p }}</p>
            @endif
        @endforeach
        
        <h3>{{ $overviewSettings['sub_heading'] ?? 'Our Social Media Expertise:' }}</h3>
        <ul>
            @php
                $bullets = $overviewSettings['bullets'] ?? "Strategic Content Planning\nCreative Content & Storytelling\nCommunity Engagement & Management\nPerformance Tracking & Optimization";
                $bulletLines = explode("\n", str_replace('\n', "\n", $bullets));
            @endphp
            @foreach($bulletLines as $bullet)
                @if(trim($bullet) !== '')
                    <li>{{ $bullet }}</li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="overview-img-wrapper">
        <img src="{{ asset($overviewSettings['image'] ?? 'assets/pdf/asset-08.png') }}" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($overviewSettings['image'] ?? 'assets/pdf/asset-08.png')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($overviewSettings['image'] ?? 'assets/pdf/asset-08.png')), PATHINFO_FILENAME)))) }}">
    </div>
</section>
<section class="benefits service-page-container" id="services">
    <div class="benefit-head">
        <h2>{!! $benefitHeader['heading'] ?? 'What Strategic Social<br>Media Can Do for Your<br>Brand' !!}</h2>
        <p>{{ $benefitHeader['description'] ?? 'More than content. More than followers. A strategic social presence built to create attention, influence, and measurable growth.' }}</p>
    </div>
    <div class="cards">
        @foreach($benefits as $card)
        <article>
            <i>
                @if(!empty($card['icon_class']))
                    {!! $card['icon_class'] !!}
                @elseif(!empty($card['icon']))
                    <img src="{{ asset($card['icon']) }}" alt="{{ $card['title'] }}" title="{{ $card['title'] }}">
                @endif
            </i>
            <h3>{{ $card['title'] }}</h3>
            <p>{{ $card['description'] }}</p>
        </article>
        @endforeach
    </div>
</section>
<section class="process-section" id="process">
  <div class="process-container service-page-container">
    <div class="process-left-content">
      <span class="process-label">{{ $processHeader['subheading'] ?? 'PROCESS' }}</span>
      <h2 class="process-title">{!! $processHeader['heading'] ?? 'From Strategy to<br>Social Growth.' !!}</h2>
    </div>
    
    <div class="process-visual-wrapper">
      <svg class="process-arc-svg" viewBox="0 0 860 600" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
          <linearGradient id="goldArcGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="#8a6c38"/>
            <stop offset="35%" stop-color="#d4af62"/>
            <stop offset="70%" stop-color="#f0d38a"/>
            <stop offset="100%" stop-color="#8a6c38"/>
          </linearGradient>
          <radialGradient id="goldDotGrad" cx="35%" cy="35%" r="65%">
            <stop offset="0%" stop-color="#fff2c8"/>
            <stop offset="45%" stop-color="#deb45f"/>
            <stop offset="100%" stop-color="#855e20"/>
          </radialGradient>
          <filter id="dotGlow" x="-50%" y="-50%" width="200%" height="200%">
            <feDropShadow dx="0" dy="2" stdDeviation="3.5" flood-color="#d4af62" flood-opacity="0.45"/>
          </filter>
        </defs>
        
        <!-- Thick Gold Semi-circle Arc -->
        <path class="gold-crescent" d="M 0 200 A 100 100 0 0 1 0 400" stroke="url(#goldArcGradient)" stroke-width="40" stroke-linecap="butt" fill="none"/>
        
        <!-- Dashed Orbit Curve -->
        <path class="dashed-orbit" d="M 67 28 A 300 300 0 0 1 67 572" stroke="#ffffff" stroke-width="1.8" stroke-dasharray="4 12" stroke-linecap="round" fill="none" opacity="0.85"/>
        
        <!-- Connector Lines from Golden Dots to Card Badges -->
        <line class="conn-line" x1="146" y1="81" x2="210" y2="52" stroke="#ffffff" stroke-width="1.5" opacity="0.85"/>
        <line class="conn-line" x1="220" y1="194" x2="280" y2="176" stroke="#ffffff" stroke-width="1.5" opacity="0.85"/>
        <line class="conn-line" x1="240" y1="300" x2="310" y2="300" stroke="#ffffff" stroke-width="1.5" opacity="0.85"/>
        <line class="conn-line" x1="220" y1="406" x2="280" y2="424" stroke="#ffffff" stroke-width="1.5" opacity="0.85"/>
        <line class="conn-line" x1="146" y1="519" x2="210" y2="548" stroke="#ffffff" stroke-width="1.5" opacity="0.85"/>
        
        <!-- 5 Golden Spherical Dots directly on dashed orbit -->
        <circle class="gold-node" cx="146" cy="81" r="13" fill="url(#goldDotGrad)" filter="url(#dotGlow)"/>
        <circle class="gold-node" cx="220" cy="194" r="13" fill="url(#goldDotGrad)" filter="url(#dotGlow)"/>
        <circle class="gold-node" cx="240" cy="300" r="13" fill="url(#goldDotGrad)" filter="url(#dotGlow)"/>
        <circle class="gold-node" cx="220" cy="406" r="13" fill="url(#goldDotGrad)" filter="url(#dotGlow)"/>
        <circle class="gold-node" cx="146" cy="519" r="13" fill="url(#goldDotGrad)" filter="url(#dotGlow)"/>
      </svg>
      
      <!-- 5 Step Pill Cards -->
      <div class="process-cards-list">
        @foreach($processItems as $item)
        <div class="process-step-pill step-{{ $loop->iteration }}">
          <div class="step-num-badge">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
          <div class="step-text">
            <h3 class="step-title">{{ $item['title'] }}</h3>
            <p class="step-desc">{{ $item['description'] }}</p>
          </div>
          <div class="step-icon">
            <span style="display: inline-block; width: 24px; height: 24px; background: linear-gradient(90deg, #B0854A 0%, #E8C988 42%, #E4C982 58%, #BB9362 100%); -webkit-mask: url('{{ asset($item['icon']) }}') center/contain no-repeat; mask: url('{{ asset($item['icon']) }}') center/contain no-repeat;" aria-label="{{ $item['title'] }}"></span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<section class="pricing service-page-container" id="pricing">
  <div class="center">
    @php
        $rawHeading = $pricingHeader['heading'] ?? 'From Presence to Market Dominance.';
        $highlightWord = $pricingHeader['highlight'] ?? 'Market Dominance.';
        if (!empty($highlightWord)) {
            $finalHeading = str_replace($highlightWord, '<em>' . $highlightWord . '</em>', $rawHeading);
        } else {
            $finalHeading = $rawHeading;
        }
    @endphp
    <h2>{!! $finalHeading !!}</h2>
    <p>{{ $pricingHeader['description'] ?? 'Choose the level of strategy, creativity, and support your brand needs to grow, scale, and lead.' }}</p>
  </div>
  <div class="plans">
    @foreach($pricingPlans as $plan)
    <article class="{{ strpos(strtolower($plan['name']), 'icon') !== false ? 'featured' : '' }}">

      <h3>@if(strpos(strtolower($plan['name']), 'icon') !== false)<i class="plan-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3.5 10.6 8 15 9.5 10.6 11 9 15.5 7.4 11 3 9.5 7.4 8z"/><path d="M17 13.5 17.9 16l2.6.9-2.6.9-.9 2.6-.9-2.6-2.6-.9 2.6-.9z"/><path d="M17.5 3v3M16 4.5h3"/></svg></i> @endif{{ trim(str_replace(['✨', '✧', '✣', '+'], '', $plan['name'])) }}</h3>
      <p>{{ $plan['description'] }}</p>
      <strong>AED {{ $plan['price'] }}@if(!empty($plan['price_small']))<small>{{ $plan['price_small'] }}</small>@endif</strong>
      <a href="{{ $plan['btn_link'] }}">{{ $plan['btn_text'] }}</a>
      <ul>
        @foreach(explode("\n", str_replace('\n', "\n", $plan['bullets'])) as $bullet)
          @if(trim($bullet) !== '')
            <li>{{ trim($bullet) }}</li>
          @endif
        @endforeach
      </ul>
      @if(!empty($plan['best_for']))
      <h4>Best for:</h4>
      <p>{!! $plan['best_for'] !!}</p>
      @endif
    </article>
    @endforeach
  </div>
</section>
@include('components.service-cta', ['title' => 'Ready to build your movement?', 'description' => "Let's create a brand that commands attention and builds lasting influence starting with a conversation.", 'button' => 'Book a Strategy Call'])
@include('components.faqs-section')
</main>
@include('components.footer')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const processSection = document.querySelector('.process-section');
    const cards = [...document.querySelectorAll('.process-step-pill')];
    const connectors = [...document.querySelectorAll('.conn-line')];
    const dots = [...document.querySelectorAll('.gold-node')];
    if (!processSection || !cards.length) return;

    // Viewport position ratios for 1..5 on scroll down and 5..1 on scroll up
    const triggerRatios = [0.72, 0.56, 0.40, 0.24, 0.08];

    function handleProcessScroll() {
        if (window.innerWidth < 992) {
            cards.forEach(c => c.classList.add('revealed'));
            connectors.forEach(l => l.classList.add('revealed'));
            dots.forEach(d => d.classList.add('revealed'));
            return;
        }

        const rect = processSection.getBoundingClientRect();
        const vh = window.innerHeight;

        cards.forEach((card, i) => {
            // As user scrolls down, rect.top decreases past triggerRatios[i] -> reveals 1, 2, 3, 4, 5
            // As user scrolls back up, rect.top increases past triggerRatios[i] -> hides 5, 4, 3, 2, 1
            const shouldShow = rect.top <= (vh * triggerRatios[i]);
            card.classList.toggle('revealed', shouldShow);
            if (connectors[i]) connectors[i].classList.toggle('revealed', shouldShow);
            if (dots[i]) dots[i].classList.toggle('revealed', shouldShow);
        });
    }

    window.addEventListener('scroll', handleProcessScroll, { passive: true });
    window.addEventListener('resize', handleProcessScroll);
    handleProcessScroll();

    // FAQ Accordion Logic
    const faqs = document.querySelectorAll('.faq details');
    faqs.forEach(faq => {
        faq.addEventListener('toggle', () => {
            if (faq.open) {
                faqs.forEach(otherFaq => {
                    if (otherFaq !== faq) {
                        otherFaq.removeAttribute('open');
                    }
                });
            }
        });
    });
});
</script>
</body></html>
