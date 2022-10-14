<?php

namespace App\Http\Controllers;

use App\ContentModel;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function geekflash()
    {
        return view('services.geekflash', [
            'content' => ContentModel::queryContent('services_geekflash', \App::getLocale())
        ]);
    }

    public function helprealm()
    {
        return view('services.helprealm', [
            'content' => ContentModel::queryContent('services_helprealm', \App::getLocale())
        ]);
    }

    public function lachanfall()
    {
        return view('services.lachanfall', [
            'content' => ContentModel::queryContent('services_lachanfall', \App::getLocale())
        ]);
    }

    public function astarlove()
    {
        return view('services.astarlove', [
            'content' => ContentModel::queryContent('services_astarlove', \App::getLocale())
        ]);
    }

    public function gamingpals()
    {
        return view('services.gamingpals', [
            'content' => ContentModel::queryContent('services_gamingpals', \App::getLocale())
        ]);
    }

    public function webframeworkdb()
    {
        return view('services.webframeworkdb', [
            'content' => ContentModel::queryContent('services_webframeworkdb', \App::getLocale())
        ]);
    }

    public function mittelalterevents()
    {
        return view('services.mittelalterevents', [
            'content' => ContentModel::queryContent('services_mittelalterevents', \App::getLocale())
        ]);
    }

    public function gamedevscreens()
    {
        return view('services.gamedevscreens', [
            'content' => ContentModel::queryContent('services_gamedevscreens', \App::getLocale())
        ]);
    }

    public function steamwidgets()
    {
        return view('services.steamwidgets', [
            'content' => ContentModel::queryContent('services_steamwidgets', \App::getLocale())
        ]);
    }
}
