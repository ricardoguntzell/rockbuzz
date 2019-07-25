<?php

namespace App\Support;

use CoffeeCode\Cropper\Cropper;
use Illuminate\Database\Eloquent\Model;

class Croppper extends Model
{
    public static function thumb(string $uri, int $width, int $height = null)
    {
        $cropper = new Cropper('../public/storage/cache');
        $pathThumb = $cropper->make(config('filesystems.disks.public.root') . "/" . $uri, $width, $height);

        $file = 'cache/' . collect(explode('/', $pathThumb))->last();
        return $file;
    }

    public static function flush(?string $path)
    {
        $cropper = new Cropper('../public/storage/cache');

        if (!empty($path)) {
            $cropper->flush($path);
        } else {
            $cropper->flush();
        }
    }
}
