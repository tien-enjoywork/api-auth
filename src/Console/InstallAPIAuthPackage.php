<?php

namespace TienEnjoywork\APIAuth\Console;

use Illuminate\Console\Command;

class InstallAPIAuthPackage extends Command
{
    protected $signature = 'enjoywork_auth_package:install';

    protected $description = 'Install the APIAuth Package';

    public function handle()
    {
        $this->info('Installing APIAuth Package...');

        $this->info('Publishing configuration...');
        $this->call('vendor:publish', [
            '--provider' => "TienEnjoywork\APIAuth\APIAuthServiceProvider",
            '--tag' => "config"
		]);
		
		$this->info('Publishing migrations...');
		$this->call('vendor:publish', [
            '--provider' => "TienEnjoywork\APIAuth\APIAuthServiceProvider",
            '--tag' => "migrations"
		]);
		
		$this->call('config:cache');
		
		$this->call('migrate');

        $this->info('Installed APIAuth Package');
    }
}