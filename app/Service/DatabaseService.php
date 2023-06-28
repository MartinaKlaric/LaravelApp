<?php

namespace App\Service;
use App\Service\ConnectionService;

class DatabaseService
{
    public function __construct(private ConnectionServiceInterface $connectionService)
    {
        
    }

    public function getGenres()
    {
        return ['Horor', 'Drama', 'Komedija'];
    }
}

