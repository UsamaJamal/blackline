<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Marketing & Branding Blog | BlackLine Marketing' }}</title>
    <meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Read the latest insights, strategies, and industry news on digital marketing, social media, and branding from BlackLine Marketing.' }}">
    <meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'marketing blog, digital marketing tips, branding strategies, social media news' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Marketing & Branding Blog | BlackLine Marketing' }}">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Read the latest insights, strategies, and industry news on digital marketing, social media, and branding from BlackLine Marketing.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Marketing & Branding Blog | BlackLine Marketing' }}">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Read the latest insights, strategies, and industry news on digital marketing, social media, and branding from BlackLine Marketing.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
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
    
    <main class="blog-page">
        <!-- Hero Section -->
        <section class="blog-hero">
            <div class="container">
                <h1 class="blog-title">Blogs</h1>
                <p class="blog-subtitle">Strategic insights, creative thinking, platform updates, and practical ideas for brands looking to build influence in a constantly changing digital world.</p>
            </div>
        </section>

        <!-- Filters -->
        <section class="blog-filters">
            <div class="container">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Blogs</button>
                    @foreach($categories as $category)
                        @if(!empty($category))
                            <button class="filter-btn" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Blog Grid -->
        <section class="blog-grid-section">
            <div class="container">
                <div class="blog-grid" id="blog-grid">
                    @forelse($blogs as $blog)
                    <a href="{{ route('blog-post', $blog->slug) }}" class="blog-card" data-category="{{ Str::slug($blog->category) }}">
                        <div class="blog-card-image">
                            <img src="{{ $blog->image ? asset($blog->image) : 'https://images.unsplash.com/photo-1620641788421-7a1c342ea42e?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $blog->title }}" title="{{ $blog->title }}">
                        </div>
                        <div class="blog-card-content">
                            <h3 class="blog-card-title">{{ $blog->title }}</h3>
                            <p class="blog-card-excerpt">{{ Str::limit($blog->short_description, 100) }}</p>
                            <p class="blog-card-meta">{{ $blog->created_at->format('M d') }} &bull; {{ ceil(str_word_count(strip_tags($blog->content ?? $blog->short_description ?? '')) / 200) ?: 5 }} min read</p>
                        </div>
                    </a>
                    @empty
                        <div style="grid-column: 1/-1; text-align: center; color: var(--muted); padding: 50px 0;">No blogs published yet.</div>
                    @endforelse
                </div>
            </div>
        </section>

    </main>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const blogCards = document.querySelectorAll('.blog-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add to clicked
                    btn.classList.add('active');

                    const filterValue = btn.getAttribute('data-filter');

                    blogCards.forEach(card => {
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>