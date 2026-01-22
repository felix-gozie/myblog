<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class PostAdminController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'excerpt' => 'required',
            'body'    => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = null;

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')
                ->store('posts', 'public');
        }

        Post::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body'    => $request->body,
            'featured_image' => $imagePath,
             'is_published' => true,
             'is_featured' => $request->has('is_featured'),
             'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully');
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   => 'required',
            'excerpt' => 'required',
            'body'    => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {

            // delete old image
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $post->featured_image = $request->file('featured_image')
                ->store('posts', 'public');
        }

        $post->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body'    => $request->body,
            'is_published' => $request->has('is_published'),
             'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully');
    }
    public function destroy(Post $post)
    {
        // Delete featured image from storage if it exists
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

}
