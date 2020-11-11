<?php 

    namespace App\Util;

    use App\Interfaces\ImageStorage;
    use Illuminate\Support\Facades\Storage;

    class ImageS3Storage implements ImageStorage
    {
        public function store($request)
        {
            if ($request->hasFile('post_image'))
            {
                $file = $request->file('post_image');
                $name = time() . $file->getClientOriginalName();
                $filePath = 'images/' . $name;
                //Storage::disk('s3')->put($filePath, file_get_contents($file));
            }
        }
    }

?>