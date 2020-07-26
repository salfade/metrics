<?php

namespace Salfade\Metric\Commands;

use Illuminate\Console\GeneratorCommand;

class MetricValueCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'metric:value';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metric:value {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new value metric';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . "/../../stubs/metric-value.stub";
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace. '\Metrics';
    }
}
