<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'bn'], true)) {
            session(['locale' => $locale]);
        }

        return back();
    }
}
