<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'service_type' => ['nullable', 'string', 'max:255'],
            'budget' => ['nullable', 'string', 'max:255'],
            'preferred_date' => ['nullable', 'date'],
            'message' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
