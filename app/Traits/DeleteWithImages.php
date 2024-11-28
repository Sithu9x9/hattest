<?php

namespace App\Traits;

use App\Helpers\FileManipulationHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait DeleteWithImages
{
    protected static function bootDeleteWithImages()
    {
        static::deleting(function ($model) {
            $model->deleteImages();
        });
    }

    public function deleteImages()
    {
        $files = $this->getFiles();

        foreach ($files as $file) {
            if (!Str::startsWith($this->$file, '/images')) {
                FileManipulationHelper::deletePublicFile($this->$file);
            }
        }
    }

    protected function getFiles()
    {
        return ['image'];
    }
}
