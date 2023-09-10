<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarCodeRequest extends FormRequest
{
    /**
     * Walidacja na kod
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:bar_codes', 'max:255'],
            'value' => ['required', 'unique:bar_codes', 'max:255', 'alpha_num'],
        ];
    }
}
