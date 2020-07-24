<?php

namespace Salfade\Metric;

use Illuminate\Support\ServiceProvider;
use Salfade\Metric\Commands\MetricCommand;

class MetricServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/metrics.php' => config_path('metrics.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/metrics'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_metrics_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_metrics_table.php'),
                ], 'migrations');
            }

            $this->commands([
                MetricCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'metrics');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/metrics.php', 'metrics');
    }
}
