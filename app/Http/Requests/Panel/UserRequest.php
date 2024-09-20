<?php

namespace App\Http\Requests\Panel;

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
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|max:255';
            $rules['username'] = 'required|string|max:255|unique:users,username';
        } else {
            $rules['password'] = 'nullable|string|max:255';
            $rules['username'] = 'required|string|max:255';
        }

        return $rules;
    }
}
