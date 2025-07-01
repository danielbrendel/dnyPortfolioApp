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
            static::checkReset();

            $shouts = static::raw('SELECT * FROM `@THIS` WHERE used = 0 ORDER BY RAND() LIMIT ' . $count);

            foreach ($shouts as $shout) {
                static::raw('UPDATE `@THIS` SET used = 1 WHERE id = ?', [$shout->get('id')]);
            }

            return $shouts;
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
            static::checkReset();
            
            $message = static::raw('SELECT * FROM `@THIS` WHERE used = 0 ORDER BY RAND() LIMIT 1')->first();

            static::raw('UPDATE `@THIS` SET used = 1 WHERE id = ?', [$message->get('id')]);

            return $message;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public static function checkReset()
    {
        try {
            $total_count = static::raw('SELECT COUNT(*) AS count FROM `@THIS`')->first();
            $usage_count = static::raw('SELECT COUNT(*) AS count FROM `@THIS` WHERE used = 1')->first();

            if ($total_count->get('count') == $usage_count->get('count')) {
                static::raw('UPDATE `@THIS` SET used = 0');
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}