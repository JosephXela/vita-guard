<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use App\Models\Doctor;
use App\Policies\ArticlePolicy;
use App\Policies\DoctorPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Article::class => ArticlePolicy::class,
        Doctor::class => DoctorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define("delete-permission", function ($user) {
            return ($user->role == "ADMIN") ?
                Response::allow() :
                Response::deny('Hanya Admin Yang Boleh Menghapus');
        });

        Gate::define("edit-permission", function ($user) {
            return ($user->role == "ADMIN") ?
                Response::allow() :
                Response::deny('Hanya Admin Yang Boleh Mengubah');
        });

        Gate::define("update-permission", function ($user) {
            return ($user->role == "ADMIN") ?
                Response::allow() :
                Response::deny('Hanya Admin Yang Boleh Mengubah');
        });

        Gate::define("create-permission", function ($user) {
            return ($user->role == "ADMIN") ?
                Response::allow() :
                Response::deny('Hanya Admin Yang Boleh Menambah');
        });

        Gate::define('action-readd', function ($user) {
            return in_array($user->role, ['admin', 'doctor']);
        });

        Gate::define("action-read", function ($user) {
            return ($user->role == "ADMIN") ?
                Response::allow() :
                Response::deny('Hanya Admin Yang Dapat Melihat');
        });
        Gate::define('admin-only', function ($user) {
            return $user->role == 'ADMIN'
                ? Response::allow()
                : Response::deny('Forbidden Access');
        });

        Gate::define('staff-only', function ($user) {
            return in_array($user->role, ['ADMIN', 'DOCTOR'])
                ? Response::allow()
                : Response::deny('Forbidden Access');
        });
        Gate::define('member-only', function ($user) {
            return $user->role == 'MEMBER'
                ? Response::allow()
                : Response::deny('Forbidden Access');
        });
    }
}
