<?php

/*
    Asatru PHP - Model for Shoutbox
*/

class Shoutbox extends \Asatru\Database\Model {
    /**
     * @param $count
     * @return mixed
     * @throws \Exception
     */
    public static function pickMessages($count)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` ORDER BY RAND() LIMIT ' . $count);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function queryMessage()
    {
        try {
            return static::raw('SELECT * FROM `@THIS` ORDER BY RAND() LIMIT 1')->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}