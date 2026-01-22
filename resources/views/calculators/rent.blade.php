@extends('layouts.app')

@section('title', 'Rent Affordability Calculator')
@section('meta_description', 'Find out how much rent you can afford in Nigeria.')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-6">
        Rent Affordability Calculator
    </h1>

    <form method="POST"
          action="{{ route('calculators.rent.calculate') }}"
          class="bg-white p-6 rounded-xl shadow space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-2">
                Monthly Income (₦)
            </label>
            <input type="number"
                   name="income"
                   class="w-full border rounded-lg px-4 py-2"
                   required>
        </div>

        <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold">
            Calculate Rent
        </button>
    </form>

    @isset($recommendedRent)
        <div class="mt-8 bg-green-50 p-6 rounded-xl">
            <p class="text-lg">
                Recommended Monthly Rent:
                <strong>₦{{ number_format($recommendedRent, 2) }}</strong>
            </p>
            <p class="text-sm text-gray-600 mt-2">
                This follows the 30% income rule.
            </p>
        </div>
    @endisset
</section>
@endsection
