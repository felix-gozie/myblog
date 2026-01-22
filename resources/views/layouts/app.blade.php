<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SmartMoneyNG')</title>

    <!-- SEO -->
    <meta name="description" content="@yield('meta_description', 'Helping Nigerians make smarter money decisions')">

    <!-- Tailwind (CDN for now; move to Vite later) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Accessibility: Skip link -->
    <a href="#main-content" class="sr-only focus:not-sr-only">Skip to content</a>

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}"
                    alt="SmartMoneyNG"
                    class="h-16 w-auto">
            </a>


            <!-- Desktop Nav -->
            <nav class="hidden md:flex space-x-6 font-medium">
                <a href="{{ route('calculators') }}" class="hover:text-green-600">Tools</a>
                <a href="{{ route('blog') }}" class="hover:text-green-600">Guides</a>
                <a href="{{ route('about') }}" class="hover:text-green-600">About</a>
                <a href="{{ route('contact') }}" class="hover:text-green-600">Contact</a>


                @if(Auth::guard('admin')->check())
                    <a href="{{ route('admin.dashboard') }}"
                    class="bg-green-600 text-white px-4  rounded-lg hover:bg-green-700">
                        Admin
                    </a>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="text-red-600 hover:underline ml-2">
                            Logout
                        </button>
                    </form>
                @endif
            </nav>

            <!-- Hamburger (Mobile) -->
            <button id="menuBtn" class="md:hidden text-gray-700 focus:outline-none" aria-label="Toggle menu">
            <!-- Hamburger Icon -->
            <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg"
                 class="h-7 w-7 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <!-- X Icon -->
            <svg id="iconClose" xmlns="http://www.w3.org/2000/svg"
                 class="h-7 w-7 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
            <nav class="flex flex-col px-4 py-4 space-y-3 font-medium">
                <a href="{{ route('calculators') }}" class="hover:text-green-600">Tools</a>
                <a href="{{ route('blog') }}" class="hover:text-green-600">Guides</a>
                <a href="{{ route('about') }}" class="hover:text-green-600">About</a>
                <a href="{{ route('contact') }}" class="hover:text-green-600">Contact</a>

                @if(Auth::guard('admin')->check())
                    <a href="{{ route('admin.dashboard') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded">
                        Admin Dashboard
                    </a>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="text-red-600 text-left">
                            Logout
                        </button>
                    </form>
                @endif

            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- NOTE: Footer should ONLY contain trust & legal info.
         DO NOT put: ads, sliders, calculators, CTAs, signup forms, popups, or clickbait here. -->
    <footer class="bg-gray-900 text-gray-300 py-10 mt-20">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <a href="{{ route('home') }}" class="mb-2 text-lg tracking-tight" style="font-family: 'Poppins', sans-serif;">
                    <span class="font-semibold text-green-700">Smart</span>
                    <span class="font-bold text-green-800">Money</span>NG
                </a>

                <p class="text-sm">Free financial tools and guides designed for Nigerians.</p>
            </div>

            <div>
                <h4 class="font-semibold mb-2">Legal</h4>
                <ul class="text-sm space-y-1">
                    <li><a href="{{ route('privacy') }}" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:underline">Terms & Conditions</a></li>
                    <li><a href="{{ route('disclaimer') }}" class="hover:underline">Disclaimer</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-2">Contact</h4>
                <p class="text-sm">support@smartmoneyng.com</p>
            </div>
        </div>
    </footer>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1200 });

        // Mobile menu toggle
        const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const iconOpen = document.getElementById('iconOpen');
    const iconClose = document.getElementById('iconClose');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });

        // Hero slider (safe-guarded)
        const slides = document.querySelectorAll('.hero-slide');
        if (slides.length > 0) {
            let currentSlide = 0;
            setInterval(() => {
                slides[currentSlide].classList.remove('opacity-100');
                slides[currentSlide].classList.add('opacity-0');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.remove('opacity-0');
                slides[currentSlide].classList.add('opacity-100');
            }, 5000);
        }
    </script>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
