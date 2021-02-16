<?php

namespace App\Providers;

use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Illuminate\Support\Facades\Log;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         // Extendemos el Storage de Laravel agregando nuestro nuevo driver.
        Storage::extend('dropbox', function ($app, $config) { 
            Log::Info($config);
            $client = new DropboxClient(
                $config['authorization_token'] // Hacemos referencia al hash
            );
            return new Filesystem(new DropboxAdapter($client)); 
        });
    }
}
