@extends('layouts.default')

{{-- @section('title', 'Dashboard') --}}
@section('csses')
<style type="text/css">
   @media print
{
  table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
  thead { display:table-header-group }
  tfoot { display:table-footer-group }
}
</style>
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ঝুঁকিপূর্ণ শিক্ষার্থীদের শনাক্তকরণ রিপোর্ট</h1>
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
                        <h4>ঝুঁকিপূর্ণ শিক্ষার্থীদের শনাক্তকরণ রিপোর্ট</h4>
                    </div>
                    <div class="col-2"> <img src="{{ asset('svg/bgvv.png') }}" alt=""
                            style="height: 120px;width:130px;padding-left:15px">
                        <p style="width:110% ">তারিখঃ{{ en2bn(Carbon\Carbon::now()->format('d.m.Y')) }}</p>
                    </div>
                    <div  style="margin-top:100px;margin-bottom:30px"><h5>ক্যাটাগরিঃ {{$disease}}</h5>
                        <h6>সালঃ {{en2bn(now()->format('Y'))}} </h6>
                    </div>
                    <div class="col-12 row" >

                       
                     
                                  
                                        <table class="table table-bordered" style="width: 100%">
                                            <thead>
                                                <th class="text-center">আইডি
                                                </th>
                                                <th class="text-center">নাম</th>
                                                <th class="text-center">বিদ্যালয়</th>
                                                <th class="text-center">শ্রেনী</th>
                                                <th class="text-center">রোল</th>
                                            
                                                
                                                <th class="text-center">মোবাইল</th>
                                                
                                                
                                            </thead>
                                            <tbody>
                                                @foreach ( $students as $student )
                                                    
                                             
                                                    <tr>
                                                        <td class="text-center">{{ en2bn($student->id) }} </td>

                                                        <td class="text-center">
                                                           {{$student->bangla_name}}
                                                        </td>
                                                        <td class="text-center">
                                                           {{$student->name}}
                                                        </td>
                                                        <td class="text-center">
                                                           {{$student->classname}}
                                                        </td>
                                                        <td class="text-center">
                                                           {{$student->class_roll}}
                                                        </td>
                                                        <td class="text-center">
                                                           {{$student->mobile}}
                                                        </td>
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                   

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
