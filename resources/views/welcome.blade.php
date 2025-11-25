<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HBMS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
      <!-- NAVIGATION BAR -->
<nav class="w-full bg-gray-900 text-white border-b border-gray-800 fixed top-0 left-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">


        <div class="flex items-center gap-3">
            <img src="https://cdn-icons-png.flaticon.com/512/235/235889.png" class="w-10 opacity-90">
            <span class="text-xl font-bold text-green-400">HBMS</span>
        </div>


        <div class="hidden md:flex items-center gap-8 text-gray-300">

            <a href="{{ route('login') }}"
                class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-semibold shadow transition">
                Login
            </a>

            <a href="{{ route('register') }}"
                class="px-4 py-2 border border-green-500 text-green-400 hover:bg-green-500/20 rounded-lg font-semibold transition">
                Register
            </a>
        </div>

        <!-- MOBILE MENU ICON -->
        <div class="md:hidden">
            <button id="mobileMenuBtn" class="text-gray-300 text-2xl hover:text-green-400 transition">
                ☰
            </button>
        </div>
    </div>


</nav>

<!-- MAIN CONTENT SECTION -->
<section class=" text-white py-20 px-6">

<div class="max-w-6xl mx-auto mb-20 text-center">
    <h2 class="text-3xl font-bold text-green-400 mb-4">Welcome to HBMS</h2>
    <p id="typingText" class="text-xl text-gray-700"></p>
</div>

<div class="max-w-5xl mx-auto mb-20">
    <h2 class="text-4xl font-bold text-green-400 mb-6">Gallery</h2>

    <div class="relative w-full overflow-hidden rounded-xl border border-gray-800">

        <div id="carousel" class="flex transition-all duration-700">
            <img src="{{asset('images/hotel-room1.jpg')}}" class="w-full flex-shrink-0">
            <img src="{{asset('images/hotel2.jpg')}}" class="w-full flex-shrink-0">
            <img src="{{asset('images/hotel3.jpg')}}" class="w-full flex-shrink-0">
        </div>

    </div>
</div>



    <div class="max-w-6xl mx-auto mb-20">
        <h2 class="text-4xl font-bold text-green-400 mb-6">About Us</h2>
        <p class="text-gray-700 leading-relaxed text-lg">
            The Hotel Booking Management System (HBMS) of
            <span class="font-semibold text-white">Makati Science and Technology Institute of the Philippines</span>
            provides an efficient and user-friendly platform for room scheduling, reservations, and facility management.
            Our aim is to modernize and streamline booking processes for guests, students, and staff by offering
            a reliable, fast, and secure digital solution.
        </p>
    </div>


    <div class="max-w-6xl mx-auto mb-20">
        <h2 class="text-4xl font-bold text-green-400 mb-10">Our Services</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="p-8 bg-gray-900 border border-gray-800 rounded-xl shadow hover:border-green-400/40 transition-all">
                <h3 class="text-2xl font-semibold text-green-300 mb-2">Room Booking</h3>
                <p class="text-gray-400 text-sm">
                    Reserve rooms quickly and seamlessly with our intuitive booking interface.
                </p>
            </div>

            <div class="p-8 bg-gray-900 border border-gray-800 rounded-xl shadow hover:border-green-400/40 transition-all">
                <h3 class="text-2xl font-semibold text-green-300 mb-2">Real-Time Availability</h3>
                <p class="text-gray-400 text-sm">
                    Check room schedules instantly and avoid reservation conflicts.
                </p>
            </div>

            <div class="p-8 bg-gray-900 border border-gray-800 rounded-xl shadow hover:border-green-400/40 transition-all">
                <h3 class="text-2xl font-semibold text-green-300 mb-2">Secure Management</h3>
                <p class="text-gray-400 text-sm">
                    Enjoy peace of mind with secure and reliable booking data handling.
                </p>
            </div>

        </div>
    </div>


    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-green-400 mb-6">Contact Us</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div>
                <p class="text-gray-700 mb-4">
                    Have questions, concerns, or need assistance with booking?
                    Our team is ready to help.
                </p>

                <p class="text-gray-700 mb-2">
                    📍 <span class="font-semibold text-white">Makati Science and Technology Institute of the Philippines</span>
                </p>
                <p class="text-gray-700 mb-2">
                    📧 Email: <span class="text-green-300">support@mstiph.edu.ph</span>
                </p>
                <p class="text-gray-700">
                    ☎ Phone: <span class="text-green-300">(02) 1234-5678</span>
                </p>
            </div>



        </div>
    </div>

</section>


<script>
const text = "A modern, fast, and reliable booking system for everyone.";
let index = 0;

function typeEffect() {
    const element = document.getElementById("typingText");
    if (index < text.length) {
        element.innerHTML += text.charAt(index);
        index++;
        setTimeout(typeEffect, 50);
    }
}

window.onload = typeEffect;

let slideIndex = 0;
const carousel = document.getElementById('carousel');
const totalSlides = carousel.children.length;

setInterval(() => {
    slideIndex = (slideIndex + 1) % totalSlides;
    carousel.style.transform = `translateX(-${slideIndex * 100}%)`;
}, 3000);
</script>



<div class="pt-24"></div>

    </body>
</html>
