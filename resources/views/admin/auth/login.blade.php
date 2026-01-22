@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <form method="POST" action="{{ route('admin.login.submit') }}"
          class="bg-white p-8 md:p-10 rounded-xl shadow-lg w-full max-w-md md:max-w-lg">
        @csrf

        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center text-green-700">
            Admin Login
        </h2>

        <input type="email" name="email" placeholder="Email"
               class="w-full border border-gray-300 p-3 rounded mb-4 focus:ring-2 focus:ring-green-600 focus:outline-none"
               required>

        <input type="password" name="password" placeholder="Password"
               class="w-full border border-gray-300 p-3 rounded mb-6 focus:ring-2 focus:ring-green-600 focus:outline-none"
               required>

        <button
            class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800 transition">
            Login
        </button>

        @error('email')
            <p class="text-red-600 text-sm mt-4 text-center">{{ $message }}</p>
        @enderror
    </form>
</section>
@endsection
