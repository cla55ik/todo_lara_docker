<?php

namespace App\Services\NewsApiService;

interface NewsRequestInterface
{
    public function checkSource(): int;
    public function prepareContent(): void;
}
