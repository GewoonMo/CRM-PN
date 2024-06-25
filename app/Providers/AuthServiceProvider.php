<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
 use app\Models\User;
 use app\Models\Profile;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//        Profile::class => adminPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete-customer', function ($user, $customer) {
            return $user->isAdmin() || $user->id === $customer->user_id;
        });

        Gate::define('update-customer', function ($user, $customer) {
            return $user->isAdmin() || $user->id === $customer->user_id;
        });

        Gate::define('view-customer', function ($user, $customer) {
            return $user->isAdmin() || $user->id === $customer->user_id;
        });

        Gate::define('create-customer', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('update-profile', function ($user, $profile) {
            return $user->isAdmin() || $user->id === $profile->user_id; // $user->id === $profile->user_id
        });
}
}
