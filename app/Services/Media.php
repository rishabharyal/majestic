<?php

namespace App\Services;

use MediaUploader;

class Media
{
    public function attach($model, $files, $prefix)
    {
        if (!is_array($files)) {
            $temp = $files;
            $files = [];
            $files[] = $temp;
        }
        foreach ($files as $key => $file) {
            $media = MediaUploader::fromSource($file)
                ->useFilename(uniqid($prefix . '_', true))
                ->upload();
            $model->attachMedia($media, "default");
        }
    }

    public function delete($model, $image_id = null)
    {
        if ($model->hasMedia('default')) {
            if (!$image_id) {
                $model->firstMedia('default')->delete();
            } else {
                $images = $model->getMedia('default');
                $images->where('id', $image_id)->first()->delete();
            }
        }
    }
}
