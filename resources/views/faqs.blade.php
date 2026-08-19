<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Frequently Asked Questions | Black Line Marketing' }}</title>
    <meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Find answers to commonly asked questions about Black Line Marketing\'s services, pricing, process, and more.' }}">
    <meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'marketing FAQs, agency questions, digital marketing pricing, marketing process, Black Line Marketing' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/faqs.css') }}">
</head>
<body>

@include('components.header')

<main>
    <section class="faqs-hero">
        <h1>Frequently Asked Questions</h1>
        <p>Everything you need to know before working with Black Line Marketing<br>from pricing and process to communication, content creation,<br>payments, and contracts.</p>
    </section>

    <div class="faqs-filters-wrapper container">
        <div class="faqs-filters">
            @foreach($faqs as $category => $categoryFaqs)
                <button class="{{ $loop->first ? 'active' : '' }}" data-target="{{ Str::slug($category) }}-faqs">{{ $category }}</button>
            @endforeach
        </div>
    </div>

    <div class="faqs-container container">
        @foreach($faqs as $category => $categoryFaqs)
            <div class="faq-section {{ $loop->first ? 'active-section' : '' }}" id="{{ Str::slug($category) }}-faqs">
                <h2>{{ $category }}</h2>
                @foreach($categoryFaqs as $faq)
                    <div class="faq-item">
                        <div class="faq-grid">
                            <div class="faq-question">
                                <span>{{ $faq->question }}</span>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content" style="color: var(--muted); line-height: 1.6;">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                            <div class="faq-icon-col" style="display: flex; justify-content: flex-end;">
                                <div class="faq-icon">
                                    <svg class="icon-plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.25 5.25V0H6.75V5.25H12V6.75H6.75V12H5.25V6.75H0V5.25H5.25Z" fill="#1a1a1a"/>
                                    </svg>
                                    <svg class="icon-close" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.06066L10.9393 0L6 4.93934L1.06066 0L0 1.06066L4.93934 6L0 10.9393L1.06066 12L6 7.06066L10.9393 12L12 10.9393L7.06066 6L12 1.06066Z" fill="#1a1a1a"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</main>

@include('components.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- FAQ Scroll Navigation ---
        const filterBtns = document.querySelectorAll('.faqs-filters button');
        const faqSections = document.querySelectorAll('.faq-section');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                
                if (targetSection) {
                    const offset = 100; // Offset for sticky header if any
                    const elementPosition = targetSection.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // --- Intersection Observer for Active State ---
        const observerOptions = {
            root: null,
            rootMargin: '-30% 0px -60% 0px',
            threshold: 0
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    filterBtns.forEach(btn => {
                        if (btn.getAttribute('data-target') === id) {
                            btn.classList.add('active');
                            // Horizontally scroll the active button into view if it's overflowing
                            btn.parentElement.parentElement.scrollTo({
                                left: btn.offsetLeft - 20,
                                behavior: 'smooth'
                            });
                        } else {
                            btn.classList.remove('active');
                        }
                    });
                }
            });
        }, observerOptions);
        
        faqSections.forEach(section => observer.observe(section));

        // --- FAQ Accordion Logic ---
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            item.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Optional: Close others
                // faqItems.forEach(i => {
                //     i.classList.remove('active');
                //     i.querySelector('.faq-icon').textContent = '+';
                // });
                
                if (!isActive) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        });
    });
</script>

</body>
</html>
