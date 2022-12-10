<?php

namespace App\Http\Controllers;

use App\ContentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index()
    {
        return view('home', [
            'header_banner' => true,
            'content' => ContentModel::queryContent('home_index', \App::getLocale())
        ]);
    }

    public function news()
    {
        return view('news');
    }

    public function tech()
    {
        return view('tech', [
            'content' => ContentModel::queryContent('home_tech', \App::getLocale())
        ]);
    }

    public function discord()
    {
        if (!env('APP_SHOW_DISCORD')) {
            abort(404);
        }

        return view('discord');
    }

    public function imprint()
    {
        return view('imprint', [
            'content' => ContentModel::queryContent('home_imprint', \App::getLocale())
        ]);
    }
}
