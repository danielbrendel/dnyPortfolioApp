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
                return static::raw('SELECT * FROM `@THIS` WHERE active = 1 AND created_at <= NOW() ORDER BY created_at DESC LIMIT ' . $limit);
            } else {
                return static::raw('SELECT * FROM `@THIS` WHERE active = 1 AND created_at <= NOW() ORDER BY created_at DESC');
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
            
            $slug = slug(($lastId + 1) . ' ' . preg_replace('/[\x{1F300}-\x{1F6FF}\x{1F900}-\x{1F9FF}]/u', '', $title));

            $metaimg = null;

            if ((isset($_FILES['metaimg'])) && ($_FILES['metaimg']['error'] === UPLOAD_ERR_OK)) {
                $file_ext = Utils::getImageExt($_FILES['metaimg']['tmp_name']);

                if ($file_ext === null) {
                    throw new \Exception('File is not a valid image');
                }

                $file_name = md5(random_bytes(55) . date('Y-m-d H:i:s'));

                move_uploaded_file($_FILES['metaimg']['tmp_name'], public_path('/img/uploads/' . $file_name . '.' . $file_ext));

                $metaimg = $file_name . '.' . $file_ext;
            }

            static::insert('slug', $slug)->insert('title', $title)->insert('content', $content)->insert('metaimg', $metaimg)->go();

            return static::where('slug', '=', $slug)->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}