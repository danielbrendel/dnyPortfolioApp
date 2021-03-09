<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContentModel extends Model
{
    public static function queryContent(string $field, string $lang = 'en')
    {
        return Cache::remember($field . '_' . $lang, 120, function() use ($field, $lang) {
            $item = ContentModel::where('lang', '=', $lang)->first();
            return $item->$field;
        });
    }
}
