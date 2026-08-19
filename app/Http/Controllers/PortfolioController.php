<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\PortfolioItem;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::where('key', 'portfolio_hero')->first();
        if ($setting && $setting->value) {
            $heroSettings = $setting->value;
        } else {
            $heroSettings = [
                'badge' => 'CASE STUDIES',
                'heading' => 'Brands Worth Remembering.',
                'btn_text' => 'Book a Discovery Call',
                'btn_link' => '#portfolio-grid',
                'image' => 'assets/portfolio/hero.png'
            ];
        }

        $projects = PortfolioItem::orderBy('sort_order')->orderBy('created_at', 'desc')->get();

        // Determine the active category from the URL (?category=...), if valid.
        $activeCategory = $request->query('category');
        if (!array_key_exists($activeCategory, PortfolioItem::$categories)) {
            $activeCategory = null;
        }

        // Build the category cards shown first on the portfolio page.
        $categories = [];
        foreach (PortfolioItem::$categories as $slug => $label) {
            $inCategory = $projects->where('category', $slug);

            // Prefer a fixed category banner at images/portfolio/categories/{slug}.{ext}
            // (drop the file there); otherwise fall back to the latest project image.
            $banner = null;
            foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                $candidate = "images/portfolio/categories/{$slug}.{$ext}";
                if (file_exists(public_path($candidate))) {
                    $banner = $candidate;
                    break;
                }
            }

            $categories[] = [
                'slug'  => $slug,
                'label' => $label,
                'count' => $inCategory->count(),
                'image' => $banner ?: optional($inCategory->first())->image,
            ];
        }

        // Dynamically get unique industries from portfolio items
        $industries = $projects->pluck('industry')->filter()->unique()->values()->toArray();

        $faqs = \App\Models\Faq::whereJsonContains('pages', 'portfolio')->get();

        $seoSetting = Setting::where('key', 'seo_portfolio')->first();
        $seo = $seoSetting ? $seoSetting->value : null;

        return view('portfolio', compact('heroSettings', 'projects', 'categories', 'activeCategory', 'industries', 'faqs', 'seo'));
    }
}
