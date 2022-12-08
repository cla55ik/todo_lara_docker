<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Redis;

class TestRedisController
{
    public function redisTest(): Response
    {
        Redis::connection()->setName('ivan');
        Redis::connection()->client()->set('test:ivan', 'ivan');
        dd('asd');
    }
}
