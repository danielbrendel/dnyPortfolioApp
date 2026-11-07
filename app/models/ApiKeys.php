<?php

/**
 * Class ApiKeys
 * 
 * Handle database operations for API keys
 */
class ApiKeys extends \Asatru\Database\Model {
    /**
     * @param $token
     * @return void
     * @throws \Exception
     */
    public static function verify($token)
    {
        $result = static::raw('SELECT * FROM `@THIS` WHERE token = ? AND active = 1', [$token])->first();
        if (!$result) {
            throw new \Exception('Error: Invalid key specified');
        }
    }
}