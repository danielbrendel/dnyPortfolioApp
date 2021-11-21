<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContentModel extends Model
{
    /**
     * @param string $field
     * @param string $lang
     * @return string
     * @throws \Exception
     */
    public static function queryContent(string $field, string $lang = 'en')
    {
        return Cache::remember($field . '_' . $lang, 120, function() use ($field, $lang) {
            if (env('APP_QUERYTYPE') === 'db') {
               return static::queryContentDb($field, $lang);
            } else if (env('APP_QUERYTYPE') === 'file') {
                return static::queryContentFile($field, $lang);
            } else {
                throw new \Exception('Invalid query type specified: ' . env('APP_QUERYTYPE'));
            }
        });
    }

    /**
     * @param string $field
     * @param string $lang
     * @return string
     */
    private static function queryContentDb(string $field, string $lang)
    {
        $item = ContentModel::where('lang', '=', $lang)->first();
        return $item->$field;
    }

    /**
     * @param string $field
     * @param string $lang
     * @return mixed
     */
    private static function queryContentFile(string $field, string $lang)
    {
        if (!file_exists(base_path() . '/resources/pages/' . $lang . '/' . $field . '.txt')) {
            return null;
        }

        return file_get_contents(base_path() . '/resources/pages/' . $lang . '/' . $field . '.txt');
    }
}
