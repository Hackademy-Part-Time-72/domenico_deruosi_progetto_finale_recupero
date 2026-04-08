<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // REGISTRAZIONE UTENTE
        Fortify::createUsersUsing(CreateNewUser::class);

        // VIEW LOGIN
        Fortify::loginView(fn() => view('auth.login'));

        // VIEW REGISTER
        Fortify::registerView(fn() => view('auth.register'));
    }
}
