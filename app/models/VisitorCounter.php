<?php

/*
    Asatru PHP - Model
*/

/**
 * This class extends the base model class and represents your associated table
 */ 
class VisitorCounter extends \Asatru\Database\Model {
    /**
     * @return void
     * @throws \Exception
     */
    public static function addCount()
    {
        try {
            $visitor_token = md5($_SERVER['REMOTE_ADDR']);

            static::raw('INSERT INTO `@THIS` (visitor_token) VALUES(?)', [$visitor_token]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return int
     * @throws \Exception
     */
    public static function getCount()
    {
        try {
            return static::raw('SELECT COUNT(DISTINCT visitor_token) AS count FROM `@THIS`')->first()->get('count');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}