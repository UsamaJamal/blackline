<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Our Case Studies | BlackLine Marketing' }}</title>
  <meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Explore Black Line Marketing case studies. See how we transform brands, execute strategies, and deliver measurable results.' }}">
  <meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'case studies, black line marketing, portfolio' }}">
  <link rel="canonical" href="{{ url()->
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Our Case Studies | BlackLine Marketing' }}">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Explore Black Line Marketing case studies. See how we transform brands, execute strategies, and deliver measurable results.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Our Case Studies | BlackLine Marketing' }}">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Explore Black Line Marketing case studies. See how we transform brands, execute strategies, and deliver measurable results.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">current() }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/casestudy.css') }}?v={{ time() }}">
  <style>
      .case-study-grid {
          display: flex;
          flex-wrap: wrap;
          gap: 30px;
          justify-content: center;
          margin-top: 60px;
          margin-bottom: 100px;
      }
      .case-study-card {
          display: block;
          width: 350px;
          background: #1B1B1D;
          border: 1px solid rgba(255,255,255,0.05);
          border-radius: 12px;
          text-decoration: none;
          color: white;
          overflow: hidden;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .case-study-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 30px rgba(0,0,0,0.5);
          border-color: rgba(229,202,131,0.3);
      }
      .case-study-img {
          width: 100%;
          height: 220px;
          background-size: cover;
          background-position: center;
      }
      .case-study-content {
          padding: 30px;
      }
      .case-study-title {
          font-size: 22px;
          font-weight: 700;
          margin-bottom: 15px;
          color: #fff;
      }
      .case-study-badge {
          display: inline-block;
          font-size: 11px;
          font-weight: 700;
          letter-spacing: 2px;
          color: #E5CA83;
          margin-bottom: 15px;
          text-transform: uppercase;
      }
      .case-study-link {
          color: #E5CA83;
          font-size: 14px;
          font-weight: 600;
          display: flex;
          align-items: center;
          gap: 8px;
          margin-top: 20px;
      }
  </style>
</head>
<body>
@include('components.header')

<main>
    <section class="case-study-hero" style="height: 40vh; min-height: 300px; justify-content: center; text-align: center; background: #0A0A0A;">
        <div class="container">
            <h1 style="font-size: 48px; margin-bottom: 20px;">Our Case Studies</h1>
            <p style="text-align: center; max-width: 600px; margin: 0 auto; color: #DEDEDE;">Discover how we help brands elevate their presence, connect with their audience, and drive real growth.</p>
        </div>
    </section>

    <div class="container">
        <div class="case-study-grid">
            @forelse($pages as $page)
                <a href="{{ route('case-study.show', $page->slug) }}" class="case-study-card">
                    @php
                        $hero = $page->hero ?? [];
                        $image = $hero['image'] ?? 'images/work-nova.jpg';
                        $badge = $hero['badge'] ?? 'CASE STUDY';
                    @endphp
                    <div class="case-study-img" style="background-image: url('{{ asset($image) }}');"></div>
                    <div class="case-study-content">
                        <span class="case-study-badge">{{ $badge }}</span>
                        <h2 class="case-study-title">{{ $page->title }}</h2>
                        <div class="case-study-link">Read Case Study <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div>
                    </div>
                </a>
            @empty
                <div style="text-align: center; padding: 50px; color: var(--muted); width: 100%;">
                    <p>No case studies available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</main>

@include('components.footer')

<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
