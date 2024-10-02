<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrdersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customerID' => 'required|integer',
            'supplierID' => 'required|integer',
            'skillID' => 'required|integer',
            'no_of_hours' => 'required|integer',
            'total_amount' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ];
    }
}
