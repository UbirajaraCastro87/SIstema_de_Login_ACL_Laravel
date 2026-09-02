<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; 

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Concede acesso total a todas as permissões para o Administrador
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Admin') ? true : null;
        });
    }
}