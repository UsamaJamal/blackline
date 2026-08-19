<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Blog::select('category')->distinct()->pluck('category')->toArray();
        $blogs = \App\Models\Blog::latest()->get();

        $seoSetting = \App\Models\Setting::where('key', 'seo_blogs')->first();
        $seo = $seoSetting ? $seoSetting->value : null;

        return view('blog', compact('categories', 'blogs', 'seo'));
    }

    public function show($slug)
    {
        $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
                            ->latest()
                            ->take(3)
                            ->get();
                            
        return view('blog-post', compact('blog', 'relatedBlogs'));
    }
}
