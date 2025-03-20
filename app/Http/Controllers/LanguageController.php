<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // Sadece izin verilen dilleri kabul et
        if (in_array($lang, ['az', 'en', 'ru'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        
        return redirect()->back();
    }
} 