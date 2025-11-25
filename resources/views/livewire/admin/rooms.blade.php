<div class="w-full p-4">


    <div class="flex justify-end mb-4">
        <button
            class="px-4 py-2 bg-green-700 hover:bg-green-600 text-white rounded-lg font-semibold w-64 shadow"
            wire:click="$set('showModal', true)"
        >
            Add Room
        </button>
    </div>


    @if (session()->has('message'))
        <div class="p-2 bg-green-700 text-white mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif


    <div class="overflow-hidden rounded-lg shadow-lg border ">
        <table class="w-full text-sm  text-gray-200">
            <thead>
                <tr class="bg-gray-900 text-white">
                    <th class="p-3 border ">Photo</th>
                    <th class="p-3 border ">Name</th>
                    <th class="p-3 border ">Description</th>
                    <th class="p-3 border ">Price</th>
                    <th class="p-3 border ">Availability</th>
                    <th class="p-3 border ">Actions</th>
                </tr>
            </thead>

            <tbody>
            @foreach($rooms as $room)
                <tr class="transition">
                    <td class="p-3 border  text-center">
                        @if ($room->photo)
                            <img src="{{ asset('storage/' . $room->photo) }}"
                                 class="w-20 h-20 object-cover rounded mx-auto shadow">
                        @else
                            <span class="text-gray-400">N/A</span>
                        @endif
                    </td>

                    <td class="p-3 border  text-center font-semibold text-black">
                        {{ $room->name }}
                    </td>

                    <td class="p-3 border  text-center text-black">
                        {{ $room->description }}
                    </td>

                    <td class="p-3 border  text-center text-yellow-400 font-bold">
                        ₱{{ number_format($room->price, 2) }}
                    </td>

                    <td class="p-3 border  text-center">
                        @if ($room->availability)
                            <span class="px-3 py-1 rounded bg-green-700 text-white text-xs font-semibold">
                                Available
                            </span>
                        @else
                            <span class="px-3 py-1 rounded bg-red-700 text-white text-xs font-semibold">
                                Not Available
                            </span>
                        @endif
                    </td>

                    <td class="p-3 border  text-center">
                        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-400 text-white rounded mr-2 shadow"
                                wire:click="editRoom({{ $room->id }})">
                            Edit
                        </button>

                        <button class="px-3 py-1 bg-red-700 hover:bg-red-600 text-white rounded shadow"
                                wire:click="deleteRoom({{ $room->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
            <div class="bg-gray-900 p-6 w-96 rounded-lg shadow-lg border border-gray-700">

                <h2 class="text-xl font-bold text-white mb-4">
                    {{ $editMode ? 'Edit Room' : 'Add Room' }}
                </h2>


                <label class="block text-gray-300 font-semibold">Name</label>
                <input type="text"
                       wire:model="name"
                       class="bg-gray-800 border border-gray-700 text-white w-full p-2 rounded mb-3">


                <label class="block text-gray-300 font-semibold">Description</label>
                <textarea wire:model="description"
                          class="bg-gray-800 border border-gray-700 text-white w-full p-2 rounded mb-3"></textarea>


                <label class="block text-gray-300 font-semibold">Price</label>
                <input type="number"
                       wire:model="price"
                       class="bg-gray-800 border border-gray-700 text-white w-full p-2 rounded mb-3">


                <label class="block text-gray-300 font-semibold">Availability</label>

                <input type="checkbox" wire:model.defer="availability" class="mr-2">
                <span class="text-white">{{ $availability ? 'Available' : 'Not Available' }}</span>
                <br><br>


                <label class="block text-gray-300 font-semibold">Photo</label>
                <input type="file"
                       wire:model="photo"
                       class="bg-gray-800 border border-gray-700 text-white w-full p-2 rounded mb-3">


                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}"
                         class="w-32 h-32 object-cover rounded shadow mb-3">
                @elseif ($editMode && $existingPhoto)
                    <img src="{{ asset('storage/' . $existingPhoto) }}"
                         class="w-32 h-32 object-cover rounded shadow mb-3">
                @endif


                <div class="flex justify-end mt-4">
                    <button
                        class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded mr-2 shadow"
                        wire:click="$set('showModal', false)"
                    >
                        Cancel
                    </button>

                    <button
                        class="px-3 py-1 bg-green-700 hover:bg-green-600 text-white rounded shadow"
                        wire:click="saveRoom"
                    >
                        Save
                    </button>
                </div>

            </div>
        </div>
    @endif

</div>
