@extends('layouts.app')

@section('title', 'Contact SmartMoneyNG')
@section('meta_description', 'Contact SmartMoneyNG via WhatsApp or email for questions, feedback, or support.')

@section('content')
<section class="max-w-5xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-up">
        Contact Us
    </h1>

    <p class="text-gray-600 mb-10 max-w-2xl" data-aos="fade-up" data-aos-delay="100">
        Have questions, feedback, or need support?  
        Reach out to us directly using WhatsApp or email.
    </p>

    <div class="grid md:grid-cols-2 gap-6" data-aos="fade-up" data-aos-delay="200">
        <!-- WhatsApp -->
        <a href="https://wa.me/2347042060282"
           target="_blank"
           class="flex items-center gap-4 p-6 bg-white rounded-xl shadow hover:shadow-md transition">
            <div class="bg-green-100 text-green-600 p-3 rounded-full">
                <!-- WhatsApp Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 2.1.55 4.15 1.6 5.96L2 22l4.24-1.7a9.84 9.84 0 0 0 5.8 1.86h.01c5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.77 14.04c-.24.67-1.39 1.28-1.95 1.36-.52.08-1.18.11-1.9-.12-.43-.14-.99-.32-1.7-.62-3-1.29-4.95-4.3-5.1-4.5-.15-.2-1.22-1.62-1.22-3.1 0-1.48.78-2.21 1.05-2.52.27-.31.6-.39.8-.39.2 0 .4 0 .58.01.19.01.44-.07.69.53.24.6.83 2.07.9 2.22.07.15.12.34.02.55-.1.21-.15.34-.3.52-.15.18-.32.4-.46.54-.15.15-.3.31-.13.6.17.29.75 1.24 1.62 2.01 1.12.99 2.06 1.3 2.35 1.45.29.15.46.13.63-.08.17-.21.72-.84.92-1.13.2-.29.4-.24.67-.15.27.09 1.7.8 1.99.95.29.15.48.22.55.34.07.12.07.7-.17 1.37z"/>
                </svg>
            </div>

            <div>
                <p class="font-semibold text-lg">Chat on WhatsApp</p>
                <p class="text-gray-600 text-sm">
                    Fastest way to reach us
                </p>
            </div>
        </a>

        <!-- Email -->
        <a href="mailto:support@smartmoneyng.com"
           class="flex items-center gap-4 p-6 bg-white rounded-xl shadow hover:shadow-md transition">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                <!-- Email Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8m-18 8h18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H3a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z"/>
                </svg>
            </div>

            <div>
                <p class="font-semibold text-lg">Email Support</p>
                <p class="text-gray-600 text-sm">
                    support@smartmoneyng.com
                </p>
            </div>
        </a>
    </div>
</section>
@endsection
