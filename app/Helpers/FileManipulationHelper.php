<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class FileManipulationHelper
{
    public static function storeFile($file, $uniqueId, $filePath)
    {
        $fileName = $uniqueId . date('YmdHis') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/' . $filePath), $fileName);
        $path = '/upload/' . $filePath . '/' . $fileName;

        return $path;
    }

    public static function storeOptimizedImage($file, $uniqueId, $filePath)
    {
        if ($file->getClientOriginalExtension() == 'gif') {
            return self::storeFile($file, $uniqueId, $filePath);
        } else {
            $fileName = $uniqueId . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            
            $img = Image::make($file);
            $img->save(public_path('upload/' . $filePath . '/' . $fileName), 20);
            $path = '/upload/' . $filePath . '/' . $fileName;
    
            return $path;
        }
    }

    public static function deleteStorageFile($file)
    {
        if (File::exists($file)) {
            File::delete($file);
        }
    }

    public static function deletePublicFile($file)
    {
        if(File::exists(public_path($file)) && !Str::startsWith($file, '/images')) {
            File::delete(public_path($file));
        }
    }
}
