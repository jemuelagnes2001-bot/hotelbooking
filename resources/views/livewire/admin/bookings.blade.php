<div class="p-6 w-full">

    <h1 class="text-2xl font-bold mb-4 text-gray-800">Bookings List</h1>

    @if (session()->has('message'))
        <div class="p-2 bg-green-200 text-green-800 rounded mb-3">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full border text-sm">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="p-2 border">Room</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Contact</th>
                <th class="p-2 border">Booking Date</th>
                <th class="p-2 border">Time</th>
                <th class="p-2 border">Receipt</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $booking)
                <tr class="bg-gray-100 border text-center">
                    <td class="p-2 border font-semibold">
                        {{ $booking->room->name ?? 'N/A' }}
                    </td>

                    <td class="p-2 border">{{ $booking->name }}</td>

                    <td class="p-2 border">{{ $booking->contact_number }}</td>

                    <td class="p-2 border">{{ $booking->booking_date }}</td>

                    <td class="p-2 border">{{ $booking->booking_time }}</td>

                    <td class="p-2 border text-center">
                        @if($booking->payment)
                            <a href="{{ asset('storage/' . $booking->payment) }}" target="_blank"
                               class="text-blue-600 underline">View</a>
                        @else
                            N/A
                        @endif
                    </td>

                    <td class="p-2 border text-center">
                        @if ($booking->status == 'pending')
                            <span class="text-yellow-600 font-bold">Pending</span>
                        @elseif ($booking->status == 'approved')
                            <span class="text-green-700 font-bold">Approved</span>
                        @else
                            <span class="text-red-600 font-bold">Declined</span>
                        @endif
                    </td>

                    <td class="p-2 border text-center">

                        @if ($booking->status == 'pending')
                            <button wire:click="approve({{ $booking->id }})"
                                class="px-3 py-1 bg-green-700 text-white rounded hover:bg-green-600 mr-2">
                                Approve
                            </button>

                            <button wire:click="decline({{ $booking->id }})"
                                class="px-3 py-1 bg-red-700 text-white rounded hover:bg-red-600">
                                Decline
                            </button>
                        @else
                            <span class="text-gray-600">No Action</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
