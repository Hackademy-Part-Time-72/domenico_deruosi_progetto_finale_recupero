<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();

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

        // FORGOT PASSWORD VIEW
        $this->app->singleton(\Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse {
                public function toResponse($request)
                {
                    return response()->view('auth.forgot-password');
                }
            };
        });

        // RESET PASSWORD VIEW
        $this->app->singleton(\Laravel\Fortify\Contracts\ResetPasswordViewResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\ResetPasswordViewResponse {
                public function toResponse($request)
                {
                    return response()->view('auth.reset-password');
                }
            };
        });

        // VERIFY EMAIL VIEW
        $this->app->singleton(\Laravel\Fortify\Contracts\VerifyEmailViewResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\VerifyEmailViewResponse {
                public function toResponse($request)
                {
                    return response()->view('auth.verify-email');
                }
            };
        });

        // CONFIRM PASSWORD VIEW
        $this->app->singleton(\Laravel\Fortify\Contracts\ConfirmPasswordViewResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\ConfirmPasswordViewResponse {
                public function toResponse($request)
                {
                    return response()->view('auth.confirm-password');
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
