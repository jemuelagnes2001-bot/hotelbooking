<div class="">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">

    @foreach ($rooms as $room)
        <div class="bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden w-80 border border-gray-700">

            @if ($room->photo)
                <img src="{{ asset('storage/' . $room->photo) }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-700 flex justify-center items-center text-gray-400">
                    No Photo
                </div>
            @endif

            <div class="p-4">

                <h2 class="text-2xl font-bold text-white text-center">
                    {{ $room->name }}
                </h2>

                <span class="text-xs font-semibold px-3 py-1 rounded-lg mt-2 inline-block bg-green-700 text-white">
                    Available
                </span>

                <p class="text-gray-300 text-sm mt-3 leading-relaxed">
                    {{ $room->description }}
                </p>

                <p class="text-xl font-bold text-yellow-400 mt-4">
                    ₱{{ number_format($room->price, 2) }}
                </p>

                <button class="mt-5 w-full bg-green-700 hover:bg-green-600 text-white py-2 rounded-lg font-semibold transition"
                        wire:click="bookNow({{ $room->id }})">
                    Book Now
                </button>

            </div>
        </div>
    @endforeach
</div>


@if ($showBookingModal)
<div class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50">
    <div class="bg-white w-96 rounded-xl p-6 shadow-xl">

        <h2 class="text-xl font-bold text-gray-800 mb-4">Room Booking</h2>


        <label class="block font-semibold text-gray-700">Name</label>
        <input type="text" wire:model="name" class="w-full border p-2 rounded mb-2">


        <label class="block font-semibold text-gray-700">Contact Number</label>
        <input type="text" wire:model="contact_number" class="w-full border p-2 rounded mb-2">


        <label class="block font-semibold text-gray-700">Booking Date</label>
        <input type="date" wire:model="booking_date" class="w-full border p-2 rounded mb-2">


        <label class="block font-semibold text-gray-700">Booking Time</label>
        <input type="time" wire:model="booking_time" class="w-full border p-2 rounded mb-2">


        <label class="block font-semibold text-gray-700">Payment Receipt</label>
        <span class="text-blue-700">Gcash Number: <span class="underline font-bold">09983845673</span></span>
        <input type="file" wire:model="receipt" class="w-full border p-2 rounded mb-2">

        @if ($receipt)
            <img src="{{ $receipt->temporaryUrl() }}" class="w-32 h-32 mt-2 object-cover rounded">
        @endif

        <div class="flex justify-end mt-4">
            <button wire:click="$set('showBookingModal', false)"
                    class="px-4 py-2 bg-gray-500 text-white rounded mr-2">
                Cancel
            </button>

            <button wire:click="saveBooking"
                    class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-600">
                Submit Booking
            </button>
        </div>

    </div>
</div>
@endif


</div>
