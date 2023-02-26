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
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="card col-12">
                <div class="p-5 m-5 text-center">
                    <div class="col-8 mb-5">
                        <form action="{{ route('school.report') }}" method="post">
                            @csrf
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

@stop
