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

    public function imprint()
    {
        return view('imprint', [
            'content' => ContentModel::queryContent('home_imprint', \App::getLocale())
        ]);
    }
}
