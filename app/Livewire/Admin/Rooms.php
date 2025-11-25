<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;

class Rooms extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $editMode = false;

    public $roomId = null;

    public $name;
    public $description;
    public $price;
    public $availability = true;
    public $photo; // uploaded file
    public $existingPhoto; // old photo name

    public function render()
    {
        return view('livewire.admin.rooms', [
            'rooms' => Room::all()
        ]);
    }

   public function saveRoom()
{
    $photoPath = $this->existingPhoto;

    if ($this->photo) {
        $photoPath = $this->photo->store('rooms', 'public');
    }

    Room::updateOrCreate(
        ['id' => $this->roomId],
        [
            'name'         => $this->name,
            'description'  => $this->description,
            'price'        => $this->price,
            'availability' => $this->availability ? true : false,
            'photo'        => $photoPath
        ]
    );

    session()->flash('message', $this->roomId ? 'Room updated!' : 'Room added!');

    $this->resetModal();
}


    public function editRoom($id)
    {
        $this->editMode = true;
        $this->roomId = $id;

        $room = Room::findOrFail($id);

        $this->name         = $room->name;
        $this->description  = $room->description;
        $this->price        = $room->price;
        $this->availability = $room->availability;

        $this->existingPhoto = $room->photo;
        $this->photo = null;

        $this->showModal = true;
    }

    public function deleteRoom($id)
    {
        Room::findOrFail($id)->delete();
        session()->flash('message', 'Room deleted successfully!');
    }

    private function resetModal()
    {
        $this->showModal = false;
        $this->editMode = false;

        $this->roomId = null;

        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->availability = true;

        $this->photo = null;
        $this->existingPhoto = null;
    }
}
