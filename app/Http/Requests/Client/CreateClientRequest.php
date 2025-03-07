<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin', 'user']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contact_name' => 'required|max:255',
            'contact_email' => 'required|email|unique:clients',
            'contact_phone_number' => 'required',
            'company_name' => 'required',
            'company_address' => '',
            'company_city' => '',
            'company_zip' => '',
            'company_vat' => ''
        ];
    }
}
