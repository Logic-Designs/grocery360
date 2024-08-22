<?php

namespace App\Services;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function store($image, String $path = 'image')
    {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $public_path = public_path('images/'.$path.'/' . $filename);

        if (!file_exists('images/'.$path)) {
            mkdir('images/'.$path, 666, true);
        }
        Image::make($image->getRealPath())->save($public_path);
        return 'images/'.$path.'/' . $filename;
    }
}
