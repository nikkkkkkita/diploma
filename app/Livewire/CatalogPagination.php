<?php

namespace App\Livewire;

use App\Enums\CandleComposition;
use App\Enums\CandleType;
use App\Enums\Color;
use App\Enums\Country;
use App\Enums\DiffuserPlacement;
use App\Enums\DiffusserType;
use App\Enums\FlavoringType;
use App\Enums\WickType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CatalogPagination extends Component
{
    public $products;
    public $sort_order;
    public $category_id;
    public $countries;
    public $search;
    public $wick_types;
    public $types;
    public $candleCompositions;
    public $dPlacements;
    public $dTypes;
    public $flavoringTypes;
    public $colors;

    public $priceMin;
    public $priceMax;
//    Определяем публичную шлюху как гэнгбэнг
    public $selectedCountries = [];
    public $selectedWickTypes = [];
    public $selectedCandleTypes = [];
    public $selectedCandleCompositions = [];
    public $selectedDPlacements = [];
    public $selectedDTypes = [];
    public $selectedFlavoringTypes = [];
    public $selectedColors = [];

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(Request $request)
    {
        $query = Product::query();
        $query->with('characteristics');
        if ($request->category) {
            $this->setCategoryId($request->category);
            $query->where('category_id', $this->category_id);
        }
        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }
        if ($this->sort_order) {
            $query->orderBy('price', $this->sort_order);
        }

        $query->whereBetween('price', [$this->priceMin, $this->priceMax]);

        $filters = [
            'country_of_manufacture' => $this->selectedCountries,
            'wick_type' => $this->selectedWickTypes,
            'type' => $this->selectedCandleTypes,
            'compound' => $this->selectedCandleCompositions,
            'diffuser_placement' => $this->selectedDPlacements,
            'type_diffuser' => $this->selectedDTypes,
            'type_of_flavoring' => $this->selectedFlavoringTypes,
            'color' => $this->selectedColors,
        ];
        foreach ($filters as $parameter => $values) {
            $query->when(!empty($values), function ($query) use ($parameter, $values) {
                $query->whereHas('characteristics', function ($characteristicsQuery) use ($parameter, $values) {
                    $characteristicsQuery->whereIn($parameter, $values);
                });
            });
        }
        $this->countries = Country::toArray();
        $this->wick_types = WickType::toArray();
        $this->types = CandleType::toArray();
        $this->candleCompositions = CandleComposition::toArray();
        $this->dPlacements = DiffuserPlacement::toArray();
        $this->dTypes = DiffusserType::toArray();
        $this->flavoringTypes = FlavoringType::toArray();
        $this->colors = Color::toArray();
//        $this->priceMin = Product::min('price');
//        $this->priceMax = Product::max('price');
        $paginator = $query->paginate(10);
        $this->products = $paginator->items();
        return view('livewire.catalog-pagination', ['paginator' => $paginator]);
    }

    public function setCategoryId($name)
    {
        $this->category_id = match ($name) {
            "candles" => 1,
            "diffusor" => 2,
            default => null,
        };
        $this->resetPage();
    }

    public function setSortOrder($order)
    {
        $this->sort_order = $order;
        $this->resetPage();
    }

    public function mount()
    {
        $this->priceMin = Product::min('price');
        $this->priceMax = Product::max('price');
    }
}
