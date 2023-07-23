<?php

namespace Tests\Unit;

use App\Service\ConnectionService;
use App\Service\DatabaseService;
use PHPUnit\Framework\TestCase;

class DatabaseServiceTest extends TestCase
{
    
    public function testGetGenresReturnsExpectedResult(): void
    {
        $connectionService = new ConnectionService();
        $databaseService = new DatabaseService(
            $connectionService
        );

        $this->assertIsArray($databaseService->getGenres());
        $this->assertSame($databaseService->getGenres(), ['Horor', 'Drama', 'Komedija']);
    }
}