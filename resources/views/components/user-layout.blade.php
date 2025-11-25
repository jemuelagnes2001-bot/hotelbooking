<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

 <nav class="bg-gray-800 shadow px-6 py-4 flex justify-between items-center">
    <!-- LOGO -->
    <div class="flex items-center gap-3">
        <img src="https://cdn-icons-png.flaticon.com/512/235/235889.png" class="w-10 h-10" />
        <span class="text-2xl font-semibold text-white">
                HB<span class="text-yellow-400">MS</span>
            </span>
    </div>


    <div class="hidden md:flex items-center gap-6 text-gray-300 font-medium">
        <a href="{{route('userdashboard')}}" class="hover:text-yellow-400">Home</a>
             <a href="{{route('user.rooms')}}" class="hover:text-yellow-400">Rooms</a>
        <a href="{{route('user.bookings')}}" class="hover:text-yellow-400">Bookings</a>

    </div>


    <div class="relative">
        <button id="userMenuBtn" class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name=User" class="w-10 h-10 rounded-full" />
            <span class="font-medium text-white hidden md:block">User</span>
        </button>

        <div id="userMenu" class="absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-md hidden">


            <form method="POST" action="/logout">
                @csrf
                <button class="w-full text-left px-4 py-2 text-gray-600 hover:bg-gray-100">Logout</button>
            </form>
        </div>
    </div>
</nav>


    <div class="flex">




        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>


    <script>
        const btn = document.getElementById('userMenuBtn');
        const menu = document.getElementById('userMenu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!btn.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
