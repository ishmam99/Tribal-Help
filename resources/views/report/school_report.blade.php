@extends('layouts.default')
@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">শিক্ষা প্রতিষ্ঠান ভিত্তিক রিপোর্ট</h1>
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
                    <div class="col-8 text-center" style="height: 200px">
                        <h2><b> জেলা প্রশাসকের কার্যালয়,লক্ষ্মীপুর</b></h2>
                        <h3><b> স্কুল হেলথ কার্ড</b></h3>
                        <h4><b> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</b></h4>
                        <h4>শিক্ষা প্রতিষ্ঠান ভিত্তিক শিক্ষার্থীদের ধারাবাহিক স্বাস্থ্য রিপোর্ট</h4>
                    </div>
                    <div class="col-2"> <img src="{{ asset('svg/bgvv.png') }}" alt=""
                            style="height: 120px;width:120px;padding-left:15px">
                        <p>তারিখ : {{ en2bn(Carbon\Carbon::now()->format('d.m.Y')) }}</p>
                    </div>
                     <h5 style="margin-top: 100px" >ক্যাটাগরিঃ {{$upazila}} এর সকল বিদ্যালয়</h5>
                    @foreach ($disease as $key => $item)
                        <div class="col-12 row "
                            @if ($key != 'neat_clean') style="margin-top: 400px"
                                 @else
                                 style="margin-top: 20px" @endif>
                            <div class="col-10 pb-5">
                                  
                                <h5 class="pt-3">{{ $item }}</h5>
                            </div>
                            <div class="col-12">
                                @for ($i = date('Y'); $i > date('Y') - 5; $i--)
                                    <div class=" col-12 " style="padding-top:10px">
                                        <h6 class="font-weight-bold text-center ">ক্যালেন্ডার বর্ষঃ{{ en2bn($i) }}</h6>
                                        <div class="pt-2">
                                            <table class="table-bordered">
                                                <thead>
                                                    <th class="text-center" style="width: 50%">শিক্ষা প্রতিষ্ঠান</th>
                                                    <th>
                                                    <th>
                                                    <th class="text-center">রেটিং /জন</th>
                                                    </th>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-center" style="width: 10%">১</th>
                                                        <th class="text-center" style="width: 10%">২</th>
                                                        <th class="text-center" style="width: 10%">৩</th>
                                                        <th class="text-center" style="width: 10%">৪</th>
                                                        <th class="text-center" style="width: 10%">৫</th>
                                                    </tr>
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($schools as $school)
                                                        <tr>
                                                            <td class="text-center">{{ $school->name }}</td>

                                                            <td class="text-center">
                                                                {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('school_id', $school->id)->where($key, 1)->count()) }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('school_id', $school->id)->where($key, 2)->count()) }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('school_id', $school->id)->where($key, 3)->count()) }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('school_id', $school->id)->where($key, 4)->count()) }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ en2bn(DB::table('student_healths')->where('year', en2bn($i))->where('school_id', $school->id)->where($key, 5)->count()) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endforeach
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
