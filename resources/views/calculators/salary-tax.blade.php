@extends('layouts.app')

@section('title', 'Salary Tax Calculator (Nigeria)')
@section('meta_description', 'Calculate PAYE salary tax in Nigeria using our free salary tax calculator.')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-4" data-aos="fade-up">
        Salary Tax Calculator (Nigeria)
    </h1>

    <p class="text-gray-600 mb-8" data-aos="fade-up" data-aos-delay="100">
        Estimate how much PAYE tax is deducted from your salary in Nigeria.
    </p>

    <form method="POST" action="{{ route('calculators.salary-tax.calculate') }}"
          class="bg-white p-6 rounded-xl shadow space-y-6"
          data-aos="fade-up" data-aos-delay="200">
        @csrf

        <div>
            <label class="block font-medium mb-2">Monthly Salary (₦)</label>
            <input
                type="number"
                name="monthly_salary"
                value="{{ old('monthly_salary') }}"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="e.g. 300000"
                required
            >
        </div>

        <button
            type="submit"
            class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
            Calculate Tax
        </button>
    </form>

    @isset($monthlyTax)
        <div class="mt-10 bg-green-50 p-6 rounded-xl" data-aos="fade-up">
            <h2 class="text-xl font-semibold mb-4">Results</h2>

            <ul class="space-y-2 text-gray-700">
                <li><strong>Monthly Salary:</strong> ₦{{ number_format($monthlySalary, 2) }}</li>
                <li><strong>Annual Salary:</strong> ₦{{ number_format($annualSalary, 2) }}</li>
                <li><strong>Estimated Monthly Tax:</strong> ₦{{ number_format($monthlyTax, 2) }}</li>
                <li><strong>Estimated Annual Tax:</strong> ₦{{ number_format($annualTax, 2) }}</li>
            </ul>

            <p class="text-sm text-gray-500 mt-4">
                ⚠️ This is an estimate based on Nigerian PAYE rules and is for informational purposes only.
            </p>
        </div>
    @endisset
</section>
@endsection
