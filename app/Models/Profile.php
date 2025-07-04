<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'phone', 'designation', 'about_me', 'picture', 'gender', 'dob', 'address', 'facebook', 'twitter', 'linkedin', 'instagram', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
