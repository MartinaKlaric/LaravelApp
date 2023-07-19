<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsAdminReturnsExpectedResult(): void //test na početku naziva je obvezan
    {
        $user = new User();
        $role = new Role();   
        $role->name = 'Administrator'; 
        $user->role = $role; //našem useru dodijelili smo ulogu administratora

        $this->assertTrue($user->isAdmin());
    }
}
