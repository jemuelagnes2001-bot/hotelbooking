<div class="p-6 ">

    <h1 class="text-2xl font-bold text-gray-800 mb-4">My Bookings</h1>

    @if ($bookings->isEmpty())
        <div class="text-gray-600 text-center p-6 bg-gray-100 rounded">
            You have no bookings yet.
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($bookings as $booking)
            <div class="bg-gray-800 text-white p-4 rounded-xl shadow-lg border border-gray-700">


                @if ($booking->room && $booking->room->photo)
                    <img src="{{ asset('storage/' . $booking->room->photo) }}"
                         class="w-full h-40 object-cover rounded-lg mb-3">
                @else
                    <div class="w-full h-40 bg-gray-700 flex items-center justify-center rounded-lg mb-3">
                        No Photo
                    </div>
                @endif


                <h2 class="text-xl font-bold text-green-400">{{ $booking->room->name }}</h2>


                <p class="mt-2">
                    <span class="px-3 py-1 rounded-lg text-sm
                        @if ($booking->status === 'approved')
                            bg-green-700
                        @elseif ($booking->status === 'pending')
                            bg-yellow-600
                        @else
                            bg-red-700
                        @endif
                    ">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>


                <div class="mt-3 text-gray-300 text-sm space-y-1">

                    <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
                    <p><strong>Booking Time:</strong> {{ $booking->booking_time }}</p>
                    <p><strong>Contact:</strong> {{ $booking->contact_number }}</p>
                    <p><strong>Payment Receipt:</strong></p>

                    @if ($booking->payment)
                        <img src="{{ asset('storage/' . $booking->payment) }}"
                             class="w-32 h-32 object-cover rounded mt-1 border border-gray-600">
                    @else
                        <span class="text-gray-400">No receipt uploaded</span>
                    @endif

                </div>


                <p class="mt-4 text-xl font-bold text-yellow-400">
                    ₱{{ number_format($booking->room->price, 2) }}
                </p>

            </div>
        @endforeach

    </div>

</div>
