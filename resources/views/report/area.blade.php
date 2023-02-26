@extends('layouts.default')
@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">অঞ্চল ভিত্তিক ঝুঁকিপূর্ণ স্বাস্থ্য সমস্যা সনাক্তকরণ
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="card col-12">
                <div class="p-5 m-5 text-center">
                    <div class="col-8 mb-5">
                        <form action="{{ route('areaDanger.report') }}" method="post">
                            @csrf
                               <h4 class="p-3">সাল নির্বাচন করুন</h4>
                            <div class="col-10 d-flex align-items-center justify-content-center">
          
          <input type="text" required class="form-control" name="year" autocomplete="off" placeholder="ক্যালেন্ডার বর্ষ" id="datepicker" />
     
          </div>
                            <h4 class="p-3">উপজেলা নির্বাচন করুন</h4>
                            <select name="upazila" class="form-control" id="upazila" required>
                                <option value="" selected>--উপজেলা নির্বাচন করুন--</option>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->name }}">{{ $upazila->name }}</option>
                                @endforeach
                            </select>
                            <div class="col-3 float-right p-2 m-4">
                                <button class="btn btn-primary">রিপোর্ট দেখুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@section('scripts')
  <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
   <script>
            $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true //to close picker once year is selected
            });
  </script>
  @stop
@stop
