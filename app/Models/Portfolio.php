<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public const SPACE_TYPES = [
        'residential' => 'Residential',
        'office' => 'Office',
        'exterior' => 'Exterior',
        'commercial' => 'Commercial',
        'public' => 'Public',
    ];

    public const STATUS_TYPES = [
        'running' => 'Running',
        'finished' => 'Finished',
    ];

    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'client_name',
        'area_sft',
        'location',
        'space_type',
        'status_type',
        'url',
        'image',
        'date',
        'description',
        'is_featured',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getSpaceTypeLabelAttribute(): string
    {
        return self::SPACE_TYPES[$this->space_type] ?? ucfirst($this->space_type);
    }

    public function getStatusTypeLabelAttribute(): string
    {
        return self::STATUS_TYPES[$this->status_type] ?? ucfirst($this->status_type);
    }
}
