<?php

namespace App\Models;

use App\Traits\DeleteWithImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, DeleteWithImages;

    protected function getFiles()
    {
        return ['logo'];
    }

    protected $fillable = [
        'logo',
        'link'
    ];
}
