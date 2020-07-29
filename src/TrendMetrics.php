<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class TrendMetrics extends Component
{
    public $componentId;
    public $title = '';
    public $ranges = [
        5 => '5 Days',
        10 => '10 Days',
        15 => '15 Days',
    ];
    public $data = [];

    public function getDataByRange($rangeValue)
    {
        $data = $this->getData($rangeValue);
        $this->emitSelf('area-chart-data-changed', $data);
    }

    public function getData($rangeValue)
    {
        return range(1, $rangeValue);
    }

    public function mount()
    {
        $this->componentId = Str::random(10);
        $this->data = $this->getData(5);
    }

    public function render()
    {
        return view('metrics::trend-metrics');
    }
}
