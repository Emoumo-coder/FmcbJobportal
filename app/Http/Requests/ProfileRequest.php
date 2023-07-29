<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'title' => 'nullable|string',
            'location' => 'nullable|max:255',
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
            'phone' => 'required|min:11|max:11',
            'cover_photo' => 'nullable|mimes:png,jpeg,jpg,gif|dimensions:min_width=1024*2,max_width=20000,min_height=1024*2,max_height=20000',
            'photo' => 'nullable|mimes:mimes:png,jpeg,jpg,gif',
            'about' => 'nullable|min:50'
        ];
    }
}
