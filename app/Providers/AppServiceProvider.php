<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\Owner;
use App\Policies\CarPolicy;
use App\Policies\OwnerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Owner::class => OwnerPolicy::class,
        Car::class   => CarPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
