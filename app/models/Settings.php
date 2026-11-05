<?php

/*
    Asatru PHP - Model for Settings
*/

class Settings extends \Asatru\Database\Model {
    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getSettings($id = 1)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` WHERE id = ? LIMIT 1', [$id])->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $item
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getValue($item, $id = 1)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` WHERE id = ? LIMIT 1', [$id])?->first()?->get($item);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}