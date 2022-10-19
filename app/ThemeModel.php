<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeModel extends Model
{
    /**
     * @return string
     */
    public static function getTheme()
    {
        $theme = env('APP_THEME', null);
        
        if (($theme !== null) && (file_exists(public_path() . '/css/themes/' . $theme . '.css'))) {
            return asset('css/themes/' . $theme . '.css');
        }

        return asset('css/app.css');
    }
}
