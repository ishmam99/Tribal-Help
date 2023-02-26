@extends('layouts.default')

{{-- @section('title', 'Dashboard') --}}

@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">বয়স ভিত্তিক রিপোর্ট</h1>
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
                        <h4>বয়স ভিত্তিক শিক্ষার্থীদের ধারাবাহিক স্বাস্থ্য রিপোর্ট</h4>
                    </div>
                    <div class="col-2"> <img src="{{ asset('svg/bgvv.png') }}" alt=""
                            style="height: 120px;width:120px;padding-left:15px">
                        <p style="font-size:12px">তারিখ : {{ en2bn(Carbon\Carbon::now()->format('d.m.Y')) }}</p>
                    </div>

                    <div class="col-12 row" style="margin-top:180px ">

                        <div class="col-10 pb-4 mt-5" style="margin-bottom:100px">
                            <h5>ক্যাটাগরিঃ{{ $disease_bn }}</h5>
                        </div>
                        <div class="col-12">
                            @for ($i = date('Y'); $i > date('Y') - 5; $i--)
                                <div class=" col-12 " 
                                         style="padding-bottom:15px;padding-left:200px"> 
                                    <h6 class="font-weight-bold text-center ">ক্যালেন্ডার বর্ষঃ{{ en2bn($i) }}</h6>

                                    <div class="pt-2">
                                        <table class="table-bordered">
                                            <thead>
                                                <th class="text-center">বয়স</th>
                                                <th>
                                                <th>
                                                <th class="text-center">রেটিং /জন</th>
                                                </th>
                                                </th>
                                                <th></th>
                                                <th></th>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center" style="width: 15%">১</th>
                                                    <th class="text-center" style="width: 15%">২</th>
                                                    <th class="text-center" style="width: 15%">৩</th>
                                                    <th class="text-center" style="width: 15%">৪</th>
                                                    <th class="text-center" style="width: 15%">৫</th>
                                                </tr>
                                                </th>
                                            </thead>
                                            <tbody>
                                                @for ($j = 4; $j <= 18; $j++)
                                                    <tr>
                                                        <td class="text-center">{{ en2bn($j) }} বছর</td>

                                                        <td class="text-center">
                                                            {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('age', $j)->where($disease, 1)->count()) }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('age', $j)->where($disease, 2)->count()) }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('age', $j)->where($disease, 3)->count()) }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('age', $j)->where($disease, 4)->count()) }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('age', $j)->where($disease, 5)->count()) }}
                                                        </td>
                                                    </tr>
                                                @endfor
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            @endfor
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    </section>
@stop
