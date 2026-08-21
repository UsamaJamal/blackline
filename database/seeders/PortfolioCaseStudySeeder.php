<?php

namespace Database\Seeders;

use App\Models\CaseStudyPage;
use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PortfolioCaseStudySeeder extends Seeder
{
    public function run()
    {
        $sharedMotion = [
            'image_1' => 'images/portfolio/dua mehrma.webp',
            'image_2' => 'images/portfolio/tcb.webp',
            'image_3' => 'images/portfolio/portf.webp',
            'image_4' => 'images/portfolio/dua mehrma.webp',
            'image_5' => 'images/portfolio/tcb.webp',
            'image_6' => 'images/portfolio/portf.webp',
        ];

        $pages = [
            [
                'id' => '00000000-0000-0000-0000-000000000101',
                'title' => 'Dua Mehrma',
                'slug' => 'dua-mehrma',
                'hero' => [
                    'badge' => 'FASHION ECOMMERCE & WEB DEVELOPMENT',
                    'heading' => 'Dua Mehrma',
                    'description' => 'A refined digital boutique designed to make every collection feel unforgettable.',
                    'image' => 'images/portfolio/dua mehrma.webp',
                ],
                'challenge' => [
                    'heading' => 'Turning a Premium Fashion Collection Into an Effortless Online Experience.',
                    'description' => 'Dua Mehrma needed a website that could carry the craftsmanship and elegance of its collections into every online interaction, while making product discovery and purchasing effortless on every device.',
                    'image' => 'images/portfolio/dua mehrma.webp',
                    'points' => [
                        ['title' => 'Luxury Presentation', 'description' => 'The collection needed editorial-quality visuals without compromising page performance.'],
                        ['title' => 'Mobile Shopping Journey', 'description' => 'Customers needed to browse, compare and purchase products smoothly from mobile devices.'],
                        ['title' => 'Clear Product Discovery', 'description' => 'Categories and product details had to make a growing catalogue easy to explore.'],
                        ['title' => 'Brand Consistency', 'description' => 'Every digital touchpoint needed to reflect the warmth, detail and premium positioning of Dua Mehrma.'],
                    ],
                ],
                'strategy' => [
                    'heading' => 'Editorial Design Built for Conversion.',
                    'description_1' => 'We created a clean eCommerce experience with generous imagery, intuitive collection navigation and product pages that put fabric, fit and craftsmanship at the centre.',
                    'description_2' => 'The responsive build keeps the experience fast and polished across desktop, tablet and mobile, giving customers a seamless route from discovery to checkout.',
                    'image' => 'images/portfolio/dua mehrma.webp',
                ],
                'work_motion' => array_merge(['heading' => 'A Digital Boutique Designed to Be Explored.'], $sharedMotion),
                'video' => ['thumbnail' => 'images/portfolio/dua mehrma.webp', 'video_file' => ''],
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000102',
                'title' => 'The Custom Boxes',
                'slug' => 'the-custom-boxes',
                'hero' => [
                    'badge' => 'B2B ECOMMERCE & WEB DEVELOPMENT',
                    'heading' => 'The Custom Boxes',
                    'description' => 'A clear, conversion-led web experience for custom packaging at every scale.',
                    'image' => 'images/portfolio/tcb.webp',
                ],
                'challenge' => [
                    'heading' => 'Making Custom Packaging Simple to Navigate and Easy to Enquire About.',
                    'description' => 'The Custom Boxes needed to communicate a broad packaging offering without overwhelming prospective customers. The website had to establish credibility, explain product options clearly and create a frictionless path to a quote.',
                    'image' => 'images/portfolio/tcb.webp',
                    'points' => [
                        ['title' => 'Complex Service Range', 'description' => 'Many box styles, finishes and industries required a structure that customers could understand quickly.'],
                        ['title' => 'Quote Conversion', 'description' => 'Visitors needed prominent, low-friction calls to action at every stage of their journey.'],
                        ['title' => 'B2B Trust Signals', 'description' => 'Quality, capabilities and service expertise needed to be immediately clear to decision-makers.'],
                        ['title' => 'Responsive Experience', 'description' => 'The platform had to remain intuitive for users researching packaging from any device.'],
                    ],
                ],
                'strategy' => [
                    'heading' => 'Clarity, Confidence and Conversion.',
                    'description_1' => 'We designed a structured, modern platform that guides visitors through packaging solutions, materials and services with clear visual hierarchy and focused messaging.',
                    'description_2' => 'Strategic quote prompts, credibility cues and responsive layouts turn interest into qualified enquiries while keeping the experience straightforward for B2B buyers.',
                    'image' => 'images/portfolio/tcb.webp',
                ],
                'work_motion' => array_merge(['heading' => 'Custom Packaging, Clearly Presented.'], $sharedMotion),
                'video' => ['thumbnail' => 'images/portfolio/tcb.webp', 'video_file' => ''],
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000103',
                'title' => 'MyBoxPrinting',
                'slug' => 'mybox-printing',
                'hero' => [
                    'badge' => 'PACKAGING ECOMMERCE & WEB DEVELOPMENT',
                    'heading' => 'MyBoxPrinting',
                    'description' => 'A modern packaging platform built to make custom printing feel simple and premium.',
                    'image' => 'images/portfolio/portf.webp',
                ],
                'challenge' => [
                    'heading' => 'Converting a Technical Packaging Offer Into a Premium Digital Storefront.',
                    'description' => 'MyBoxPrinting needed a stronger digital presence that could showcase custom products, communicate print quality and help customers move confidently from packaging inspiration to a clear order or quote request.',
                    'image' => 'images/portfolio/portf.webp',
                    'points' => [
                        ['title' => 'Product Configuration', 'description' => 'Buyers needed a simple way to understand sizes, materials and customisation options.'],
                        ['title' => 'Visual Confidence', 'description' => 'The platform had to make product quality and packaging detail easy to appreciate online.'],
                        ['title' => 'Fast Decision Making', 'description' => 'Clear content and focused calls to action were needed to shorten the path to an enquiry.'],
                        ['title' => 'Scalable Catalogue', 'description' => 'The site structure needed to support new packaging categories as the business grows.'],
                    ],
                ],
                'strategy' => [
                    'heading' => 'A Streamlined Platform for Custom Print Orders.',
                    'description_1' => 'We built a visually focused experience that brings MyBoxPrinting’s product range to life with strong product imagery, concise explanations and a hierarchy designed for quick scanning.',
                    'description_2' => 'The responsive experience supports fast product discovery and clearer quote journeys, making the brand feel dependable, modern and ready for scale.',
                    'image' => 'images/portfolio/portf.webp',
                ],
                'work_motion' => array_merge(['heading' => 'Packaging Solutions Made Easy to Discover.'], $sharedMotion),
                'video' => ['thumbnail' => 'images/portfolio/portf.webp', 'video_file' => ''],
            ],
        ];

        foreach ($pages as $pageData) {
            $page = CaseStudyPage::firstOrNew(['slug' => $pageData['slug']]);
            $page->id = $page->id ?: $pageData['id'];
            $page->fill(Arr::except($pageData, ['id']));
            $page->save();
        }

        $portfolioLinks = [
            'Dua Mehrma' => '/case-study/dua-mehrma',
            'The Custom Boxes' => '/case-study/the-custom-boxes',
            'MyBoxPrinting' => '/case-study/mybox-printing',
        ];

        foreach ($portfolioLinks as $title => $link) {
            $item = PortfolioItem::firstOrNew(['title' => $title]);
            if (! $item->exists) {
                $item->id = (string) Str::uuid();
                $item->description = 'A premium, conversion-focused digital experience.';
                $item->image = $title === 'Dua Mehrma' ? 'images/portfolio/dua mehrma.webp' : ($title === 'The Custom Boxes' ? 'images/portfolio/tcb.webp' : 'images/portfolio/portf.webp');
                $item->industry = 'web';
                $item->category = 'web-development';
            }
            $item->btn_text = 'View Work';
            $item->btn_link = $link;
            $item->save();
        }
    }
}
