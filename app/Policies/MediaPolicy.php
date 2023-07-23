<?php

namespace App\Policies;

use App\Models\User;
use App\Http\Controllers\MediaController;

class MediaPolicy
{
   public function show(User $user): bool
   {
       return $user->email === 'marko@predavaci.algebra.hr';
   }
}
