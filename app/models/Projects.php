<?php

/*
    Asatru PHP - Model
*/

class Projects extends \Asatru\Database\Model {
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getAll()
    {
        try {
            return static::raw('SELECT * FROM `@THIS` WHERE active = 1 ORDER BY weight DESC');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $slug
     * @return mixed
     * @throws \Exception
     */
    public static function fromSlug($slug)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` WHERE slug = ?', [$slug])->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getSneakPeek()
    {
        try {
            return static::raw('SELECT * FROM `@THIS` WHERE active = 1 ORDER BY RAND() LIMIT 2');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}