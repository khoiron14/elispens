<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload($path, $file, $item = null)
    {
        if ($item) {
            Storage::disk('public')
                ->deleteDirectory(Str::beforeLast($item->url, '/'));
        }

        $name = Str::orderedUuid();
        $ext = $file->getClientOriginalExtension() ? 
            $file->getClientOriginalExtension() : 
            Str::after($file->getMimeType(), '/');

        return $file->storeAs(
            $path,
            Str::substr($name, -4). '/' . $name. '.' . $ext,
            'public'
        );
    }
}
