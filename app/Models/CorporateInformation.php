<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateInformation extends Model
{
    protected $fillable = [
        'title','created_by','updated_by'
    ];

    public function corporate_information_posts()
    {
        return $this->hasMany(CorporateInformation_posts::class);
    }
}
