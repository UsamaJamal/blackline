<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Our Work & Case Studies | BlackLine Marketing</title>
  <meta name="description" content="Explore Black Line Marketing case studies. See how we transform brands, execute strategies, and deliver measurable results.">
  <meta name="keywords" content="marketing case studies, branding portfolio, marketing results, digital strategy, brand transformation">
  <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Our Work & Case Studies | BlackLine Marketing">
    <meta property="og:description" content="Explore Black Line Marketing case studies. See how we transform brands, execute strategies, and deliver measurable results.">
    <meta property="og:image" content="{{ isset($caseStudy) && $caseStudy->hero_image ? asset($caseStudy->hero_image) : asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Our Work & Case Studies | BlackLine Marketing">
    <meta name="twitter:description" content="Explore Black Line Marketing case studies. See how we transform brands, execute strategies, and deliver measurable results.">
    <meta name="twitter:image" content="{{ isset($caseStudy) && $caseStudy->hero_image ? asset($caseStudy->hero_image) : asset('images/logo.png') }}">
  
  <!-- Main CSS for header, footer and global styles -->
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/casestudy.css') }}?v={{ time() }}">
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
    <style>
        @media (max-width: 768px) {
            .case-study-hero-title {
                font-size: 36px !important;
            }
            .case-study-hero-wrapper {
                height: 50vh !important;
                max-height: 50vh !important;
            }
        }
    </style>
    <section class="case-study-hero-wrapper" style="position: relative; width: 100%; margin: 0 auto; overflow: hidden; background: #161616; height: 75vh; min-height: 400px; max-height: 700px;">
        <!-- Image determines the height of the section. No cropping. -->
        <picture>
            <source media="(max-width: 768px)" srcset="{{ asset($hero['mobile_image'] ?? ($hero['image'] ?? 'images/work-nova.jpg')) }}">
            <img class="hero-image-img" src="{{ asset($hero['image'] ?? 'images/work-nova.jpg') }}" alt="Case Study Hero" style="width: 100%; height: 100%; object-fit: cover; object-position: center 15%; display: block;">
        </picture>
        
        <!-- Gradient overlay -->
        <div class="hero-gradient-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(15, 15, 15, 0.90) 0%, rgba(15, 15, 15, 0.55) 45%, rgba(15, 15, 15, 0.05) 80%); pointer-events: none; z-index: 1;"></div>
        
        <!-- Text overlay -->
        <div class="case-study-hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; display: flex; align-items: center;">
            <div class="container" style="width: 100%;">
                <div class="case-study-hero-content" style="max-width: 600px;">
                    <div class="case-study-hero-category">{{ $hero['badge'] ?? 'FASHION' }}</div>
                    <h1 class="case-study-hero-title">{{ $hero['heading'] ?? 'Maison Noir' }}</h1>
                    <p class="case-study-hero-subtitle">{{ $hero['description'] ?? 'Building a Brand Designed to Be Remembered.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="market-challenge-section">
        <div class="container">
            <div class="market-challenge-header">
                <h2 class="market-challenge-title">{!! $challenge['heading'] ?? 'Turning a Market Challenge<br>Into an Opportunity.' !!}</h2>
                <p class="market-challenge-intro">{{ $challenge['description'] ?? 'Every ambitious brand faces a point where its existing presence no longer reflects its ambition. The challenge was to create a stronger position, connect with the right audience, and build momentum in a competitive market.' }}</p>
            </div>
            
            <div class="market-challenge-content">
                <div class="market-challenge-list">
                    @foreach($challenge['points'] ?? [] as $index => $point)
                    <div class="challenge-item">
                        <span class="challenge-item-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                        <div class="challenge-item-content">
                            <h3 class="challenge-item-title">{{ $point['title'] }}</h3>
                            <p class="challenge-item-desc">{{ $point['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="market-challenge-image">
                    <img src="{{ asset($challenge['image'] ?? 'images/work-meridian.jpg') }}" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($challenge['image'] ?? 'images/work-meridian.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($challenge['image'] ?? 'images/work-meridian.jpg')), PATHINFO_FILENAME)))) }}">
                </div>
            </div>
        </div>
    </section>

    <section class="insight-direction-section">
        <div class="container">
            <h2 class="insight-title">Turning Insight Into Direction.</h2>
            <div class="insight-timeline">
                <div class="insight-item">
                    <div class="insight-icon">
                        <img src="{{ asset('images/Positioning.svg') }}" alt="Positioning" title="Positioning">
                    </div>
                    <h3 class="insight-item-title">Positioning</h3>
                    <p class="insight-item-desc">We clarified what made the brand different and created a sharper position within a crowded market.</p>
                </div>

                <div class="insight-item">
                    <div class="insight-icon">
                        <img src="{{ asset('images/content- strategy.svg') }}" alt="content  strategy" title="Content  Strategy">
                    </div>
                    <h3 class="insight-item-title">Content Strategy</h3>
                    <p class="insight-item-desc">We established content pillars, visual language, and messaging designed to make the brand instantly recognizable.</p>
                </div>

                <div class="insight-item">
                    <div class="insight-icon">
                        <img src="{{ asset('images/Audience.svg') }}" alt="Audience" title="Audience">
                    </div>
                    <h3 class="insight-item-title">Audience</h3>
                    <p class="insight-item-desc">We identified the audience's motivations, behaviors, and interests to create communication that feels relevant.</p>
                </div>

                <div class="insight-item">
                    <div class="insight-icon">
                        <img src="{{ asset('images/Campaign.svg') }}" alt="Campaign" title="Campaign">
                    </div>
                    <h3 class="insight-item-title">Campaign</h3>
                    <p class="insight-item-desc">Every creative touchpoint was designed to reinforce the strategy and turn attention into meaningful action.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="strategy-life-section">
        <div class="container">
            <h2 class="strategy-life-title">{{ $strategy['heading'] }}</h2>
            <div class="strategy-life-text-grid">
                <p class="strategy-life-text">{{ $strategy['description_1'] }}</p>
                <p class="strategy-life-text">{{ $strategy['description_2'] }}</p>
            </div>
            <div class="strategy-life-image">
                <img src="{{ asset($strategy['image'] ?? 'images/work-nova.jpg') }}" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($strategy['image'] ?? 'images/work-nova.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($strategy['image'] ?? 'images/work-nova.jpg')), PATHINFO_FILENAME)))) }}">
            </div>
        </div>
    </section>

    <section class="results-section">
        <div class="container">
            <h2 class="results-title">Results</h2>
            <p class="results-intro">A strong strategy is measured by the impact it creates. Through focused execution, creative consistency, and continuous optimization, we helped turn attention into meaningful growth — strengthening engagement, expanding reach, and creating measurable value for the brand.</p>
            
            <div class="results-stats-grid">
                <div class="stat-item">
                    <span class="stat-number" data-target="184" data-prefix="+" data-suffix="%">+0%</span>
                    <span class="stat-label">Engagement Growth</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="72" data-prefix="+" data-suffix="%">+0%</span>
                    <span class="stat-label">Organic Reach</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="3.4" data-prefix="" data-suffix="x" data-decimals="1">0.0x</span>
                    <span class="stat-label">ROAS</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="58" data-prefix="+" data-suffix="K">+0K</span>
                    <span class="stat-label">Audience Growth</span>
                </div>
            </div>
        </div>
    </section>

    <section class="work-motion-section">
        <div class="container">
            <h2 class="work-motion-title">{{ $work_motion['heading'] }}</h2>
            <div class="grid-container">
                <!-- Column 1 -->
                <div class="column">
                    <div class="grid-item">
                        <img src="{{ asset($work_motion['image_1'] ?? 'images/left.jpg') }}" class="img-1" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_1'] ?? 'images/left.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_1'] ?? 'images/left.jpg')), PATHINFO_FILENAME)))) }}">
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="column">
                    <div class="grid-item">
                        <img src="{{ asset($work_motion['image_2'] ?? 'images/e3daa32d63e4b525d4d953d43fca4bac8663a408.jpg') }}" class="img-2" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_2'] ?? 'images/e3daa32d63e4b525d4d953d43fca4bac8663a408.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_2'] ?? 'images/e3daa32d63e4b525d4d953d43fca4bac8663a408.jpg')), PATHINFO_FILENAME)))) }}">
                    </div>
                    <div class="grid-item">
                        <img src="{{ asset($work_motion['image_3'] ?? 'images/75380b79c3a2b132c49c08f7ba4bf3c2cef763d7.jpg') }}" class="img-3" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_3'] ?? 'images/75380b79c3a2b132c49c08f7ba4bf3c2cef763d7.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_3'] ?? 'images/75380b79c3a2b132c49c08f7ba4bf3c2cef763d7.jpg')), PATHINFO_FILENAME)))) }}">
                    </div>
                </div>

                <!-- Column 3 -->
                <div class="column">
                    <div class="grid-item">
                        <img src="{{ asset($work_motion['image_4'] ?? 'images/ce777daf76ee5541c189407447390a60a69f9148.jpg') }}" class="img-4" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_4'] ?? 'images/ce777daf76ee5541c189407447390a60a69f9148.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_4'] ?? 'images/ce777daf76ee5541c189407447390a60a69f9148.jpg')), PATHINFO_FILENAME)))) }}">
                    </div>
                    <div class="grid-item">
                        <img src="{{ asset($work_motion['image_5'] ?? 'images/6b43bbe1f1ef199886ab7fc8478b9fa2e9bec8c0.jpg') }}" class="img-5" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_5'] ?? 'images/6b43bbe1f1ef199886ab7fc8478b9fa2e9bec8c0.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_5'] ?? 'images/6b43bbe1f1ef199886ab7fc8478b9fa2e9bec8c0.jpg')), PATHINFO_FILENAME)))) }}">
                    </div>
                </div>

                <!-- Column 4 -->
                <div class="column">
                    <div class="grid-item">
                        <img src="{{ asset($work_motion['image_6'] ?? 'images/3e21a292ef2acb2f4638dacec719d43784164505.jpg') }}" class="img-6" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_6'] ?? 'images/3e21a292ef2acb2f4638dacec719d43784164505.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($work_motion['image_6'] ?? 'images/3e21a292ef2acb2f4638dacec719d43784164505.jpg')), PATHINFO_FILENAME)))) }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="video-section" style="padding: 40px 20px;">
        <div class="container" style="max-width: 1000px; margin: 0 auto;">
            <div class="video-container" style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000; border-radius: 20px;">
                @if(!empty($video['video_file']))
                    <video id="caseStudyVideo" poster="{{ asset($video['thumbnail']) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                        <source src="{{ asset($video['video_file']) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div id="playVideoButton" class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2; cursor: pointer;">
                        <div class="play-icon"></div>
                    </div>
                @else
                    <img src="{{ asset($video['thumbnail'] ?? 'images/hero.jpg') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($video['thumbnail'] ?? 'images/hero.jpg')), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($video['thumbnail'] ?? 'images/hero.jpg')), PATHINFO_FILENAME)))) }}">
                    <div class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                        <div class="play-icon"></div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('caseStudyVideo');
            const playBtn = document.getElementById('playVideoButton');
            if(video && playBtn) {
                playBtn.addEventListener('click', function() {
                    video.play();
                    playBtn.style.display = 'none';
                    video.setAttribute('controls', 'controls');
                });
            }
        });
    </script>

    @include('components.faqs-section')
</main>

@include('components.footer')

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.stat-number');
        const speed = 100; // The lower the slower

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const prefix = counter.getAttribute('data-prefix') || '';
                const suffix = counter.getAttribute('data-suffix') || '';
                const hasDecimals = counter.hasAttribute('data-decimals');
                
                let count = 0;
                
                const updateCount = () => {
                    const inc = target / speed;
                    
                    if (count < target) {
                        count += inc;
                        if (count > target) count = target;
                        
                        let displayCount = hasDecimals ? count.toFixed(1) : Math.ceil(count);
                        counter.innerText = prefix + displayCount + suffix;
                        setTimeout(updateCount, 15);
                    } else {
                        counter.innerText = prefix + (hasDecimals ? target.toFixed(1) : target) + suffix;
                    }
                };
                
                updateCount();
            });
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const resultsSection = document.querySelector('.results-stats-grid');
        if (resultsSection) {
            observer.observe(resultsSection);
        }
    });
</script>

</body>
</html>
