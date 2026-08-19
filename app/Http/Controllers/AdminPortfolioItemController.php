<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PortfolioItem;

class AdminPortfolioItemController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        return view('admin.portfolio.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:10000',
            'btn_text' => 'required|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'industry' => 'required|string|max:255',
            'category' => 'required|in:' . implode(',', array_keys(PortfolioItem::$categories))
        ]);

        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/portfolio'), $filename);
            $imagePath = 'images/portfolio/' . $filename;
        }

        PortfolioItem::create([
            'id' => Str::uuid()->toString(),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link ?? '#',
            'industry' => strtolower($request->industry),
            'category' => $request->category,
            'sort_order' => (int) PortfolioItem::max('sort_order') + 1
        ]);

        return redirect()->route('admin.portfolio.items.index')->with('success', 'Portfolio item created successfully!');
    }

    public function edit($id)
    {
        $item = PortfolioItem::findOrFail($id);
        return view('admin.portfolio.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = PortfolioItem::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:10000',
            'btn_text' => 'required|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'industry' => 'required|string|max:255',
            'category' => 'required|in:' . implode(',', array_keys(PortfolioItem::$categories))
        ]);

        $imagePath = $item->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/portfolio'), $filename);
            $imagePath = 'images/portfolio/' . $filename;
        }

        $item->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link ?? '#',
            'industry' => strtolower($request->industry),
            'category' => $request->category
        ]);

        return redirect()->route('admin.portfolio.items.index')->with('success', 'Portfolio item updated successfully!');
    }

    public function destroy($id)
    {
        $item = PortfolioItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.portfolio.items.index')->with('success', 'Portfolio item deleted successfully!');
    }

    /**
     * Set an exact priority number for a project (typed in by the admin).
     * Lower number = shown first.
     */
    public function setOrder(Request $request, $id)
    {
        $request->validate([
            'sort_order' => 'required|integer|min:0'
        ]);

        $item = PortfolioItem::findOrFail($id);
        $item->sort_order = (int) $request->sort_order;
        $item->save();

        return redirect()->route('admin.portfolio.items.index')->with('success', 'Priority updated for "' . $item->title . '".');
    }
}
