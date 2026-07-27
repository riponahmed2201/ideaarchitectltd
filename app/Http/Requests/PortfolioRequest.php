<?php

namespace App\Http\Requests;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = (bool) $this->route('portfolio');

        return [
            'title' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'area_sft' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'space_type' => ['required', Rule::in(array_keys(Portfolio::SPACE_TYPES))],
            'status_type' => ['required', Rule::in(array_keys(Portfolio::STATUS_TYPES))],
            'url' => 'nullable|string',
            'date' => 'required|date',
            'status' => 'required|in:0,1',
            'description' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'is_featured' => 'nullable|boolean',
            'image' => [$isUpdate ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }
}
