<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;

class ImageController extends Controller
{
    public function save(Request $request)
    {
        /*
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        return back()->with('success', __('Image uploaded successfully!'));
        */
        return back()->with('success', __('Image uploaded successfully!'));
    }
}
