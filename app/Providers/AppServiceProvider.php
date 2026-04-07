<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // LOGIN VIEW
        $this->app->singleton(\Laravel\Fortify\Contracts\LoginViewResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\LoginViewResponse {
                public function toResponse($request)
                {
                    return response()->view('auth.login');
                }
            };
        });

        // REGISTER VIEW
        $this->app->singleton(\Laravel\Fortify\Contracts\RegisterViewResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\RegisterViewResponse {
                public function toResponse($request)
                {
                    return response()->view('auth.register');
                }
            };
        });

        // LOGOUT
        $this->app->singleton(\Laravel\Fortify\Contracts\LogoutResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\LogoutResponse {
                public function toResponse($request)
                {
                    return redirect('/');
                }
            };
        });
    }
}
