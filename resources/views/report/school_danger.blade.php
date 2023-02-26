@extends('layouts.default')
@section('title', 'Dashboard')

@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">বিদ্যালয় ভিত্তিক ঝুঁকিপূর্ণ স্বাস্থ্য সমস্যা সনাক্তকরণ
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
                        <form action="{{ route('schoolDanger.report') }}" method="post">
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
                            <h4 class="p-3"> বিদ্যালয় নির্বাচল করুন </h4>
                            <select name="school" class="form-control" id="school">
                                <option value="">--বিদ্যালয় নির্বাচন করুন--</option>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="upazila"]').on('change', function() {
                var upazila_name = $(this).val();
                console.log('ok');
                if (upazila_name) {
                    $.ajax({
                        url: "{{ url('school/') }}/" + upazila_name,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            var d = $('select[name="school"]').empty();
                            $('select[name="school"]').append('<option value="">' +
                                'শিক্ষা প্রতিষ্ঠান ' + '</option>');
                            $.each(data, function(key, value) {
                                $('select[name="school"]').append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
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
