<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreviewModel extends Model
{
    /**
     * @return array
     */
    public static function getItems()
    {
        $result = [];

        $items = app('config')->get('previews');
        foreach ($items as $item) {
            if ((!env('APP_SHOWNSFW')) && ((isset($item['nsfw'])) && ($item['nsfw']))) {
                continue;
            }

            $result[] = $item;
        }

        return $result;
    }

    /**
     * @return int
     */
    public static function getCount()
    {
        $result = 0;

        $items = app('config')->get('previews');
        foreach ($items as $item) {
            if ((!env('APP_SHOWNSFW')) && ((isset($item['nsfw'])) && ($item['nsfw']))) {
                continue;
            }

            $result++;
        }

        return $result;
    }
}
