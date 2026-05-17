<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function changeLanguage($lang, Request $request)
    {
        if (in_array($lang, ['lt', 'en'])) {

            $request->session()->put('locale', $lang);

        }

        return redirect()->back();
    }
}
