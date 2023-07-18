<?php

namespace App\Policies;

use App\Models\User;

class MediaPolicy
{
   public function show(User $user): bool
   {
       dd($user);
       return $user->email === 'marko@predavaci.algebra.hr';
   }
}
