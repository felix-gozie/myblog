@extends('layouts.app')

@section('title', 'Create Blog Post')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
    <h1 class="text-2xl font-bold mb-6">Create New Post</h1>

    <form method="POST"
          action="{{ route('admin.posts.store') }}"
          enctype="multipart/form-data"
          class="space-y-6 bg-white p-6 rounded-xl shadow">

        @csrf

        <!-- Title -->
        <div>
            <label class="block font-medium mb-1">Title</label>
            <input type="text" name="title"
                   class="w-full border rounded-lg px-4 py-2"
                   required>
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block font-medium mb-1">Excerpt</label>
            <textarea name="excerpt" rows="2"
                      class="w-full border rounded-lg px-4 py-2"
                      required></textarea>
        </div>

        <!-- Category -->
        <div>
            <label class="block font-medium mb-1">Category</label>
            <select name="category_id"
                    class="w-full border rounded-lg px-4 py-2"
                    required>
                <option value="">Select category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <!-- Featured Image -->
        <div>
            <label class="block font-medium mb-1">Featured Image</label>
            <input type="file"
                   name="featured_image"
                   accept="image/*"
                   class="w-full border rounded-lg px-4 py-2">
            <p class="text-sm text-gray-500 mt-1">
            </p>
        </div>

        <!-- Body -->
        <div>
            <label class="block font-medium mb-1">Body</label>
            <textarea name="body" rows="8"class="w-full border rounded-lg px-4 py-2"required></textarea>
        </div>

        <div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1">
                Feature this post
            </label>
        </div>
        <!-- Publish -->
        <button class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold">
            Publish Post
        </button>
    </form>
</section>
@endsection
