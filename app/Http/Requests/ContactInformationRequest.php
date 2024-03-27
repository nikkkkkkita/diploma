<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInformationRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'patronymic' => ['nullable', 'string'],
            'phone' => ['numeric', 'required'],
            'email' => ['required', 'email'],
            'city' => ['required', 'string'],
            'street' => ['required', 'string'],
            'home' => ['required', 'numeric'],
            'flat' => ['required', 'numeric'],
            'index' => ['required', 'numeric'],
            'comment' => ['nullable', 'string'],
            'is_save' => ['nullable', 'in:on,off']
        ];
    }
}
