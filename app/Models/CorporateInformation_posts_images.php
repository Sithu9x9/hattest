<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateInformation_posts_images extends Model
{
    protected $fillable = [
        'corporate_information_posts_id','image_url','image_name'
    ];

    public function corporate_information_posts()
    {
        return $this->belongsTo(CorporateInformation_posts::class);
    }
}
