<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function changeLanguage(Request $request)
    {
        $language = $request->language;

        if (in_array($language, ['en', 'ar'])) {
            Session::put('locale', $language); // Store the selected language in session
            App::setLocale($language); // Set the application locale
        }

        return redirect()->back(); // Redirect back to the previous page
    }
}
