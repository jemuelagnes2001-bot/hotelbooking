<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBMS | Admin Dashboard</title>

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            background: #F6F7FA;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-bg {
            background: #0f1c2e;
        }
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }
        .sidebar-active {
            background-color: #1d3557 !important;
            color: #F9D342 !important;
        }
    </style>
</head>

<body class="flex">


    <aside class="w-64 h-screen sidebar-bg text-gray-200 fixed top-0 left-0 shadow-xl">


        <div class="p-5 flex items-center space-x-3 border-b border-gray-700">
               <img src="https://cdn-icons-png.flaticon.com/512/235/235889.png" class="w-10 opacity-90">
            <span class="text-2xl font-semibold text-white">
                HB<span class="text-yellow-400">MS</span>
            </span>
        </div>


        <ul class="mt-4 space-y-1 px-3">

            <li>
                <a href="{{ route('admindashboard') }}"
                   class="flex items-center gap-2 py-3 px-3 rounded-lg sidebar-active font-medium">
                    <i class="ri-home-6-line text-xl"></i>
                    Dashboard
                </a>
            </li>



            <li>
                <a href="{{route('admin.guest')}}"
                   class="flex items-center gap-2 py-3 px-3 rounded-lg sidebar-item text-gray-300 font-medium">
                    <i class="ri-group-fill text-xl"></i>
                    Guests
                </a>
            </li>

            <li>
                <a href="{{route('admin.rooms')}}"
                   class="flex items-center gap-2 py-3 px-3 rounded-lg sidebar-item text-gray-300 font-medium">
                    <i class="ri-door-open-line text-xl"></i>
                    Rooms
                </a>
            </li>

            <li>
                <a href="{{route('admin.bookings')}}"
                   class="flex items-center gap-2 py-3 px-3 rounded-lg sidebar-item text-gray-300 font-medium">
                    <i class="ri-calendar-event-line text-xl"></i>
                   Bookings
                </a>
            </li>




            <li class="pt-4 mt-4 border-t border-gray-700">
                <form action="{{ route('logouts') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-2 text-red-400 hover:text-red-300 font-medium py-3">
                        <i class="ri-logout-circle-fill text-xl"></i> Logout
                    </button>
                </form>
            </li>
        </ul>

    </aside>

    <div class="flex-1 p-8 ml-60">


        <main class=" p-6 rounded-xl shadow-sm border border-gray-200">
            {{ $slot }}
        </main>


        <p class="mt-10 text-gray-500 text-sm text-center">
            © 2025 HBMS – Hotel Booking Management System
        </p>
    </div>

    @livewireScripts
</body>
</html>
