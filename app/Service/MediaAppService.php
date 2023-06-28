<?php

namespace App\Service;

class MediaAppService
{
    public function __construct(private ConnectionServiceInterface $connectionService)
    {}
}