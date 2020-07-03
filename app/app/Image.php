<?php

namespace App;

use Image;
use Intervention\Image\Image as Intervention;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Model
{

    public static function store($path, $file, $filename, int $width = null, int $height = null)
    {
        $full_filename = $filename . "." . $file->getClientOriginalExtension();


        if (!Storage::disk('local')->exists($path)) {
            Storage::makeDirectory($path);
        }

        $image = Image::make($file);

        if ($width || $height) {
            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $image->save(storage_path("app/" . $path) . "/$full_filename");

        return $image;
    }

    public static function destroy($path)
    {
        if (Storage::disk()->exists($path)) {
            Storage::delete($path);
        }
    }
}
