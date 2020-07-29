@props(['metrics'])
<div class="mt-5 mb-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

    @foreach ($metrics as $metric)

        @if($metric instanceof Salfade\Metric\TrendMetrics)
            <livewire:metric-trend />
        @elseif($metric instanceof Salfade\Metric\MetricValueComponent)
            <livewire:metric-value title="{{$metric->title()}}" value="{{$metric->value()}}" icon="{{$metric->icon()}}"
                url="{{$metric->url()}}" />
        @endif

    @endforeach
</div>