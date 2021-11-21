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
}
