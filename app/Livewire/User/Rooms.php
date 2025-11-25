<?php

namespace App\Livewire\User;

use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Rooms extends Component
{
    use WithFileUploads;

    public $showBookingModal = false;

    public $roomId;
    public $name;
    public $contact_number;
    public $booking_date;
    public $booking_time;
    public $receipt;

    public function render()
    {
        return view('livewire.user.rooms', [
            'rooms' => Room::where('availability', true)->get(),
        ]);
    }

    public function bookNow($roomId)
    {
        $this->resetBookingForm();
        $this->roomId = $roomId;
        $this->showBookingModal = true;
    }

    public function saveBooking()
    {
        $this->validate([
            'name'             => 'required|string|max:255',
            'contact_number'   => 'required|string|max:20',
            'booking_date'     => 'required|date|after_or_equal:today',
            'booking_time'     => 'required',
            'receipt'          => 'nullable|image|max:2048',
        ]);

        $receiptPath = null;

        if ($this->receipt) {
            $receiptPath = $this->receipt->store('bookings', 'public');
        }

        Booking::create([
            'user_id'        => Auth::id(),
            'room_id'        => $this->roomId,
            'name'           => $this->name,
            'contact_number' => $this->contact_number,
            'booking_date'   => $this->booking_date,
            'booking_time'   => $this->booking_time,
            'payment'        => $receiptPath,
            'status'         => 'pending',
        ]);

        session()->flash('message', 'Booking submitted successfully!');

        $this->resetBookingForm();
        $this->showBookingModal = false;
    }

    private function resetBookingForm()
    {
        $this->name = '';
        $this->contact_number = '';
        $this->booking_date = '';
        $this->booking_time = '';
        $this->receipt = null;
    }
}
