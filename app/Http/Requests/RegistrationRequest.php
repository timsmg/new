<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'login' => 'required|string|max:50|unique:users,login',
            'full_name' => 'required|string|max:255|regex:/^[\p{L}\p{Cyrillic}\p{Latin}\s-]+$/u',
            'number_phone' => 'required|string|unique:users,number_phone',
            'password' => 'required|string|min:8|same:repeat_password',
            'check' => 'accepted',
        ];
    }
    public function messages()
    {
        return [
            'login.required' => 'Поле "Логин" обязательно для заполнения.',
            'login.unique' => 'Такой логин уже используется.',
            'full_name.required' => 'Поле "ФИО" обязательно для заполнения.',
            'number_phone.required' => 'Поле "Номер телефона" обязательно для заполнения.',
            'number_phone.regex' => 'Введите корректный номер телефона.',
            'number_phone.unique' => 'Этот номер телефона уже зарегистрирован.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.min' => 'Пароль должен содержать не менее 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
            'check.accepted' => 'Вы должны согласиться с условиями.',
        ];
    }
}
