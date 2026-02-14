<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreReuest extends FormRequest
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
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'name.min'=>'Имя не меньше 5 (пяти) символ',
            'name.max'=>'Имя не больше 50 (пятидесяти) символ',
            'password.confirmed'=>'Пароль нет совпадения',
        ];
    }
}
