<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'title','created_by','updated_by'
    ];

    public function stock_posts()
    {
        return $this->hasMany(Stock_posts::class);
    }
}
