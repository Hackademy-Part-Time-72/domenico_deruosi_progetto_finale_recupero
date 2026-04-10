<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Creazione utenti
        Fortify::createUsersUsing(CreateNewUser::class);

        // View login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // View registrazione
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Redirect dopo login e registrazione
        Fortify::redirects('login', '/articles');
        Fortify::redirects('register', '/articles');
    }
}
