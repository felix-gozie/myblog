@extends('layouts.app')

@section('title', 'About SmartMoneyNG')
@section('meta_description', 'Learn about SmartMoneyNG and our mission to help Nigerians make smarter financial decisions.')

@section('content')

<section class="max-w-6xl mx-auto px-4 py-16">

    <!-- PAGE TITLE -->
    <h1 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">
        About SmartMoneyNG
    </h1>

    <!-- INTRO -->
    <p class="text-gray-700 mb-4 max-w-3xl" data-aos="fade-up" data-aos-delay="100">
        SmartMoneyNG is a free financial education platform created to help Nigerians
        make smarter money decisions using simple tools and practical financial guides.
    </p>

    <p class="text-gray-700 mb-6 max-w-3xl" data-aos="fade-up" data-aos-delay="200">
        We believe that understanding money should not be complicated or expensive.
        Our goal is to break down complex financial topics into clear, easy-to-use calculators
        and articles anyone can understand.
    </p>

    <!-- WHAT WE OFFER -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" data-aos="fade-up" data-aos-delay="300">

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg mb-2">Financial Calculators</h3>
            <p class="text-gray-600 text-sm">
                Salary tax, loan repayment, and rent affordability tools built specifically for Nigeria.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg mb-2">Money Guides</h3>
            <p class="text-gray-600 text-sm">
                Easy-to-read guides that explain personal finance topics in simple language.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg mb-2">Free Access</h3>
            <p class="text-gray-600 text-sm">
                All tools and resources are completely free and require no registration.
            </p>
        </div>

    </div>

    <!-- MISSION -->
    <div class="bg-green-50 border border-green-100 rounded-xl p-6 mb-10"
         data-aos="fade-up" data-aos-delay="400">
        <h2 class="font-semibold text-xl mb-2">Our Mission</h2>
        <p class="text-gray-700">
            To simplify personal finance for Nigerians by providing free,
            accurate, and easy-to-use financial tools and educational content.
        </p>
    </div>

    <!-- TRUST & DISCLAIMER -->
    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6"
         data-aos="fade-up" data-aos-delay="500">
        <h2 class="font-semibold text-lg mb-2">Important Disclaimer</h2>
        <p class="text-gray-600 text-sm leading-relaxed">
            SmartMoneyNG does not provide professional financial, legal, or investment advice.
            All calculators and articles are for informational and educational purposes only.
            Always consult a qualified professional before making financial decisions.
        </p>
    </div>

</section>

@endsection
