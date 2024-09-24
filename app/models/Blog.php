<?php

/*
    Asatru PHP - Model for Blog
*/

class Blog extends \Asatru\Database\Model {
    /**
     * @param $limit
     * @return mixed
     * @throws \Exception
     */
    public static function fetch($limit = 0)
    {
        try {
            if ($limit > 0) {
                return static::raw('SELECT * FROM `@THIS` WHERE active = 1 ORDER BY created_at DESC LIMIT ' . $limit);
            } else {
                return static::raw('SELECT * FROM `@THIS` WHERE active = 1 ORDER BY created_at DESC');
            }
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
            return static::where('slug', '=', $slug)->where('active', '=', true)->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $title
     * @param $content
     * @return mixed
     * @throws \Exception
     */
    public static function submit($title, $content)
    {
        try {
            $lastId = (int)static::raw('SELECT * FROM `@THIS` ORDER BY id DESC')->first()?->get('id');
            
            $slug = slug(($lastId + 1) . ' ' . $title); 

            static::insert('slug', $slug)->insert('title', $title)->insert('content', $content)->go();

            return static::where('slug', '=', $slug)->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}