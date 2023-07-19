<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Service\ConnectionService;
use App\Service\DatabaseService;

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
