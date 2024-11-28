<?php

namespace App\Models;

use App\Traits\DeleteWithImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, DeleteWithImages;

    protected $fillable = [
        'image',
        'alt',
    ];
}
