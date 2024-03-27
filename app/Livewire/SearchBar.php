<?php

namespace App\Livewire;

use App\Models\CategoryType;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    public function render()
    {
        $result = [];
        $category = [];
        if(strlen($this->search) >= 1) {
            $result = Product::where('name', 'like', '%'.$this->search.'%')
                                ->orWhere('code', 'like', '%'.$this->search.'%')
                                ->orWhere('description', 'like', '%'.$this->search.'%')
                                ->orWhere('id', 'like', '%'.$this->search.'%')
                                ->orWhereHas('category', function($query) {
                                    $query->where('name', 'like', '%'.$this->search. '%');
                                })->limit(7)->get();
            $category = CategoryType::where('name', 'like', '%'.$this->search.'%')->get();
//            $category = CategoryType::where('name', $this->search)->first();
//            if ($category === '1') {
//                return Redirect::to('/catalog?category=candles');
//            }
//            else if ($category == '2') {
//                return Redirect::to('/catalog?category=diffusor');
//            }
        }
        return view('livewire.search-bar', [
            'products' => $result,
            'categories' => $category,
        ]);
    }
}
