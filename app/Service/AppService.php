<?php

namespace App\Service;
use App\Service\DatabaseService;

class AppService
{
    public function __construct(private DatabaseService $databaseService, private array $config) 
    {                           

    }
    public function sendResponse()
    {
        dd($config);
        return $this->databaseService->getGenres(); 
    }
}


