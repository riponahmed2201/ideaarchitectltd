<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'designation',
        'quote',
        'portfolio_id',
        'image',
        'rating',
        'status',
    ];

    protected function casts(): array
    {
        return ['status' => 'boolean', 'rating' => 'integer'];
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
