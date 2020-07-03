<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display the specified image
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$path)
    {
        if (Storage::disk()->exists($path)) {
            $file = Storage::disk()->get($path);
            return response($file, 200)->header('Content-Type', 'image/png');
        }
        return abort(404);
    }
}
