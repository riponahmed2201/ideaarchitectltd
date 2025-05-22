<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
}
