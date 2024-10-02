<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSkillSharerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|string|in:male,female,other',
            'skills' => 'required',
            'skill_level' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'availability' => 'required|string|max:255',
        ];
    }
}
