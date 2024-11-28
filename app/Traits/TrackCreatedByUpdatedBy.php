<?php

namespace App\Traits;

trait TrackCreatedByUpdatedBy
{
    protected static function bootTrackCreatedByUpdatedBy()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }
}