@extends('layouts.default')
@section('csesOne')

<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/css/core/colors/palette-gradient.css')}}">

@endsection
<?php
  function bn2enNumber ($number){
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $bn_number = str_replace($search_array, $replace_array, $number);

    return $bn_number;
  }
  ?>
@section('content')

<div class="main-content dashboard" id="mywraper" >
    <div class="container-fluid">

        <div id="cards">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-6 my-2">
                    <div class="card_item">
                        <div class="card_text">
                            <h5>আবেদন সংখ্যা</h5>
                            <h2>{{App\Models\Application::count()}}</h2>
                        </div>
                        <div class="card_image">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 my-2">
                    <div class="card_item">
                        <div class="card_text">
                            <h5>ডিজিটাল কনটেন্ট সংখ্যা</h5>
                          <h2>{{App\Models\DigitalContent::count()}}</h2>
                        </div>
                        <div class="card_image">
                            <i class="fas fa-hands"></i>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-4 col-6 my-2">
                    <div class="card_item">
                        <div class="card_text">
                            <h5>ছাত্রছাত্রী সংখ্যা</h5>
                            <h2>6</h2>
                        </div>
                        <div class="card_image">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-4 col-md-4 col-6 my-2">
                    <div class="card_item">
                        <div class="card_text">
                            <h5>ব্যবহারকারী</h5>
                            <h2>9</h2>
                        </div>
                        <div class="card_image">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--===============================
            chart
        =============================-->
        {{-- <div id="charts">
            <div class="row">
                <div class="col-md-8 col-12 my-2">
                    <div class="chart_item h-100">
                        <h5 class="text-center">বছর ভিত্তিক মোট ছাত্রছাত্রীর সংখ্যা চিত্র</h5>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-md-4 col-12 my-2">
                    <div class="chart_item h-100">
                        <h5 class="text-center">প্রকারভেদ অনুযায়ী স্বাস্থ্য সমস্যার পাই চার্ট</h5>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</div>




@endsection

@section('scripts_dah_charts')


    <script src="{{asset('assets/js/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme-assets/js/core/app-menu-lite.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme-assets/js/core/app-lite.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme-assets/js/scripts/pages/dashboard-lite.js')}}" type="text/javascript"></script>
    <script src="{{asset('src/js/vendor/modernizr-2.8.3.min.js')}}"></script>


<script>
    $('#delete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var name_guest = button.data('guestname')
        var Name_ID = button.data('guestid')

        var modal = $(this)
        modal.find('#guest_name').text(name_guest)
        modal.find('.modal-body #guest_id').val(Name_ID)

        });

    /*===============================
    chart js initialization
    =============================*/

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json(5),
        datasets: [{
             label: '',
            data: @json(4),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });

    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {

        datasets: [{
            label: '',
            data: @json(6),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });
</script>


@endsection
