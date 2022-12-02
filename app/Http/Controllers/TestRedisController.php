<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class TestRedisController
{
    public function redisTest(): Response
    {
        Redis::set('name', 'Taylor');

        $values = Redis::lrange('names', 5, 10);
        dd(Redis::get('name'));
    }
}
