<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileStoreRepository
{
    public static function store(UploadedFile $file)
    {
        $fullPath = $file->store('public');

        if(!$fullPath) {
            throw new \Exception();
        }

        return Str::of($fullPath)->basename();
    }
}
