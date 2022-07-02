<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\Admin\Enums\AdminType;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', static function (Admin $admin) {
            return $admin->role === AdminType::SUPER_USER;
        });

        Gate::define('hospital_clerk', static function (Admin $admin) {
            return $admin->role === AdminType::HOSPITAL_CLERK;
        });

        Gate::define('kitchen_staff', static function (Admin $admin) {
            return $admin->role === AdminType::KITCHEN_STAFF;
        });
    }
}
