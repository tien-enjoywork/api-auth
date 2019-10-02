<?php

namespace TienEnjoywork\APIAuth;

use Illuminate\Support\ServiceProvider;
use TienEnjoywork\APIAuth\Console\InstallAPIAuthPackage;

class APIAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('enjoywork_auth.php'),
            ], 'config');
			
			if (! class_exists('UpdatePasswordResetsTable')) {
				$this->publishes([
				  __DIR__ . '/../database/migrations/update_password_resets_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_update_password_resets_table.php'),
				], 'migrations');
			  }

            // Registering package commands.
			$this->commands([
				InstallAPIAuthPackage::class,
			]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'enjoywork_auth');

        // Register the main class to use with the facade
        $this->app->singleton('apiauth', function () {
            return new APIAuth;
        });
    }
}
