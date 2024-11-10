<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        //Passport::routes();

        // Optionnel: Définir les scopes
        Passport::tokensCan([
            'create-posts' => 'Créer des articles',
            'edit-posts' => 'Modifier des articles',
        ]);

        Passport::setDefaultScope([
            'create-posts',
        ]);

    }

}
