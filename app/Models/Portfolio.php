<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    // Fillable fields
    protected $fillable = [
        'service_id',
        'title',
        'client_name',
        'image',
        'date',
        'description',
        'status',
    ];

    /**
     * Get the service that owns the portfolio.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
