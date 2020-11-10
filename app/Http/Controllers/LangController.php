<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class LangController extends Controller
{
    public function changeLang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
