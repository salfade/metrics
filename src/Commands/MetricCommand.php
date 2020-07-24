<?php

namespace Salfade\Metric\Commands;

use Illuminate\Console\Command;

class MetricCommand extends Command
{
    public $signature = 'metrics';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
