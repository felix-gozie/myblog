@extends('layouts.app')

@section('title', 'Money Guides for Nigerians')
@section('meta_description', 'Simple money guides on salary, tax, rent, loans and savings for Nigerians.')

@section('content')

{{-- HEADER --}}
<section class="max-w-7xl mx-auto px-4 pt-16 pb-6">
    <h1 class="text-3xl font-bold mb-4" data-aos="fade-up">
        Money Guides for Nigerians
    </h1>
    <p class="text-gray-600 max-w-2xl" data-aos="fade-up" data-aos-delay="100">
        Practical guides to help you save money, avoid debt, and make smarter financial decisions in Nigeria.
    </p>
</section>

{{-- SEARCH + FILTER --}}
<section class="max-w-7xl mx-auto px-4 pb-8">
    <form method="GET"
          class="flex flex-col md:flex-row gap-4"
          data-aos="fade-up"
          data-aos-delay="150">

        <input
            type="text"
            name="search"
            placeholder="Search money guides..."
            value="{{ request('search') }}"
            class="w-full md:w-2/3 border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">

        <select name="category"
                onchange="this.form.submit()"
                class="w-full md:w-1/3 border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>
</section>

{{-- ARTICLES --}}
<section class="max-w-7xl mx-auto px-4 pb-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        @forelse ($posts as $post)
            <a href="{{ route('blog.show', $post->slug) }}"
               class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden group">

                @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                @endif

                <div class="p-6">
                    {{-- CATEGORY BADGE --}}
                    @if($post->category)
                        <span class="inline-block text-xs font-semibold text-green-700 bg-green-100 px-3 py-1 rounded-full mb-3">
                            {{ $post->category->name }}
                        </span>
                    @endif

                    <h2 class="font-semibold text-lg mb-2 leading-snug">
                        {{ $post->title }}
                    </h2>

                    <p class="text-gray-600 text-sm mb-4">
                        {{ $post->excerpt }}
                    </p>

                    <div class="text-xs text-gray-400">
                        {{ $post->created_at->format('M d, Y') }}
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-16">
                <p class="text-gray-500 mb-4">
                    No guides found for your search.
                </p>
                <a href="{{ route('blog') }}"
                   class="text-green-600 font-semibold underline">
                    View all guides
                </a>
            </div>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="mt-12">
        {{ $posts->withQueryString()->links() }}
    </div>
</section>

{{-- CTA --}}
<section class="bg-green-50 py-14">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h3 class="text-xl md:text-2xl font-semibold mb-4">
            Want instant answers instead?
        </h3>
        <p class="text-gray-600 mb-6">
            Use our free calculators to estimate tax, loans, and rent affordability.
        </p>
        <a href="{{ route('calculators') }}"
           class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition">
            Use Free Calculators
        </a>
    </div>
</section>

@endsection
