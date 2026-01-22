@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
<h1 class="text-2xl font-bold mb-6">Edit Post</h1>

<form method="POST"
      action="{{ route('admin.posts.update', $post) }}"
      enctype="multipart/form-data"
      class="space-y-6 bg-white p-6 rounded-xl shadow">

    @csrf
    @method('PUT')

    <div>
        <label class="block font-medium mb-1">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $post->title) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block font-medium mb-1">Excerpt</label>
        <textarea name="excerpt" rows="2"
                  class="w-full border rounded-lg px-4 py-2">{{ old('excerpt', $post->excerpt) }}</textarea>
    </div>

    <div>
        <label class="block font-medium mb-1">Body</label>
        <textarea name="body" rows="8"
                  class="w-full border rounded-lg px-4 py-2">{{ old('body', $post->body) }}</textarea>
    </div>

    <div>
        <label class="block font-medium mb-1">Featured Image</label>
        <input type="file" name="featured_image">
        @if($post->featured_image)
            <img src="{{ asset('storage/'.$post->featured_image) }}"
                 class="h-24 mt-2 rounded">
        @endif
    </div>

    <button class="bg-green-600 text-white px-6 py-3 rounded-lg">
        Update Post
    </button>
</form>
</section>
@endsection
