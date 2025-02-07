<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Client;
use Laravel\Passport\PersonalAccessClient;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
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
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::useClientModel(Client::class);
        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
        Passport::useRefreshTokenModel(RefreshToken::class);
        Passport::useTokenModel(Token::class);
    }
}
