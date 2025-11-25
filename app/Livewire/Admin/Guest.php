<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;
use Carbon\Carbon;

class Guest extends Component
{
    public function render()
    {
        $guests = Booking::whereDate('booking_date', Carbon::today())
            ->where('status', 'approved')
            ->with('user', 'room')
            ->get();

        return view('livewire.admin.guest', [
            'guests' => $guests
        ]);
    }
}
