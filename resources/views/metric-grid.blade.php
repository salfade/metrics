@props(['metrics'])
<div class="mt-5 mb-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

    @foreach ($metrics as $metric)

        <livewire:xmetric title="{{$metric->title()}}" value="{{$metric->value()}}" icon="{{$metric->icon()}}"
                          url="{{$metric->url()}}"/>

    @endforeach
</div>
