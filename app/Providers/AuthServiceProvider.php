<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
         Gate::define('admin-only', function ($user) {    
             
            if($user->name == 'cfyl@wp.pl')
            {                
                return true;
            }
            return false;
        });
        //
        
        Gate::define('loggedIn', function ($user){
           return true;
            //\App\Jqwidgetshelper::writeDataToFile("sdfsdfg");
            if($user === \Auth::user())
            {
                   return true;
            }
            return false;
        });
    }
}
