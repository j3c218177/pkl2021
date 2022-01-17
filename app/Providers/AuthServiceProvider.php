<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Definisikan role apakah kepala sekret, pegawai sekret, atau anggota biofarmaka lain
        Gate::define('isMaster', function($user) {
            return $user->role == 'Master';
         });        
        Gate::define('isPegawai', function($user) {
             return $user->role == 'Pegawai';
         });
         Gate::define('isAnggota', function($user) {
            return $user->role == 'Anggota';
        });
    }
}
