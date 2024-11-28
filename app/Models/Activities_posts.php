<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities_posts extends Model
{
    protected $fillable = [
        'title','des','activities_id','created_by','updated_by',
    ];

    public function activity()
    {
        return $this->belongsTo(Activities::class);
    }

    public function activities_posts_images()
    {
        return $this->hasMany(Activities_posts_images::class);
    }
}
