<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = \App\Models\Service::where('slug', 'photography-videography')->first();
if (!$service) {
    echo "Service not found.\n";
    exit;
}

$service->update([
    'benefits' => [
        [
            'id' => '1',
            'icon' => 'assets/icons/benefit-brand.png',
            'title' => 'Premium Perception',
            'description' => 'High-end visuals instantly communicate quality, elevate your brand, and build immediate trust with your audience.'
        ],
        [
            'id' => '2',
            'icon' => 'assets/icons/benefit-engagement.png',
            'title' => 'Higher Engagement',
            'description' => 'Striking photos and cinematic video content drive significantly more interaction and shares across all social platforms.'
        ],
        [
            'id' => '3',
            'icon' => 'assets/icons/benefit-audience.png',
            'title' => 'Versatile Content',
            'description' => 'One shoot provides a wealth of multi-purpose assets for your website, ads, social media, and printed marketing materials.'
        ],
        [
            'id' => '4',
            'icon' => 'assets/icons/benefit-authority.png',
            'title' => 'Authentic Storytelling',
            'description' => 'Custom visuals capture your unique culture and process, telling a compelling story that stock photos simply cannot match.'
        ],
        [
            'id' => '5',
            'icon' => 'assets/icons/benefit-time.png',
            'title' => 'Professional Quality',
            'description' => 'State-of-the-art equipment and expert lighting ensure your products and team look absolutely flawless in every frame.'
        ],
        [
            'id' => '6',
            'icon' => 'assets/icons/benefit-growth.png',
            'title' => 'Conversion Driver',
            'description' => 'Professional imagery removes buyer hesitation, significantly boosting e-commerce sales and lead generation.'
        ]
    ],
    'process' => [
        [
            'id' => '1',
            'title' => 'Discovery & Concept',
            'description' => 'We align with your brand guidelines and marketing goals to develop a strong creative vision.',
            'icon' => 'images/service/1786821688_search.svg'
        ],
        [
            'id' => '2',
            'title' => 'Pre-Production',
            'description' => 'We handle location scouting, talent sourcing, storyboarding, and detailed shoot scheduling.',
            'icon' => 'images/service/1786821709_Strategize.svg'
        ],
        [
            'id' => '3',
            'title' => 'Production',
            'description' => 'Our professional crew executes the shoot using state-of-the-art cinematic and photography equipment.',
            'icon' => 'images/service/1786821721_create.svg'
        ],
        [
            'id' => '4',
            'title' => 'Post-Production',
            'description' => 'Expert editing, color grading, retouching, and sound design to perfect every final asset.',
            'icon' => 'images/service/1786821738_publish.svg'
        ],
        [
            'id' => '5',
            'title' => 'Delivery',
            'description' => 'Final, optimized files are delivered in all necessary formats for web, social media, and print.',
            'icon' => 'images/service/1786821753_Analyze & Optimize.svg'
        ]
    ],
    'pricing' => [
        [
            'id' => '1',
            'name' => 'Essential Shoot',
            'description' => 'Perfect for quick content refreshes.',
            'price' => '3,500',
            'price_small' => '/one-time',
            'btn_text' => 'Speak to Us',
            'btn_link' => '/book-now',
            'bullets' => "Half-Day Production\n1 Photographer/Videographer\nBasic Lighting Setup\n20 Final Edited Photos\n1 Short Video Reel\nStandard Retouching",
            'best_for' => "Small Businesses \n Social Content",
            'badge_text' => null
        ],
        [
            'id' => '2',
            'name' => 'Brand Story',
            'description' => 'Comprehensive visual storytelling.',
            'price' => '6,500',
            'price_small' => '/one-time',
            'btn_text' => 'Speak to Us',
            'btn_link' => '/book-now',
            'bullets' => "Full-Day Production\n2-Person Crew\nAdvanced Lighting & Audio\n40 Final Edited Photos\n3 Video Reels\n1 Brand Interview Video\nAdvanced Color Grading",
            'best_for' => "Startups \n E-Commerce",
            'badge_text' => null
        ],
        [
            'id' => '3',
            'name' => 'Cinematic',
            'description' => 'High-end production for market leaders.',
            'price' => '12,000',
            'price_small' => '/one-time',
            'btn_text' => 'Speak to Us',
            'btn_link' => '/book-now',
            'bullets' => "2-Day Production\nFull Creative Crew\nDrone Videography\n80+ Final Edited Photos\n5 Video Reels\n1 Hero Brand Film (60s)\nPremium Editing & Retouching",
            'best_for' => "Luxury Brands \n Corporate Campaigns",
            'badge_text' => 'Recommended'
        ],
        [
            'id' => '4',
            'name' => 'Retainer',
            'description' => 'Ongoing visual content creation.',
            'price' => '8,000',
            'price_small' => '/month',
            'btn_text' => 'Speak to Us',
            'btn_link' => '/book-now',
            'bullets' => "1 Full-Day Shoot Every Month\nDedicated Creative Team\nContinuous Concept Development\n30 Fresh Photos Monthly\n4 Video Reels Monthly\nPriority Booking\nAsset Management",
            'best_for' => "Restaurants \n Fashion Brands",
            'badge_text' => null
        ]
    ]
]);

echo "Photography & Videography service updated successfully!\n";
