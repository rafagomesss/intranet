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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2',
            ],
            'email' => [
                'required',
                'email',
                'unique:users',
                'min:5',
            ],
            'password' => [
                'required',
                'min:6',
                'required_with:password_confirmation',
            ],
            'confirm_password' => [
                'required',
                'min:6',
                'same:password',
            ],
            'role_id' => [
                'int'
            ]
        ];
    }

    public function messages()
    {
        return [
            'email' => [
                'unique' => 'E-mail já cadastrado!',
                'email' => 'E-mail inválido',
                'required' => ':attribute é obrigatório',
                'min' => ':attribute deve conter no mínimo :min caracteres'
            ],
            'password' => [
                'required' => 'O campo senha é obrigatório!',
                'min' => 'A senha deve conter no mínimo :min caracteres!',
                'confirmed' => 'As senhas não combinam!',
            ],
        ];
    }
}
