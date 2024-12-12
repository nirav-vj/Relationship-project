<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => 'required|regex:/[A-Z,a-z]/|',
            'email' => 'email|required|unique:users,email,except,id',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',

        ];
    }

    public function messages()
        {
            return[
                'user_name.required' => 'The Name Fild Is Required',
                'email.email' => 'The Email Fild Is Required',
                'password.required' => 'The Password Is Required',

            ];
        }
}