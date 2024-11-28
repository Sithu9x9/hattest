<?php

namespace App\Models;

use App\Traits\DeleteWithImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, DeleteWithImages;

    protected $fillable = [
        'image',
        'link',
        'appstore_link',
        'playstore_link',
        'title',
        'description',
        'category'
    ];
}
