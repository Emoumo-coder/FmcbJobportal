<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'title' => 'required',
            'department' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:9|max:11',
            'description' => 'required',
            'job_experience' => 'required|integer|min:0',
            'job_level' => 'required',
            'employment_type' => 'required',
            'salary' => 'required|decimal:2|min:1000',
            'job_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'dimensions:min_width=1024,max_width=10000,min_height=1024,max_height=10000'],
            // 'company' => 'required|unique:listings,company',
            'requirements.*' => 'required',
            'responsibilities.*' => 'required',
        ];
    }
}
