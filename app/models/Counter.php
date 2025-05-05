<?php

/*
    Asatru PHP - Model for Counter
*/

class Counter extends \Asatru\Database\Model {
    /**
     * @return void
     * @throws \Exception
     */
    public static function addCount()
    {
        try {
            $visitor_token = md5($_SERVER['REMOTE_ADDR']);
            $request_uri = $_SERVER['REQUEST_URI'] ?? null;

            static::raw('INSERT INTO `@THIS` (visitor_token, request_uri) VALUES(?, ?)', [$visitor_token, $request_uri]);
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

    /**
     * @param $request_uri
     * @return int
     * @throws \Exception
     */
    public static function getForRequestUri($request_uri)
    {
        try {
            return static::raw('SELECT COUNT(DISTINCT visitor_token) AS count FROM `@THIS` WHERE request_uri = ?', [$request_uri])->first()->get('count');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}