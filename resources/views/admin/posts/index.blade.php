@extends('layouts.app')

@section('title', 'Manage Blog Posts')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Blog Posts</h1>
        <a href="{{ route('admin.posts.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded-lg">
            + New Post
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Title</th>
                    <th class="p-3">Slug</th>
                    <th class="p-3">Created</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                    <tr class="border-t">
                        <td class="p-3">{{ $post->title }}</td>

                        <td class="p-3 text-sm text-gray-500">
                            {{ $post->slug }}
                        </td>

                        <td class="p-3 text-sm">
                            {{ $post->created_at->format('d M Y') }}
                        </td>

                        <td class="p-3 text-right">
                            <div class="flex justify-end gap-4">

                                <!-- Edit -->
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form method="POST"
                                    action="{{ route('admin.posts.destroy', $post) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
