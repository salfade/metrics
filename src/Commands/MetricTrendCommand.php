<?php

namespace Salfade\Metric\Commands;

use Illuminate\Console\GeneratorCommand;

class MetricTrendCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'metric:trend';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metric:trend {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trend metric';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . "/../../stubs/metric-trend.stub";
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
        return $rootNamespace . '\Metrics';
    }
}
