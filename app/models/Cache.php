<?php

/*
    Asatru PHP - Model for Caching
*/

class Cache extends \Asatru\Database\Model {
    /**
     * Obtain value either from cache or from closure
     *	
        *	@param string $ident The cache item identifier
        *	@param int $timeInSeconds Amount of seconds the item shall be cached
        *	@param $closure Function to be called for the actual value
        *	@return mixed
        */
    public static function remember($ident, $timeInSeconds, $closure)
    {
        $item = Cache::find($ident, 'ident');
        if ($item->count() == 0) {
            $value = $closure();
            
            $data = array(
                'ident' => $ident,
                'value' => $value,
                'updated_at' => date('Y-m-d H:i:s')
            );
            
            foreach ($data as $key => $val) {
                Cache::insert($key, $val);
            }
            
            Cache::go();
            
            return $value;
        } else {
            $data = $item->get(0);
            $dtLast = new DateTime(date('Y-m-d H:i:s', strtotime($data->get('updated_at'))));
            $dtLast->add(new DateInterval('PT' . $timeInSeconds . 'S'));
            $dtNow = new DateTime('now');

            if ($dtNow < $dtLast) {
                return $data->get('value');
            } else {
                $value = $closure();
                
                $updData = array(
                    'value' => $value,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                
                foreach ($updData as $key => $val) {
                    Cache::update($key, $val);
                }

                Cache::where('id', '=', $data->get('id'));
                
                Cache::go();
                
                return $value;
            }
        }
        
        return null;
    }

    /**
     * Query an entire item
     * 
     * @param $ident
     * @param $default
     * @return mixed
     */
    public static function query($ident, $default = null)
    {
        $what = null;
        if (strpos($ident, '.') !== false) {
            $what = explode('.', $ident);
        }

        $result = Cache::where('ident', '=', (((is_array($what)) && (count($what) > 0)) ? $what[0] : $ident))->first();
        if (!$result) {
            return $default;
        }

        if ((is_array($what)) && (count($what) > 1)) {
            return $result->get($what[1]);
        }

        return $result->get('value');
    }
    
    /**
     * Check for item existence
     *
     *	@param $ident
        *  @return bool
        */
    public static function has($ident)
    {
        $item = Cache::find($ident, 'ident');
        if ($item->count() > 0) {
            return true;
        }
        
        return false;
    }

    /**
     * Check if item cache time is elapsed
     * 
     * @param $ident
     * @param $timeInSeconds
     * @return bool
     */
    public static function elapsed($ident, $timeInSeconds)
    {
        if (!Cache::has($ident)) {
            return false;
        }

        $data = Cache::where('ident', '=', $ident)->first();

        $dtLast = new DateTime(date('Y-m-d H:i:s', strtotime($data->get('updated_at'))));
        $dtLast->add(new DateInterval('PT' . $timeInSeconds . 'S'));
        $dtNow = new DateTime('now');

        return ($dtNow >= $dtLast);
    }
    
    /**
     * Get item and then delete it
     *
     *	@param $ident
        *  @return mixed
        */
    public static function pull($ident)
    {
        $item = Cache::find($ident, 'ident');
        if ($item->count() > 0) {
            $data = $item->get(0);
            
            Cache::where('id', '=', $item->get(0)->get('id'))->delete();
            
            return $data->get('value');
        }
        
        return null;
    }

    /**
     * Write item to table
     * 
     * @param $ident
     * @param $value
     * @return bool
     */
    public static function put($ident, $value)
    {
        if (Cache::has($ident)) {
            return false;
        }

        $data = array(
            'ident' => $ident,
            'value' => $value,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        foreach ($data as $key => $val) {
            Cache::insert($key, $val);
        }

        Cache::go();

        return true;
    }
    
    /**
     * Forget cache item
     * 
     * @param string $ident The item identifier
     * @return bool
     */
    public static function forget($ident)
    {
        $item = Cache::find($ident, 'ident');
        if ($item->count() > 0) {
            Cache::where('id', '=', $item->get(0)->get('id'))->delete();
            
            return true;
        }
        
        return false;
    }
}
    