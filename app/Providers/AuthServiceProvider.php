<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\MediaPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
        //
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
