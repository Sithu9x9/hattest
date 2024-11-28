<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateInformation_posts extends Model
{
    protected $fillable = [
        'title',
        'des',
        'corporate_information_id',
        'created_by',
        'updated_by',
    ];

    public function corporate_information()
    {
        return $this->belongsTo(CorporateInformation::class);
    }

    public function corporate_information_posts_images()
    {
        return $this->hasMany(CorporateInformation_posts_images::class);
    }
}
