<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = (bool) $this->route('testimonial');

        return [
            'client_name' => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:2000'],
            'portfolio_id' => ['nullable', 'exists:portfolios,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'status' => ['required', 'in:0,1'],
            'image' => [$isUpdate ? 'nullable' : 'nullable', 'image', 'max:2048'],
        ];
    }
}
