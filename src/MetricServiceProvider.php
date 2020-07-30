<?php

namespace Salfade\Metric;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Salfade\Metric\Commands\MetricTrendCommand;
use Salfade\Metric\Commands\MetricValueCommand;

class MetricServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/metrics.php' => config_path('metrics.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/metrics'),
            ], 'views');

            $this->commands([
                MetricValueCommand::class,
                MetricTrendCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'metrics');

        Blade::component('metrics::metric-grid', 'metrics-grid');
        Livewire::component('metric-value', MetricValueComponent::class);
        Livewire::component('metric-trend', TrendMetricsComponent::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/metrics.php', 'metrics');
    }
}
