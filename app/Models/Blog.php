<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'slug', 'content', 'featured_image', 'status'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
}
