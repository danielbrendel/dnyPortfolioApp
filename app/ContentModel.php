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
        return static::replaceVars($item->$field);
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

        $content = file_get_contents(base_path() . '/resources/pages/' . $lang . '/' . $field . '.txt');

        return static::replaceVars($content);
    }

    /**
     * @param string $content
     * @return string
     */
    public static function replaceVars($content)
    {
        $content = str_replace(':title:', env('APP_TITLE'), $content);
        $content = str_replace(':author:', env('APP_AUTHOR'), $content);
        $content = str_replace(':contact:', env('APP_CONTACT'), $content);
        $content = str_replace(':year:', date('Y'), $content);
        $content = str_replace(':steam:', env('LINK_STEAM'), $content);
        $content = str_replace(':itch:', env('LINK_ITCHIO'), $content);
        $content = str_replace(':gplay:', env('LINK_GOOGLEPLAY'), $content);
        $content = str_replace(':youtube:', env('LINK_YOUTUBE'), $content);
        $content = str_replace(':mastodon:', env('LINK_MASTODON'), $content);
        $content = str_replace(':twitter:', env('LINK_TWITTER'), $content);
        $content = str_replace(':linkedin:', env('LINK_LINKEDIN'), $content);
        $content = str_replace(':discord:', env('LINK_DISCORD'), $content);

        return $content;
    }
}
