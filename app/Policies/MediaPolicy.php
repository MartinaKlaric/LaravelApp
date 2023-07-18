<?php

namespace App\Policies;

use App\Models\User;

class MediaPolicy
{
   public function show(User $user): bool
   {
       return $user->email === 'marko@predavaci.algebra.hr';
   }
}
