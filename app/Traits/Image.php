<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait Image
{
    public function storeImage(Request $request, $image_name, $place, $disk = 'public', $allow_multiple = false)
    {
        if (!$request->hasFile($image_name)) {
            return;
        }

        $files = $request->file($image_name);
        $paths = [];

        if ($allow_multiple) {

            foreach ($files as $file) {
                $path = $file->store($place, $disk);
                $paths[] = $path;
            }
        } else {
            $paths = $files->store($place, $disk);

        }
        return $paths;
    }
    public function updateImage(Request $request, $object,  $image_name, $place, $disk = 'public', $allow_multiple = false)
    {
        $new_paths = null;

        if ($request->hasFile($image_name)) {
            $files = $request->file($image_name);
        if($allow_multiple){

            foreach ($files as $file) {
                $new_path = $file->store($place, $disk);
                $new_paths[] = $new_path;
            }

        } else{
            $new_paths =  $files->store($place, $disk) ;
            if($new_paths && $new_paths  != $object->{$image_name} )
            {
                $this->deleteImage($object->{$image_name}, $disk);
            }

        }

        return $new_paths;
    }
    }


    public static function deleteImage($path, $disk = 'public')
    {
        if ($path)
            Storage::disk($disk)->delete($path);
    }
}
