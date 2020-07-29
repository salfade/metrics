<div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex items-center">
            <div class="ml-1 w-0 flex-1">
                <dl>
                    <div class="flex justify-between">
                        <div class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            {{$title}}
                        </div>
                        <div class="mt-1">
                            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                <select id="select-{{$componentId}}"
                                    class="block form-select transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @foreach ($ranges as $k => $v)
                                    <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <dd class="flex items-baseline mr-2">
                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                            <div wire:ignore id="{{$componentId}}"></div>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var optionsSpark3 = {
        series: [{
            data: @json($data)
        }],
        chart: {
            id: 'area-chart-{{$componentId}}',
            type: 'area',
            // height: 160,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'straight'
        },
        markers: {
            size: 5
        },
        fill: {
            opacity: 0.3
        },
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        yaxis: {
            min: 0
        },
        title: {
            text: {{array_sum($data)}},
            offsetX: 0,
            style: {
                fontSize: '24px',
            }
        }
    };

    var chartSpark3 = new ApexCharts(document.getElementById('{{$componentId}}'), optionsSpark3).render();

    document.addEventListener('DOMContentLoaded', function () {
        @this.on('area-chart-data-changed',function(data) {
            ApexCharts.exec('area-chart-{{$componentId}}','updateSeries',[{
                data: data
            }], true);
            var sum = data.reduce(function(a, b){
                  return a + b;
            }, 0);
            ApexCharts.exec('area-chart-{{$componentId}}', 'updateOptions', {
                title: {
                    text: sum
                }
            }, true);

        });
    });
    document.getElementById('select-{{$componentId}}').onchange = function(e){
         var newData = @this.call('getDataByRange',e.target.value);
    }
</script>
@endpush