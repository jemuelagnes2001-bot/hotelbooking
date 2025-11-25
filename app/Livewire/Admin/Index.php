<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\Room;
use Livewire\Component;
use Carbon\Carbon;

class Index extends Component
{
    public $dailyIncome, $weeklyIncome, $monthlyIncome, $yearlyIncome;
    public $totalGuests, $availableRooms, $totalBookings;

    public function mount()
    {

        $this->totalGuests = Booking::where('status', 'approved')->count();
        $this->availableRooms = Room::where('availability', true)->count();
        $this->totalBookings = Booking::count();


        $this->dailyIncome = Booking::where('status', 'approved')
            ->whereDate('booking_date', Carbon::today())
            ->with('room')
            ->get()
            ->sum(fn($b) => $b->room->price);

        $this->weeklyIncome = Booking::where('status', 'approved')
            ->whereBetween('booking_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->with('room')
            ->get()
            ->sum(fn($b) => $b->room->price);

        $this->monthlyIncome = Booking::where('status', 'approved')
            ->whereMonth('booking_date', Carbon::now()->month)
            ->with('room')
            ->get()
            ->sum(fn($b) => $b->room->price);

        $this->yearlyIncome = Booking::where('status', 'approved')
            ->whereYear('booking_date', Carbon::now()->year)
            ->with('room')
            ->get()
            ->sum(fn($b) => $b->room->price);
    }

    public function render()
    {
        return view('livewire.admin.index');
    }
}
