<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicePageController extends Controller
{
    public function index()
    {
        $service = Service::first();
        if ($service) {
            return redirect()->route('services.show', $service->slug);
        }
        abort(404, 'No service pages created yet.');
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $heroSettings = $service->hero ?? [];
        $overviewSettings = $service->overview ?? [];
        $benefitHeader = $service->benefits_header ?? [];
        $benefits = $service->benefits ?? [];
        $processHeader = $service->process_header ?? [];
        $processItems = $service->process ?? [];
        $pricingHeader = $service->pricing_header ?? [];
        $pricingPlans = $service->pricing ?? [];
        $faqs = \App\Models\Faq::whereJsonContains('pages', 'services')
            ->orWhereJsonContains('pages', 'services/' . $service->slug)
            ->get();

        return view('service-page', compact(
            'service',
            'heroSettings',
            'overviewSettings',
            'benefitHeader',
            'benefits',
            'processHeader',
            'processItems',
            'pricingHeader',
            'pricingPlans',
            'slug',
            'faqs',
            'service'
        ));
    }
}
