<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities_posts_images extends Model
{
    //
    protected $fillable = [
        'activities_posts_id','image_url','image_name'
    ];

    public function activities_posts()
    {
        return $this->belongsTo(Activities_posts::class);
    }
}
