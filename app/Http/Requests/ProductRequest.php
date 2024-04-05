<?php

namespace App\Http\Requests;

use App\Enums\CandleComposition;
use App\Enums\CandleType;
use App\Enums\Color;
use App\Enums\Country;
use App\Enums\DiffuserPlacement;
use App\Enums\DiffusserType;
use App\Enums\FlavoringType;
use App\Enums\WickType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric'],
            'count' => ['numeric'],
            'image' => ['nullable', 'array'],
            'image.*' => ['file', 'mimes:png,jpg,jpeg,webp'],
            'country_of_manufacture' => ['nullable', new Enum(Country::class)],
            'compound' => ['nullable', 'string', new Enum(CandleComposition::class)],
            'material' => ['nullable', 'string', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'height' => ['nullable', 'numeric'],
            'volume' => ['nullable', 'numeric'],
//            'aroma' => ['nullable', 'string'],
            'burning_time' => ['nullable', 'numeric'],
            'wick_type' => ['nullable', 'string', new Enum(WickType::class)],
            'type' => ['nullable', 'string', new Enum(CandleType::class)],
            'type_diffuser' => ['nullable', 'string', new Enum(DiffusserType::class)],
            'type_of_flavoring' => ['nullable', 'string', new Enum(FlavoringType::class)],
            'diffuser_placement' => ['nullable', 'string', new Enum(DiffuserPlacement::class)],
            'weight' => ['nullable', 'numeric'],
            'color' => ['nullable', 'string', new Enum(Color::class)],
            'category_id' => ['required', 'exists:category_types,id'],
        ];
    }
}
