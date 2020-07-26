<?php

namespace Salfade\Metric;

use Livewire\Component;

class MetricValueComponent extends Component
{

    public $title = 'Some Card';
    public $value = 100;
    public $url = '#';
    public $icon = 'home';


    public function mount($title, $value, $icon = 'chart-square-bar', $url = '#')
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->url = $url;
    }

    public function render()
    {
        return view('metrics::metric-value');
    }
}
