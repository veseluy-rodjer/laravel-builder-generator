<?php

namespace VeseluyRodjer\RepositoryGenerator\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeRepository extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../../stubs/repository.stub';
    }

    public function handle()
    {
        return parent::handle();
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $dummyClass = str_replace($this->getNamespace($name).'\\', '', $name);
        $pathRepositoryInterface = str_replace(['Repository', '/'], ['RepositoryInterface', '\\'], $this->getNameInput());
        $pathModel = str_replace(['Repository', '/'], ['', '\\'], $this->getNameInput());
        $model = str_replace('Repository', '', $dummyClass);

        $stub = str_replace('{{ PathModel }}', $pathModel, $stub);
        $stub = str_replace('{{ Model }}', $model, $stub);
        $stub = str_replace('{{ PathRepositoryInterface }}', $pathRepositoryInterface, $stub);

        return parent::replaceNamespace($stub, $name);
    }

}
