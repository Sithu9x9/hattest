<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'position','jd','jr','jt','salary','post','location','gender','explvl','benefits','highlights','opportunities','created_by','updated_by'
    ];
}
