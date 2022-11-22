<?php

namespace App\Console\Commands;

use App\Services\NewsApiService\NewsApiRequestService;
use App\Services\NewsApiService\NewsRequestInterface;
use Illuminate\Console\Command;
use Illuminate\Http\Response;

class GetNewsFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:getNews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get new news from api';

    /**
     * @param NewsApiRequestService $newsRequest
     */
    public function __construct(
        private NewsRequestInterface $newsRequest
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sourceStatus = $this->newsRequest->checkSource();
        if ($sourceStatus != Response::HTTP_OK){
            dd($sourceStatus);
        }

        $this->newsRequest->getContent();

        dd($this->newsRequest->getContentArray());
    }
}
