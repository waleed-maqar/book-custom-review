<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    /**
     * @param string $photo
     */
    function uploadphoto($photo, $path, $fieldName)
    {
        $file = request()->file($photo);
        $ext = $file->getClientOriginalExtension();
        $avatar = $file->move('assets/img/' . $path, str_replace(' ', '-', request($fieldName)) . time() . '.' . $ext);
        return $avatar;
    }
    function uploadPhotoFromArray($photo, $path, $fieldName)
    {
        $arr = explode('.', $photo);
        // dd($arr);
        $file = request()->file($arr[0])[$arr['1']];
        // dd($file);
        $ext = $file->getClientOriginalExtension();
        dd(request($fieldName));
        $avatar = $file->move('assets/img/' . $path, str_replace(' ', '-', request($fieldName)) . time() . '.' . $ext);
        return $avatar;
    }

    function multiupload($file, $path, $fieldName)
    {
        $images = [];
        $photos = request()->file($file);
        foreach ($photos as $name => $file) {
            $ext = $file->getClientOriginalExtension();
            $newpath = public_path('assets/img/' . $path);
            $avatar = $file->move($newpath, $name . '_' . $fieldName . time() . '.' . $ext);
            $avatar = str_replace(public_path(), '', $avatar);
            $images[] = $avatar;
        }
        return $images;
    }
}