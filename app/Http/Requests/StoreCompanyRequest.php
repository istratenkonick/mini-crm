<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:companies,email',
            'phone' => 'nullable|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
            'website' => 'nullable|url|max:255',
        ];
    }
}
