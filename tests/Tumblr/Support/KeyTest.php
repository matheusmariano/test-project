<?php

namespace Niobium\Tests\Tumblr\Support;

use Niobium\Tumblr\Support\Key;
use Illuminate\Support\Collection;
use PHPUnit_Framework_TestCase as TestCase;

class KeyTest extends TestCase
{
    public function testAll()
    {
        $keys = Key::all();

        $this->assertInstanceOf(Collection::class, $keys);

        $this->assertEquals([
            'consumer_key',
            'consumer_secret',
            'oauth_token',
            'oauth_token_secret',
        ], $keys->toArray());
    }

    public function testAllWithCamel()
    {
        $keys = Key::all(true);

        $this->assertInstanceOf(Collection::class, $keys);

        $this->assertEquals([
            'consumerKey',
            'consumerSecret',
            'oauthToken',
            'oauthTokenSecret',
        ], $keys->toArray());
    }

    public function testOauth()
    {
        $keys = Key::oauth();

        $this->assertInstanceOf(Collection::class, $keys);

        $this->assertEquals([
            'oauth_token',
            'oauth_token_secret',
        ], $keys->toArray());
    }

    public function testOauthWithCamel()
    {
        $keys = Key::oauth(true);

        $this->assertInstanceOf(Collection::class, $keys);

        $this->assertEquals([
            'oauthToken',
            'oauthTokenSecret',
        ], $keys->toArray());
    }

    public function testConsumer()
    {
        $keys = Key::consumer();

        $this->assertInstanceOf(Collection::class, $keys);

        $this->assertEquals([
            'consumer_key',
            'consumer_secret',
        ], $keys->toArray());
    }

    public function testConsumerWithCamel()
    {
        $keys = Key::consumer(true);

        $this->assertInstanceOf(Collection::class, $keys);

        $this->assertEquals([
            'consumerKey',
            'consumerSecret',
        ], $keys->toArray());
    }
}
