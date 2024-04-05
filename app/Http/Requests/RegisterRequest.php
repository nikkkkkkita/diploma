<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'last_name' => ['required', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'patronymic' => ['nullable', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'login' => ['required', 'string', 'unique:users,login'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:15'],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'имя',
            'last_name' => 'фамилия',
            'patronymic' => 'отчество',
            'login' => 'логин',
            'email' => 'почта',
            'password' => 'пароль',
        ];
    }
}
