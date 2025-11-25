<div class="p-6 w-full">
    <h1 class="text-3xl font-bold mb-6 text-green-700">Today's Guests</h1>

    @if ($guests->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($guests as $guest)
                <div class="bg-gray-800 p-5 rounded-xl shadow border border-gray-700">

                    <h2 class="text-xl font-bold text-white">
                        {{ $guest->user->name }}
                    </h2>

                    <p class="text-gray-400 text-sm mt-1">
                        Contact: {{ $guest->contact_number }}
                    </p>

                    <p class="text-gray-300 mt-3">
                        <span class="font-semibold">Room:</span>
                        {{ $guest->room->name }}
                    </p>

                    <p class="text-gray-300">
                        <span class="font-semibold">Booking Time:</span>
                        {{ date('h:i A', strtotime($guest->booking_time)) }}
                    </p>




                </div>
            @endforeach

        </div>

    @else
        <div class="text-center text-gray-400 text-lg mt-10">
            No guests scheduled for today.
        </div>
    @endif
</div>
