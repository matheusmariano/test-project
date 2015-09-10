<?php

namespace Niobium\Tumblr\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Key
{
    /**
     * All the keys used by OAuth.
     *
     * @var array
     */
    protected static $raw = [
        'consumer' => [
            'consumer_key',
            'consumer_secret',
        ],
        'oauth' => [
            'oauth_token',
            'oauth_token_secret',
        ],
    ];

    /**
     * Get all the keys used by OAuth.
     *
     * @param  bool  $camel
     * @return Collection
     */
    public static function all($camel = false)
    {
        return static::map(Collection::make(static::$raw)->flatten(), $camel);
    }

    /**
     * Get OAuth Token keys.
     *
     * @param  bool  $camel
     * @return Collection
     */
    public static function oauth($camel = false)
    {
        return static::map(Collection::make(static::$raw['oauth']), $camel);
    }

    /**
     * Get Consumer keys.
     *
     * @param  bool  $camel
     * @return Collection
     */
    public static function consumer($camel = false)
    {
        return static::map(Collection::make(static::$raw['consumer']), $camel);
    }

    /**
     * Map the collection and convert its values to camel case if $camel is true.
     *
     * @param  Collection  $collection
     * @param  bool        $camel
     * @return Collection
     */
    protected static function map(Collection $collection, $camel)
    {
        if ($camel) {
            return $collection->map(function ($item) {
                return Str::camel($item);
            });
        }

        return $collection;
    }
}
