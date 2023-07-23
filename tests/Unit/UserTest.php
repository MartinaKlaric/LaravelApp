<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsAdminReturnsExpectedResult(): void
    {
        $user = new User();
        $role = new Role();
        $role->name = 'Administrator';
        $user->role = $role;

        $this->assertTrue($user->isAdmin());
    }
}