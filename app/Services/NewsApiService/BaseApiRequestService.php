<?php

namespace App\Services\NewsApiService;

use Illuminate\Support\Facades\Http;

abstract class BaseApiRequestService implements NewsRequestInterface
{
    protected const API_KEY = '863dce252369452c874ee6a806d51ed0';
    protected const BASE_SOURCE_URI = 'https://newsapi.org/';

    function checkSource(): int
    {
        $response = Http::get(self::BASE_SOURCE_URI);
        return $response->status();
    }

//    abstract public function getSources(): void;
//    abstract public function getContent(): void;
    abstract public function prepareContent(): void;
}
