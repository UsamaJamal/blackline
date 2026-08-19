<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Support\Str;

$service = Service::updateOrCreate(
    ['slug' => 'photography-videography'],
    [
        'id' => 'photography-videography-id',
        'title' => 'Photography & Videography',
        'show_in_footer' => true,
        'hero' => [
            'small_text' => 'PHOTOGRAPHY & VIDEOGRAPHY',
            'heading' => 'Capture Your Brand\'s Essence with Stunning Visuals.',
            'btn_text' => 'Book a Shoot&nbsp; &rarr;',
            'btn_link' => '/book-now',
            'image' => 'images/service/1786819879_service-page-banner.jpg'
        ],
        'overview' => [
            'label' => 'OVERVIEW',
            'description' => "High-quality visual content is the cornerstone of modern digital marketing. Our professional photography and videography services bring your brand to life, capturing attention and driving engagement across all platforms.\n\nFrom lifestyle and product shoots to corporate documentaries and social media reels, we deliver striking visuals that tell your story.",
            'sub_heading' => 'Our Visual Expertise:',
            'bullets' => "Commercial & Product Photography\nCorporate Documentaries & Brand Films\nLifestyle & Social Media Reels\nEvent Coverage & Post-Production",
            'image' => 'images/the-world-most-iconic.jpg'
        ],
        'benefits_header' => [
            'heading' => 'Why Invest in<br>Professional<br>Visuals',
            'description' => 'Elevate your brand perception and convert viewers into loyal customers with compelling imagery.'
        ],
        'benefits' => [
            [
                'id' => '1',
                'icon' => 'assets/icons/benefit-brand.png',
                'title' => 'Premium Perception',
                'description' => 'High-end visuals instantly communicate quality and build trust with your audience.'
            ],
            [
                'id' => '2',
                'icon' => 'assets/icons/benefit-engagement.png',
                'title' => 'Higher Engagement',
                'description' => 'Video content and striking photos drive significantly more interaction on social media.'
            ]
        ],
        'process_header' => [
            'subheading' => 'PROCESS',
            'heading' => 'Our Production<br>Journey.'
        ],
        'process' => [
            [
                'id' => '1',
                'title' => 'Pre-Production & Concept',
                'description' => 'We collaborate to outline the creative vision, script, and shot list.',
                'icon' => 'images/service/1786821688_search.svg'
            ],
            [
                'id' => '2',
                'title' => 'Production & Shooting',
                'description' => 'Our crew executes the shoot using state-of-the-art cinematic equipment.',
                'icon' => 'images/service/1786821721_create.svg'
            ]
        ],
        'pricing_header' => [
            'heading' => 'Production Packages.',
            'highlight' => 'Packages.',
            'description' => 'Flexible solutions for every scale of production.'
        ],
        'pricing' => [
            [
                'id' => '1',
                'name' => 'Essential Shoot',
                'description' => 'Half-day shoot ideal for social media content.',
                'price' => '2,500',
                'price_small' => '/one-time',
                'btn_text' => 'Speak to Us',
                'btn_link' => '/book-now',
                'bullets' => "Half-Day Production\nBasic Editing & Color Correction\n15 Final Edited Photos\n1 Short Video Reel",
                'best_for' => 'Small Businesses \n Social Content',
                'badge_text' => null
            ]
        ]
    ]
);
echo "Service Created successfully.\n";
