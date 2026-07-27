<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'site_name' => ['required', 'string', 'max:255'],
            'site_email' => ['required', 'email', 'max:255'],
            'site_phone_1' => ['required', 'string', 'max:20'],
            'site_phone_2' => ['nullable', 'string', 'max:20'],
            'site_address' => ['required', 'string', 'max:500'],
            'awards_count' => ['required', 'integer', 'min:0'],
        ];
    }
}
