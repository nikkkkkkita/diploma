<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total' => $this->total,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'phone' => $this->phone,
            'email' => $this->email,
            'user' => $this->user,
            'products' => OrderProductResource::collection($this->products),
            'contact_information' => $this->contactInformation,
        ];
    }
}
