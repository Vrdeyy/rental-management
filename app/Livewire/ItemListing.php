<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemListing extends Component
{
    public function render()
    {
        return view('livewire.item-listing', [
            'items' => Item::all(),
        ]);
    }
}
