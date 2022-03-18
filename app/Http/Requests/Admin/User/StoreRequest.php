<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.stirng' => 'Имя пользователья должна состоять из строк',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.required' => 'email должна быть строкой',
            'email.email' => 'Ваша почта должна соответствовать формату mail@some.domain',
            'email.required' => 'Пользователь с таким именем уже существует',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.stirng' => 'Пароль должен быть строкой',
        ];
    }
}
