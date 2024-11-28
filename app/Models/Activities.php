<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $fillable = [
        'title','created_by','updated_by'
    ];

    public function activities_posts()
    {
        return $this->hasMany(Activities_posts::class);
    }
}
