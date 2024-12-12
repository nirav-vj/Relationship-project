<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'location_name'=>'required|string',
            'business_id'=>'required',
            'email'=>'required|email',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'location_name.required' => 'The Name Fild Is Required',
            'business_id.required' => 'The Business Is Required',
            'email.required' => 'The Email Fild Is Required',
            'address.required' => 'The Address Fild Is Required',
        ];
    }
}