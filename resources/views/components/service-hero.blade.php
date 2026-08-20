<section class="hero-wrapper" style="position: relative; padding: 0px 0 10px;">
    <style>
        @media (max-width: 768px) {
            .hero-text-overlay {
                position: absolute !important;
                background: transparent !important;
                padding: 0 !important;
            }
            .hero-gradient-overlay {
                display: block !important;
            }
            .hero-text-container {
                padding: 10px 20px !important;
            }
            .hero-text-container h1 {
                font-size: 18px !important;
                margin: 4px 0 10px !important;
            }
            .hero-text-container span {
                font-size: 10px !important;
                margin-bottom: 2px !important;
            }
            .hero-text-container a.gold-btn {
                padding: 8px 16px !important;
                font-size: 12px !important;
            }
            .hero-wrapper-div {
                min-height: auto !important;
            }
            .hero-image-img {
                min-height: auto !important;
                max-height: 50vh !important;
                height: 50vh !important;
                object-fit: cover !important;
            }
            .hero-gradient-overlay {
                background: rgba(10, 10, 10, 0.75) !important;
            }
            .hero-text-container h1, .hero-text-container span {
                text-shadow: 0px 4px 12px rgba(0,0,0,0.8);
            }
            .overview {
                display: flex !important;
                flex-direction: column !important;
            }
            .overview > div:first-child {
                order: 1 !important;
            }
            .overview > .overview-img-wrapper {
                order: 2 !important;
            }
            .process-visual-wrapper {
                margin-top: 25px !important; 
            }
            .process-left-content {
                margin-bottom: -110px !important;
                padding-bottom: 0 !important;
            }
            .process-step-pill.step-1 {
                margin-top: 0 !important;
            }
        }
    </style>
    <div class="hero-wrapper-div" style="position: relative; width: 100%; margin: 0 auto; overflow: hidden; background: #161616;">
        <!-- Image determines the height of the section. No cropping, no max-height. -->
        <picture>
            <source media="(max-width: 768px)" srcset="{{ asset($heroSettings['mobile_image'] ?? ($heroSettings['image'] ?? 'assets/pdf/asset-12.png')) }}">
            <img class="hero-image-img" src="{{ asset($heroSettings['image'] ?? 'assets/pdf/asset-12.png') }}" alt="Hero Background" style="width: 100%; height: auto; display: block;">
        </picture>
        
        <!-- Gradient overlay -->
        <div class="hero-gradient-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(15, 15, 15, 0.90) 0%, rgba(15, 15, 15, 0.55) 45%, rgba(15, 15, 15, 0.05) 80%); pointer-events: none; z-index: 1;"></div>
        
        <!-- Text overlay -->
        <div class="hero-text-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; display: flex; align-items: center; justify-content: center;">
            <div class="hero-text-container" style="width: 100%; max-width: 1242px; padding: 30px 45px;">
                <div style="max-width: 500px;">
                    <span style="font-size: 13px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); display: inline-block; margin-bottom: 8px;">{{ $heroSettings['small_text'] ?? 'SOCIAL MEDIA MANAGEMENT' }}</span>
                    <h1 style="font-size: clamp(22px, 2.8vw, 40px); font-weight: 800; color: #ffffff; line-height: 1.2; margin: 8px 0 20px; letter-spacing: -0.5px;">{{ $heroSettings['heading'] ?? 'Your Brand Deserves More Than a Feed.' }}</h1>
                    <a href="{{ $heroSettings['btn_link'] ?? route('book-now') }}" class="gold-btn" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 28px; font-size: 15px;">{!! $heroSettings['btn_text'] ?? 'Book a Discovery Call &nbsp; →' !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
