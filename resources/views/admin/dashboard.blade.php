@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: "{{ url('api/chart-data') }}",
        method: "GET",
        success: function(data) {
            var xValues = [];
            var yValues = [];
            var barColors = [];

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

            for (var i in data.xValues) {
                xValues.push(data.xValues[i])
                yValues.push(data.yValues[i])
                barColors.push(dynamicColors())
            }

            new Chart('myChart', {
                type: 'bar',
                data: {
                    labels: xValues,
                    datasets: [{
                        data: yValues,
                        backgroundColor: barColors
                    }]
                },
                options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: "Chart Matakuliah"
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    })
})
</script>
@endsection
