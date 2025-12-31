<?php

/*
    Asatru PHP - Model for Applets
*/

class Applets extends \Asatru\Database\Model {
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getList()
    {
        try {
            return json_decode(Cache::remember('applets.list', env('APP_CACHE_DURATION', 125), function() {
                return json_encode(static::raw('SELECT * FROM `@THIS` WHERE active = 1')?->asArray());
            }));
        } catch (\Exception $e) {
            throw $e;
        }
    }
}