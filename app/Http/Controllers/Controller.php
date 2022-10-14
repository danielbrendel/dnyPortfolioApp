<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $lang = (isset($_COOKIE['lang'])) ? $_COOKIE['lang'] : 'en';

            \App::setLocale($lang);

            return $next($request);
        });
    }

    public function validateNsfw()
    {
        if (!env('APP_SHOWNSFW', false)) {
            abort(404);
        }
    }
}
