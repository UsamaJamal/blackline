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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
  <script src="{{ asset('js/service.js') }}" defer></script>
  <script src="{{ asset('js/portfolio.js') }}" defer></script>
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
  <section class="portfolio-hero" style="background-image: url('{{ asset($heroSettings['image'] ?? 'images/portfolio-banner.webp') }}');" role="img" aria-label="portfolio banner" title="Portfolio Banner">
    <div class="portfolio-hero__panel">
      <span style="text-transform: uppercase;">{{ $heroSettings['badge'] ?? 'CASE STUDIES' }}</span>
      <h1>{{ $heroSettings['heading'] ?? 'Brands Worth Remembering.' }}</h1>
      <a class="gold-button" href="{{ $heroSettings['btn_link'] ?? route('book-now') }}">{{ $heroSettings['btn_text'] ?? 'Book a Discovery Call' }} <b>→</b></a>
    </div>
  </section>

  @php
    $categoryLabels = \App\Models\PortfolioItem::$categories;
    $activeCount = $activeCategory ? (collect($categories)->firstWhere('slug', $activeCategory)['count'] ?? 0) : 0;
  @endphp
  <section class="portfolio-work {{ $activeCategory ? 'is-detail' : 'is-chooser' }}" id="portfolio-grid" data-active="{{ $activeCategory }}">

    {{-- STEP 1 — Category chooser --}}
    <div class="portfolio-categories">
      <div class="portfolio-categories__head">
        <span class="portfolio-eyebrow">EXPLORE OUR WORK</span>
        <h2>What are you looking to build?</h2>
        <p>Choose a category to explore the projects we’ve crafted for our clients.</p>
      </div>

      <div class="category-cards">
        @foreach($categories as $cat)
          @php
            $icon = $cat['slug'] === 'web-development'
              ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2.5" y="4" width="19" height="15" rx="2"/><path d="M2.5 8h19"/><path d="M8 12l-2 2 2 2"/><path d="M16 12l2 2-2 2"/><path d="M13 11.5l-2 5"/></svg>'
              : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="6.5" y="2.5" width="11" height="19" rx="2.5"/><path d="M10.5 5.5h3"/><path d="M11 18.5h2"/></svg>';
          @endphp
          <a class="category-card"
             href="{{ route('portfolio', ['category' => $cat['slug']]) }}#portfolio-grid"
             data-go="{{ $cat['slug'] }}"
             aria-label="View {{ $cat['label'] }} portfolio">
            <div class="category-card__content">
              <span class="category-card__icon" aria-hidden="true">{!! $icon !!}</span>
              <div class="category-card__body">
                <h3>{{ $cat['label'] }}</h3>
                <span class="category-card__count">{{ $cat['count'] }} {{ Str::plural('Project', $cat['count']) }}</span>
              </div>
              <span class="category-card__cta">View Portfolio <b>→</b></span>
            </div>
            <div class="category-card__media {{ $cat['image'] ? '' : 'category-card__media--empty' }}">
              @if($cat['image'])
                <img class="category-card__img" src="{{ asset($cat['image']) }}" alt="{{ $cat['label'] }} preview" loading="lazy">
              @else
                <span class="category-card__media-ph" aria-hidden="true">{!! $icon !!}</span>
              @endif
            </div>
          </a>
        @endforeach
      </div>
    </div>

    {{-- STEP 2 — Selected category detail --}}
    <div class="portfolio-detail">
      <div class="portfolio-heading">
        <div class="portfolio-heading__left">
          <a class="back-to-categories" href="{{ route('portfolio') }}#portfolio-grid" data-back><b>←</b> All Categories</a>
          <h2 data-detail-title>{{ $activeCategory ? $categoryLabels[$activeCategory] : 'Our Work' }}</h2>
        </div>
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
        <article class="project"
                 data-category="{{ $project->category }}"
                 data-industry="{{ $project->industry }}"
                 @if($activeCategory && $project->category !== $activeCategory) hidden @endif>
          <div class="project-img-wrapper"><img src="{{ asset($project->image) }}" alt="{{ $project->title }}" title="{{ $project->title }}"></div>
          <h3>{{ $project->title }}</h3>
          <p>{{ $project->description }}</p>
          <a href="{{ $project->btn_link }}">{{ $project->btn_text }}</a>
        </article>
        @empty
        @endforelse
      </div>

      <div class="portfolio-empty" @unless($activeCategory && $activeCount === 0) hidden @endunless>
        No projects in this category yet.
      </div>
    </div>
  </section>

  @include('components.faqs-section')
</main>

@include('components.footer')
</body>
</html>
