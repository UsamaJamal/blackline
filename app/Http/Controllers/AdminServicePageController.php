<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class AdminServicePageController extends Controller
{
    public function index()
    {
        $pages = Service::all();
        return view('admin.services.index', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug'
        ]);

        $slug = Str::slug($request->slug);

        $id = Str::uuid()->toString();
        
        $template = [
            'id' => $id,
            'title' => $request->title,
            'slug' => $slug,
            'hero' => [
                'image' => 'assets/pdf/asset-12.png',
                'small_text' => strtoupper($request->title),
                'heading' => 'Scale Your Business With Professional Services.',
                'btn_text' => 'Book a Discovery Call&nbsp; →',
                'btn_link' => '#contact'
            ],
            'overview' => [
                'label' => 'OVERVIEW',
                'description' => 'Write a paragraph here describing the service...',
                'sub_heading' => 'What We Offer:',
                'bullets' => "Feature 1\nFeature 2",
                'image' => 'assets/pdf/asset-08.png'
            ],
            'benefits_header' => [
                'heading' => 'What We Can Do for Your Brand',
                'description' => 'Brief overview of benefits...'
            ],
            'benefits' => [
                ['id' => '1', 'icon' => 'assets/icons/benefit-brand.png', 'title' => 'First Benefit', 'description' => 'Benefit description goes here...']
            ],
            'process_header' => [
                'subheading' => 'PROCESS',
                'heading' => 'Our Workflow'
            ],
            'process' => [
                ['id' => '1', 'title' => 'Discover', 'description' => 'We research your goals...', 'icon' => 'assets/icons/search.svg']
            ],
            'pricing_header' => [
                'heading' => 'Our Packages',
                'highlight' => 'Packages',
                'description' => 'Select a plan that works best for you.'
            ],
            'pricing' => [
                ['id' => '1', 'name' => 'Starter', 'description' => 'Perfect package for beginners.', 'price' => '3,000', 'price_small' => '/month', 'btn_text' => 'Speak to Us', 'btn_link' => '#contact', 'bullets' => "Feature one\nFeature two", 'best_for' => 'Startups']
            ]
        ];

        Service::create($template);

        return redirect()->route('admin.services.hero', $slug)->with('success', 'Service page created successfully!');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        
        if ($service) {
            $service->delete();
            return redirect()->route('admin.services.index')->with('success', 'Service page deleted successfully!');
        }

        return redirect()->route('admin.services.index')->withErrors('Service page not found.');
    }

    /**
     * Hero Edit
     */
    public function editHero($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $heroSettings = $service->hero ?? [];
        return view('admin.service-hero', compact('heroSettings', 'slug'));
    }

    public function updateHero(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'small_text' => 'required|string',
            'heading' => 'required|string',
            'btn_text' => 'required|string',
            'btn_link' => 'required|string',
            'image' => 'nullable|image|max:5000',
            'mobile_image' => 'nullable|image|max:5000'
        ]);

        $hero = $service->hero ?? [];
        $imagePath = $hero['image'] ?? 'assets/pdf/asset-12.png';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/service'), $filename);
            $imagePath = 'images/service/' . $filename;
        }

        $mobileImagePath = $hero['mobile_image'] ?? null;
        if ($request->hasFile('mobile_image')) {
            $mobileFile = $request->file('mobile_image');
            $mobileFilename = 'mob_' . time() . '_' . $mobileFile->getClientOriginalName();
            $mobileFile->move(public_path('images/service'), $mobileFilename);
            $mobileImagePath = 'images/service/' . $mobileFilename;
        }

        $service->update([
            'hero' => [
                'image' => $imagePath,
                'mobile_image' => $mobileImagePath,
                'small_text' => $request->small_text,
                'heading' => $request->heading,
                'btn_text' => $request->btn_text,
                'btn_link' => $request->btn_link
            ]
        ]);

        return back()->with('success', 'Hero settings updated successfully!');
    }

    /**
     * Overview Edit
     */
    public function editOverview($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $overviewSettings = $service->overview ?? [];
        return view('admin.service-overview', compact('overviewSettings', 'slug'));
    }

    public function updateOverview(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'label' => 'required|string',
            'description' => 'required|string',
            'sub_heading' => 'required|string',
            'bullets' => 'required|string',
            'image' => 'nullable|image|max:5000'
        ]);

        $overview = $service->overview ?? [];
        $imagePath = $overview['image'] ?? 'assets/pdf/asset-08.png';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/service'), $filename);
            $imagePath = 'images/service/' . $filename;
        }

        $service->update([
            'overview' => [
                'label' => $request->label,
                'description' => $request->description,
                'sub_heading' => $request->sub_heading,
                'bullets' => $request->bullets,
                'image' => $imagePath
            ]
        ]);

        return back()->with('success', 'Overview settings updated successfully!');
    }

    /**
     * SEO Settings Edit
     */
    public function editSeo($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admin.service-seo', compact('service', 'slug'));
    }

    public function updateSeo(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string'
        ]);

        $service->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords
        ]);

        return back()->with('success', 'SEO settings updated successfully!');
    }

    /**
     * Update Headers for Benefits, Process, Pricing
     */
    public function updateBenefitsHeader(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'heading' => 'required|string',
            'description' => 'required|string'
        ]);

        $service->update([
            'benefits_header' => [
                'heading' => $request->heading,
                'description' => $request->description
            ]
        ]);

        return back()->with('success', 'Benefits header updated successfully!');
    }

    public function updateProcessHeader(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'subheading' => 'required|string',
            'heading' => 'required|string'
        ]);

        $service->update([
            'process_header' => [
                'subheading' => $request->subheading,
                'heading' => $request->heading
            ]
        ]);

        return back()->with('success', 'Process header updated successfully!');
    }

    public function updatePricingHeader(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'heading' => 'required|string',
            'highlight' => 'nullable|string',
            'description' => 'required|string'
        ]);

        $service->update([
            'pricing_header' => [
                'heading' => $request->heading,
                'highlight' => $request->highlight,
                'description' => $request->description
            ]
        ]);

        return back()->with('success', 'Pricing header updated successfully!');
    }
}
