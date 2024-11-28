<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $locale)
    {
        if (in_array($locale, ['en', 'mm'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        return back();
    }
}
