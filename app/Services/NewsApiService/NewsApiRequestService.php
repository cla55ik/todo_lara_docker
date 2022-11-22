<?php

namespace App\Services\NewsApiService;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class NewsApiRequestService extends BaseApiRequestService
{
    protected const SOURCES_PATH = 'v2/top-headlines/sources';
    protected const HEADLINE_PATH = 'v2/top-headlines';
    private array $allSources = [];
    private array $suitableSources = [];
    private array $contentArray = [];

    public function getSources(): void
    {
        $response = Http::get(self::BASE_SOURCE_URI . self::SOURCES_PATH, [
           'apiKey' => self::API_KEY,
        ]);

        $this->allSources = $response->json();
    }

    public function prepareContent(): void
    {
        $response = Http::get(self::BASE_SOURCE_URI . self::HEADLINE_PATH, [
            'apiKey' => self::API_KEY,
            'sources' => 'rt',
//            'category' => 'business'
        ]);

        $this->contentArray = $response->json();
    }

    public function prepareSources(): void
    {
        $array = $this->allSources['sources'];
        foreach ($array as $source){
            if ($source['language'] === 'ru' && $source['country'] === 'ru'){
                $this->suitableSources[] = $source;
            }
        }
    }

    /**
     * @return array
     */
    public function getSuitableSources(): array
    {
        return $this->suitableSources;
    }

    /**
     * @return array
     */
    public function getContentArray(): array
    {
        return $this->contentArray;
    }
}
