<?php

namespace App\Http\Controllers\Localization;

use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;
use App;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        if (in_array($locale, ['id', 'en'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
