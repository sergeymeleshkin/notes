<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class FilesystemHelpers {
    public static function getResource($filename){
        return json_decode(Storage::disk('resources')->get($filename));
    }
}
