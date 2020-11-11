<?php 

    namespace App\Util;

    use App\Interfaces\ImageStorage;
    use Illuminate\Support\Facades\Storage;

    class ImageLocalStorage implements ImageStorage
    {
        public function store($request)
        {
            if ($request->hasFile('post_image'))
            {
                $file = $request->file('post_image');
                $name = time() . $file->getClientOriginalName();
                Storage::disk('public')->put('test2.png',file_get_contents($request->file('post_image')->getRealPath()));
            }
        }
    }

?>