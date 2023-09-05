<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'first_name'        =>  ['required'],
            'last_name'         =>  ['required'],
            'address'           =>  ['required'],
            'city'              =>  ['required'],
            'country'           =>  ['required'],
            'post_code'         =>  ['required','numeric'],
            'phone_number'      =>  ['required','numeric'],
            'notes'             =>  ['nullable','string','max:255'],
        ];
    }
}
