<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'slug', 'description', 'status'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
