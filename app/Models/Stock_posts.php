<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock_posts extends Model
{
    protected $fillable = [
        'title','des','stock_id','created_by','updated_by',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function stock_posts_images()
    {
        return $this->hasMany(Stock_posts_images::class);
    }
}
