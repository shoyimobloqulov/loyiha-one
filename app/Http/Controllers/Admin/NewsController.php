<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|max:255',
            'description'   => 'required|string',
            'image'         => 'mimes:jpg,bmp,png',
            'category_id'   => 'required|exists:categories,id',
        ]);

        // Create a new item instance
        $item = new News();
        $item->title = $request->input('title');
        $item->slug = $request->input('slug');
        $item->description = $request->input('description');
        $item->category_id = $request->input('category_id');
        $item->user_id = auth()->user()->id;
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news-image', 'public');
            $item->image = $imagePath;
        }

        $item->save();

        // Redirect or return a response as needed
        return redirect()->route('news.index')->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::find($id);
        $categories = Category::all();
        return view('admin.news.edit',compact('news','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and maximum file size as needed
            'category_id' => 'required|exists:categories,id',
        ]);

        $item = News::findOrFail($id);
        $item->title = $request->input('title');
        $item->slug = $request->input('slug');
        $item->description = $request->input('description');
        $item->category_id = $request->input('category_id');
        $item->user_id = auth()->user()->id;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('news-image', 'public');
            $item->image = $imagePath;
        }

        $item->save();

        // Redirect or return a response as needed
        return redirect()->route('news.index')->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = News::findOrFail($id);

        // Delete the item's image from storage if it exists
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();
        return redirect()->route('news.index');
    }
}
