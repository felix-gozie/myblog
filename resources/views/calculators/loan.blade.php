@extends('layouts.app')

@section('title', 'Loan Repayment Calculator')
@section('meta_description', 'Estimate monthly loan repayments in Nigeria.')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-6">Loan Repayment Calculator</h1>

    <form method="POST"
          action="{{ route('calculators.loan.calculate') }}"
          class="bg-white p-6 rounded-xl shadow space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-2">Loan Amount (₦)</label>
            <input type="number" name="amount" class="w-full border rounded-lg px-4 py-2" required>
        </div>

        <div>
            <label class="block font-medium mb-2">Interest Rate (%)</label>
            <input type="number" step="0.01" name="rate" class="w-full border rounded-lg px-4 py-2" required>
        </div>

        <div>
            <label class="block font-medium mb-2">Loan Duration (Months)</label>
            <input type="number" name="months" class="w-full border rounded-lg px-4 py-2" required>
        </div>

        <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold">
            Calculate Loan
        </button>
    </form>

    @isset($monthlyPayment)
        <div class="mt-8 bg-green-50 p-6 rounded-xl">
            <p><strong>Monthly Payment:</strong> ₦{{ number_format($monthlyPayment, 2) }}</p>
            <p><strong>Total Repayment:</strong> ₦{{ number_format($totalPayment, 2) }}</p>
        </div>
    @endisset
</section>
@endsection
