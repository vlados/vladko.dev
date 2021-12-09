<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('_cache')) {
    /**
     * Gets value from cache or puts it into the cache.
     * @param $key
     * @param $set_value
     * @param $ttlInMinutes
     * @return false|mixed
     */
    function _cache($key, $set_value, $ttlInMinutes)
    {
        if (Cache::has($key)) {
            return Cache::get($key);
        } else {
            $val = call_user_func($set_value);
            Cache::put($key, $val, $ttlInMinutes * 60);

            return $val;
        }
    }
}
