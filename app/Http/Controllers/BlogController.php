<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories for the dropdown
        $categories = Category::orderBy('name')->get();

        // Query posts
        $posts = Post::where('is_published', true)
            ->when($request->search, function ($q) use ($request) {
                $q->where(function($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->search . '%')
                          ->orWhere('excerpt', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->latest()
            ->paginate(6)
            ->withQueryString(); // keeps search/category in pagination links

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
