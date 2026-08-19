<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Portfolio | BlackLine Marketing' }}</title>
  <meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Explore our portfolio of successful digital marketing campaigns, branding projects, and web development case studies by BlackLine Marketing.' }}">
  <meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'digital marketing portfolio, branding case studies, marketing projects, BlackLine Marketing work' }}">
  <link rel="canonical" href="{{ url()->current() }}">
  <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Portfolio | BlackLine Marketing' }}">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Explore our portfolio of successful digital marketing campaigns, branding projects, and web development case studies by BlackLine Marketing.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Portfolio | BlackLine Marketing' }}">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Explore our portfolio of successful digital marketing campaigns, branding projects, and web development case studies by BlackLine Marketing.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
  <script src="{{ asset('js/service.js') }}" defer></script>
  <script src="{{ asset('js/portfolio.js') }}" defer></script>
</head>
<body>
@include('components.header')

<main>
  <section class="portfolio-hero" style="background-image: url('{{ asset($heroSettings['image'] ?? 'images/portfolio-banner.webp') }}');" role="img" aria-label="portfolio banner" title="Portfolio Banner">
    <div class="portfolio-hero__panel">
      <span style="text-transform: uppercase;">{{ $heroSettings['badge'] ?? 'CASE STUDIES' }}</span>
      <h1>{{ $heroSettings['heading'] ?? 'Brands Worth Remembering.' }}</h1>
      <a class="gold-button" href="{{ $heroSettings['btn_link'] ?? route('book-now') }}">{{ $heroSettings['btn_text'] ?? 'Book a Discovery Call' }} <b>→</b></a>
    </div>
  </section>

  <section class="portfolio-work" id="portfolio-grid">
    <div class="portfolio-heading">
      <h2>Brands We’ve Made Impossible<br>to Ignore.</h2>
      <button class="filter-button" type="button" aria-expanded="false">Filter
        <svg viewBox="0 0 24 24"><path d="M4 6h3 M11 6h9 M4 12h9 M17 12h3 M4 18h3 M11 18h9"/><circle cx="9" cy="6" r="2"/><circle cx="15" cy="12" r="2"/><circle cx="9" cy="18" r="2"/></svg>
      </button>
      <div class="filter-sidebar-overlay" hidden></div>
      <div class="filter-sidebar" hidden>
        <button type="button" class="close-filter-btn" aria-label="Close Filter">✕</button>
        <h3>FILTER BY INDUSTRY</h3>
        <div class="filter-options">
          @forelse($industries as $industry)
            <label style="text-transform: capitalize;"><input type="checkbox" value="{{ $industry }}"> {{ $industry }}</label>
          @empty
            <span style="font-size: 13px; color: var(--muted);">No industries found.</span>
          @endforelse
        </div>
        <button type="button" class="apply-filter-btn">Apply Filter</button>
      </div>
    </div>

    <div class="portfolio-grid">
      @forelse($projects as $project)
      <article class="project" data-category="{{ $project->industry }}">
        <div class="project-img-wrapper"><img src="{{ asset($project->image) }}" alt="{{ $project->title }}" title="{{ $project->title }}"></div>
        <h3>{{ $project->title }}</h3>
        <p>{{ $project->description }}</p>
        <a href="{{ $project->btn_link }}">{{ $project->btn_text }}</a>
      </article>
      @empty
      <div style="grid-column: span 2; text-align: center; padding: 40px 0; color: var(--muted);">
        No projects added to showcase yet.
      </div>
      @endforelse
    </div>
  </section>

  @include('components.faqs-section')
</main>

@include('components.footer')
</body>
</html>
