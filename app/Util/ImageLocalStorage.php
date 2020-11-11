<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

    class ImageLocalStorage implements ImageStorage {

        public function store(Request $request, $id) {

            if ($request->hasFile('post_image')) {

                $file = $request->file('post_image');
                $name = 'Post'.$id.'.png';
                Storage::disk('public')->put($name,file_get_contents($request->file('post_image')->getRealPath()));
            }
        }
    }
