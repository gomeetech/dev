<?php

namespace NSPACEProviders;

use Illuminate\Support\ServiceProvider;

use Gomee\Core\System;
use Gomee\Core\RouteManager;

class NAME extends ServiceProvider
{
    protected $dir = null;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->dir = dirname(dirname(dirname(dirname(__FILE__))));
        RouteManager::package('PACKAGESLUG');
        System::addPackage('PACKAGESLUG', $this->dir, [
            
        ]);


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
