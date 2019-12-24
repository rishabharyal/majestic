<?php

namespace App\Services;

use MediaUploader;

class Media
{
    public function attach($model, $file, $prefix)
    {
        $media = MediaUploader::fromSource($file)
            ->useFilename(uniqid($prefix . '_', true))
            ->upload();
        $model->attachMedia($media, "default");
    }

    public function delete($model)
    {
        if ($model->hasMedia('default')) {
            $model->firstMedia('default')->delete();
        }
    }
}
