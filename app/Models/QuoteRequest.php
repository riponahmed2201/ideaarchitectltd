<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_type',
        'budget',
        'preferred_date',
        'message',
        'is_read',
    ];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'preferred_date' => 'date',
        ];
    }
}
