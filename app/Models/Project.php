<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'url', 'area_sft', 'image', 'location', 'description', 'date', 'status'];
}
