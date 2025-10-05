<?php

/*
    Asatru PHP - Model
*/

class Endpoints extends \Asatru\Database\Model {
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getAll()
    {
        try {
            return  static::raw('SELECT * FROM `@THIS` WHERE active = 1');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return int
     * @throws \Exception
     */
    public static function getQuantity()
    {
        try {
            return  static::raw('SELECT COUNT(*) AS count FROM `@THIS` WHERE active = 1')->first()->get('count');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getById($id)
    {
        try {
            return  static::raw('SELECT * FROM `@THIS` WHERE id = ? AND active = 1 LIMIT 1', [$id])->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}