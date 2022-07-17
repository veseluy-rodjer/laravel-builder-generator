<?php

namespace VeseluyRodjer\RepositoryGenerator;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use VeseluyRodjer\RepositoryGenerator\Console\MakeRepository;
use VeseluyRodjer\RepositoryGenerator\Console\MakeRepositoryInterface;

class RepositoryGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/repository-generator.php', 'repository-generator');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepository::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/repository-generator.php' => config_path('repository-generator.php'),
            ], 'config');
        }
    }
}
