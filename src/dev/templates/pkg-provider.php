<?php

namespace NSPACEProviders;

use Illuminate\Support\ServiceProvider;

use Gomee\Core\System;

class NAME extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        System::addPackage('PACKAGESLUG', dirname(dirname(dirname(dirname(__FILE__)))));

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
