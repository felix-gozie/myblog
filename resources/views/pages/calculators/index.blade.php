@extends('layouts.app')

@section('title', 'Free Financial Calculators for Nigerians')
@section('meta_description', 'Use free Nigerian financial calculators to estimate salary tax, loan repayments, and rent affordability.')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-16">

    <!-- PAGE HEADER -->
    <div class="max-w-3xl mb-14">
        <h1 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
            Free Financial Calculators
        </h1>

        <p class="text-gray-600 text-lg" data-aos="fade-up">
            Practical tools built for Nigerians to help you make smarter
            salary, loan, and rent decisions.
        </p>
    </div>

    <!-- TOOLS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- SALARY TAX -->
        <a href="{{ route('calculators.salary-tax') }}"
           class="group bg-white rounded-2xl shadow p-7 hover:shadow-xl transition">

            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-600 mb-4">
                ₦
            </div>

            <h3 class="font-semibold text-lg mb-2 group-hover:text-green-600">
                Salary Tax Calculator
            </h3>

            <p class="text-gray-600 text-sm mb-4">
                Estimate PAYE deductions based on Nigerian tax bands.
            </p>

            <span class="text-sm font-semibold text-green-600">
                Calculate now →
            </span>
        </a>

        <!-- LOAN -->
        <a href="{{ route('calculators.loan') }}"
           class="group bg-white rounded-2xl shadow p-7 hover:shadow-xl transition">

            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 text-blue-600 mb-4">
                %
            </div>

            <h3 class="font-semibold text-lg mb-2 group-hover:text-blue-600">
                Loan Repayment Calculator
            </h3>

            <p class="text-gray-600 text-sm mb-4">
                Calculate monthly repayments and interest on loans.
            </p>

            <span class="text-sm font-semibold text-blue-600">
                Calculate now →
            </span>
        </a>

        <!-- RENT -->
        <a href="{{ route('calculators.rent') }}"
           class="group bg-white rounded-2xl shadow p-7 hover:shadow-xl transition">

            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-purple-100 text-purple-600 mb-4">
                🏠
            </div>

            <h3 class="font-semibold text-lg mb-2 group-hover:text-purple-600">
                Rent Affordability Tool
            </h3>

            <p class="text-gray-600 text-sm mb-4">
                Find out how much rent you can comfortably afford.
            </p>

            <span class="text-sm font-semibold text-purple-600">
                Calculate now →
            </span>
        </a>

    </div>

    <!-- TRUST / DISCLAIMER -->
    <div class="mt-16 max-w-4xl">
        <p class="text-sm text-gray-500 leading-relaxed">
            <strong>Disclaimer:</strong>
            These calculators provide estimates based on Nigerian averages
            and common financial assumptions. Results may differ from official
            figures or lender terms.
        </p>
    </div>

    <!-- CONTENT CTA (IMPORTANT FOR ARBITRAGE) -->
    <div class="mt-14 bg-gray-100 rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <h3 class="text-xl font-semibold mb-2">
                Want to understand the numbers better?
            </h3>
            <p class="text-gray-600">
                Read our simple money guides written for Nigerians.
            </p>
        </div>

        <a href="{{ route('blog') }}"
           class="inline-block bg-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-700 transition">
            Read Money Guides
        </a>
    </div>

</section>
@endsection
