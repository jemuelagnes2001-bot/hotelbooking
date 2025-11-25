<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class Bookings extends Component
{
    public function approve($id)
    {
        Booking::where('id', $id)->update([
            'status' => 'approved'
        ]);

        session()->flash('message', 'Booking approved successfully!');
    }

    public function decline($id)
    {
        Booking::where('id', $id)->update([
            'status' => 'declined'
        ]);

        session()->flash('message', 'Booking declined.');
    }

    public function render()
    {
        return view('livewire.admin.bookings', [
            'bookings' => Booking::with('room')->latest()->get()
        ]);
    }
}
