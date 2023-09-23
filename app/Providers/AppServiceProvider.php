<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider





{
    /**
     * Register any application services.
     */
    public function register():void
    {
        $this->app->bind(User::class, function ($app) {
            return new User();
        });
    
        Gate::define('view-cms-users', function ($user) {
            // Logika za provjeru dozvola za pregled CMS korisnika
            return $user->hasPermission('view-cms-users');
        });
        $this->app->bind(CmsUser::class, function ($app) {
            return new CmsUser();
        });
    
        Gate::define('create-cms-user', function ($user) {
            // Logika za provjeru dozvola za kreiranje CMS korisnika
            return $user->hasPermission('create-cms-user');
        });
    
        $this->app->bind(CmsRole::class, function ($app) {
            return new CmsRole();
        });
    
        Gate::define('manage-cms-roles', function ($user) {
            // Logika za provjeru dozvola za upravljanje CMS ulogama
            return $user->hasPermission('manage-cms-roles');
        });

       
   
}
}