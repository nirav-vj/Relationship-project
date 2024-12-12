<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'business_name'=>'required',
            'email'=>'required|email|unique:business,email,except,id',
            'file'=>'required|file',
            'user_id'=>'required',
            'address'=>'required',
            
        ];
    }   
        
        public function messages()
        {
            return[
                'business_name.required' => 'The Name Fild Is Required',
                'email.required' => 'The Email Fild Is Required',
                'file.required' => 'The File Fild Is Required',
                'user_id.required' => 'The User  Is Required',
                'address.required' => 'The Address Fild Is Required',

            ];
        }

        
    
}