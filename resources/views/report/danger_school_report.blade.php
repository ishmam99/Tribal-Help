@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">বিদ্যালয় ভিত্তিক রিপোর্ট</h1>
                    <input type="button" class="btn btn-success" onclick="printDiv('printableArea')"
                        value="প্রিন্ট বের করুন" />
                </div>
            </div>
        </div>
    </div>
    <div class="content" id="printableArea">
        <div class="container p-5">
            <div class="card p-5">
                <div class="row">
                    <div class="col-2"> <img src="{{ asset('svg/ri_1.png') }}" alt=""
                            style="height: 130px;width:130px"></div>
                    <div class="col-8 text-center">
                        <h2><b> জেলা প্রশাসকের কার্যালয়,লক্ষ্মীপুর</b></h2>
                        <h3><b> স্কুল হেলথ কার্ড</b></h3>
                        <h4><b> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</b></h4>
                        <h3>বিদ্যালয় ভিত্তিক ঝুঁকিপূর্ণ স্বাস্থ্য সমস্যা শনাক্তকরণ রিপোর্ট</h3>
                    </div>
                    <div class="col-2"> <img src="{{ asset('svg/bgvv.png') }}" alt=""
                            style="height: 120px;width:120px;padding-left:15px">
                        <p>তারিখ : {{ en2bn(Carbon\Carbon::now()->format('d.m.Y')) }}</p>
                    </div>
                        <div class="container" style="margin-top:100px ">
                                <h5>উপজেলাঃ {{$upazila}}</h5>
                                <h5>বিদ্যালয়ঃ {{$school}}</h5>
                                <h5>ক্যালেন্ডার বর্ষঃ {{en2bn($year)}}</h5>
                        </div>
                    <div class="row">
                        <div class="col-12" id="curve_chart" style=" height: 800px;"></div>
                        {{-- <div class="col-10">
                            @foreach ($years as $keys => $data)
                                <span> ({{ en2bn($keys) }} ,{{ en2bn(round($data, 2)) }}),</span>
                            @endforeach
                        </div> --}}
                    </div>                   
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart1);
                        function drawChart1() {
                            var diseases = @json($diseases);
                            console.log(diseases);
                            var chartData = [];
                            Object.keys(diseases).forEach(function(name) {
                                chartData.push([name, diseases[name]]);
                            });
                            var data = google.visualization.arrayToDataTable(chartData, true);
                            var view = new google.visualization.DataView(data);
                              view.setColumns([0,1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" } ]);
                            var options = {
                                 title : 'বিদ্যালয় ভিত্তিক ঝুঁকিপূর্ণ স্বাস্থ্য সমস্যা শনাক্তকরণ চার্ট (শতকরা হিসেবে)',
                                bar: {groupWidth: "80%"},
                               width: 870,
                                legend: 'none',
                                pointSize: 6
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart'));
                            chart.draw(view, options);
                        }
                        function printDiv(divName) {
                            var printContents = document.getElementById(divName).innerHTML;
                            var originalContents = document.body.innerHTML;
                            document.body.innerHTML = printContents;
                            window.print();
                            document.body.innerHTML = originalContents;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    </section>
    
@stop
