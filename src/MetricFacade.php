<?php

namespace Salfade\Metric;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Salfade\Metric\Metric
 */
class MetricFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'metrics';
    }
}
