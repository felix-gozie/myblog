@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt)

@section('content')
<section class="max-w-3xl mx-auto px-4 py-16">

    {{-- Featured Image --}}
    @if($post->featured_image)
        <img src="{{ asset('storage/' . $post->featured_image) }}"
             alt="{{ $post->title }}"
             class="w-full rounded-2xl mb-8 object-cover">
    @endif

    <article class="prose max-w-none">
        <h1>{{ $post->title }}</h1>
        {!! nl2br(e($post->body)) !!}
    </article>

    <div class="mt-10 bg-green-50 p-4 rounded-lg">
        👉 Try our
        <a href="{{ route('calculators.salary-tax') }}" class="text-green-600 font-semibold">
            Salary Tax Calculator
        </a>
    </div>
</section>
@endsection
