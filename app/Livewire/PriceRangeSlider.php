<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class PriceRangeSlider extends Component
{



    public function render()
    {
        $query = Product::query();

        return view('livewire.price-range-slider');
    }
}
