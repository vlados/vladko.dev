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

if (!function_exists('is_bot')) {
    /**
     * Check if the user is bot depending on get param or the user agent header.
     * @return bool
     */
    function is_bot(): bool
    {
        return \request()->has('bot') ||
        \request()->headers->has('user-agent')
        && preg_match('/bot|crawl|slurp|spider|mediapartners|Chrome-Lighthouse/i', \request()->headers->get('user-agent'));
    }
}
