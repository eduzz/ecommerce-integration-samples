<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ["id"];

    public function users()
    {
        return $this->hasMany(User::class, "profile_id");
    }
}