<?php

namespace App\Livewire\User;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Bookings extends Component
{
    public function render()
    {
        return view('livewire.user.bookings', [
            'bookings' => Booking::with('room')
                ->where('user_id', Auth::id())
                ->latest()
                ->get()
        ]);
    }
}
