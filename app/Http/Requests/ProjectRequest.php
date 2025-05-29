<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
        $isUpdate = $this->route('project') ? true : false;

        return [
            'title' => ['required', 'string', 'max:255'],
            'area_sft' => ['required', 'string', 'max:255'],
            'url' => ['nullable'],
            'image' => [$isUpdate ? 'nullable' : 'required', 'image', 'max:2048'], // max 2MB
            'location' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'status' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The project title is required.',
            'area_sft.required' => 'The area in square feet is required.',
            'url.url' => 'Please enter a valid URL.',
            'image.required' => 'Please upload a project image.',
            'image.image' => 'The file must be an image.',
            'location.required' => 'The project location is required.',
            'date.required' => 'The project date is required.',
            'status.required' => 'Please select the project status.',
        ];
    }
}
