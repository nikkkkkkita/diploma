<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $order = $this->orders()->withPivot(['id', 'quantity', 'price', 'status'])->get()->pluck('pivot');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->getFirstMediaUrl('products'),
            'order' => $order,
            'shop' => $this->shop
        ];
    }
}
