<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserShopStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string'],
            'avatar' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp'],
            'header' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp'],
            'social_links' => ['array', 'nullable'],
            'social_links.*.social_type_id' => ['required_if:social_links,!=,null', 'exists:social_types,id'],
            'social_links.*.link' => ['required_if:social_links,!=,null', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'имя магазина',
        ];
    }
}
