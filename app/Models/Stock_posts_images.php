<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock_posts_images extends Model
{
    protected $fillable = [
        'stock_posts_id','image_url','image_name'
    ];

    public function stock_posts()
    {
        return $this->belongsTo(Stock_posts::class);
    }
}
