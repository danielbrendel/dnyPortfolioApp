<?php

namespace App\Http\Controllers;

use App\ContentModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function asatruphp()
    {
        return view('products.asatruphp', [
            'content' => ContentModel::queryContent('product_asatruphp', \App::getLocale())
        ]);
    }

    public function dnys()
    {
        return view('products.dnys', [
            'content' => ContentModel::queryContent('product_dnyscript', \App::getLocale())
        ]);
    }

    public function danigram()
    {
        return view('products.danigram', [
            'content' => ContentModel::queryContent('product_danigram', \App::getLocale())
        ]);
    }

    public function actifisys()
    {
        return view('products.actifisys', [
            'content' => ContentModel::queryContent('product_actifisys', \App::getLocale())
        ]);
    }

    public function cdg()
    {
        return view('products.cdg', [
            'content' => ContentModel::queryContent('product_cdg', \App::getLocale())
        ]);
    }
}
