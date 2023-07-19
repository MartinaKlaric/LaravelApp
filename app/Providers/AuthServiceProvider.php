<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use App\Policies\MediaPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MediaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function(User $user){
            if ($user->isAdmin()){
                return true;
            }
        });

        Gate::define('list-media', function(User $user, bool $isAdmin = false){
            return $isAdmin ? Response::allow() 
            : Response::deny('You must be an admin!');
        });

        Gate::define('show-media', [MediaPolicy::class, 'show']);
    }
}
