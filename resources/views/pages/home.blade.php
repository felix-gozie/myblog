@extends('layouts.app')

@section('title', 'SmartMoneyNG – Financial Tools for Nigerians')
@section('meta_description', 'Calculate salary tax, loans, rent affordability and manage money smarter in Nigeria.')

@section('content')

<section class="bg-gradient-to-br from-green-600 to-green-800 text-white relative overflow-hidden">

    <div class="absolute inset-0" id="heroSlider">
        <img src="/images/zik.jpg" class="hero-slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
        <img src="/images/mok.jpg" class="hero-slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
        <img src="/images/braid.jpg" class="hero-slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-6" data-aos="fade-up">
            Make Smarter Money Decisions in Nigeria
        </h1>

        <p class="max-w-2xl mx-auto text-lg mb-8" data-aos="fade-up" data-aos-delay="150">
            Calculate salary tax, loan repayments, rent affordability, and plan your finances with simple tools built for Nigerians.
        </p>

        <a href="{{ route('calculators') }}"
           class="inline-block bg-white text-green-700 px-8 py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition"
           data-aos="zoom-in" data-aos-delay="300">
            Use Free Tools
        </a>
    </div>
</section>

{{-- CALCULATORS --}}
<section class="max-w-7xl mx-auto px-4 pt-8 pb-16 md:py-16">
    <h2 class="text-lg sm:text-xl md:text-3xl font-bold text-center mb-8"
        data-aos="fade-up">
        Financial Calculators
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <a href="{{ route('calculators.salary-tax') }}"
           class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition"
           data-aos="fade-up">
            <h3 class="text-xl font-semibold mb-2">Salary Tax Calculator</h3>
            <p class="text-gray-600 mb-4">
                Know how much tax is deducted from your salary.
            </p>
        </a>

        <a href="{{ route('calculators.loan') }}"
           class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition"
           data-aos="fade-up">
            <h3 class="text-xl font-semibold mb-2">Loan Repayment Calculator</h3>
            <p class="text-gray-600 mb-4">
                Calculate monthly loan repayments before borrowing.
            </p>
        </a>

        <a href="{{ route('calculators.rent') }}"
           class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition"
           data-aos="fade-up">
            <h3 class="text-xl font-semibold mb-2">Rent Affordability Tool</h3>
            <p class="text-gray-600 mb-4">
                Know how much rent you can comfortably afford.
            </p>
        </a>

    </div>
</section>

{{-- LATEST GUIDES --}}
@if($featuredPosts->count())
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center" data-aos="fade-up">
        Latest Money Guides
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($featuredPosts as $post)
            <a href="{{ route('blog.show', $post->slug) }}"
               class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">

                @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                         class="w-full h-48 object-cover">
                @endif

                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-2">
                        {{ $post->title }}
                    </h3>
                    <p class="text-gray-600 text-sm">
                        {{ $post->excerpt }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endif

{{-- FAQ SECTION --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-10" data-aos="fade-up">
            Frequently Asked Questions
        </h2>

        <div class="space-y-4">

            <details class="bg-white rounded-xl shadow p-5">
                <summary class="font-semibold cursor-pointer">
                    Are these financial calculators free to use?
                </summary>
                <p class="text-gray-600 mt-3 text-sm">
                    Yes. All calculators on SmartMoneyNG are completely free and require no registration.
                </p>
            </details>

            <details class="bg-white rounded-xl shadow p-5">
                <summary class="font-semibold cursor-pointer">
                    Are the salary tax calculations accurate for Nigeria?
                </summary>
                <p class="text-gray-600 mt-3 text-sm">
                    Yes. Our salary tax calculator follows Nigerian PAYE rules and common deductions.
                </p>
            </details>

            <details class="bg-white rounded-xl shadow p-5">
                <summary class="font-semibold cursor-pointer">
                    Can I trust the loan and rent calculations?
                </summary>
                <p class="text-gray-600 mt-3 text-sm">
                    The tools provide realistic estimates to guide financial decisions, but final terms may vary by lender or landlord.
                </p>
            </details>

            <details class="bg-white rounded-xl shadow p-5">
                <summary class="font-semibold cursor-pointer">
                    Do I need to create an account to use the tools?
                </summary>
                <p class="text-gray-600 mt-3 text-sm">
                    No account is required. You can use all tools instantly without signing up.
                </p>
            </details>

        </div>
    </div>
</section>

@endsection
