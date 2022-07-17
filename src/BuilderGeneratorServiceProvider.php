<?php

namespace VeseluyRodjer\BuilderGenerator;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use VeseluyRodjer\BuilderGenerator\Console\MakeBuilder;

class BuilderGeneratorServiceProvider extends ServiceProvider
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

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeBuilder::class,
            ]);
        }
    }
}
