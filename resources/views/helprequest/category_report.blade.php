@extends('layouts.default')
@section('css')
@endsection
@section('content')
<div class="main-content dashboard" id="mywraper" >
    <div class="container-fluid">
        <div class="app-page-title Mytilte">
            <div class="animated fadeIn delay-1s">
                <div class="page-title-wrapper container-fluid" id="showitem">
                    <div class="page-title-heading d-flex">
                        <div class="page-title-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div id="showitem">
                            <div><h4>রিপোর্ট সংক্রান্ত</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>রিপোর্ট ফিল্টার ও ডাউনলোড করুন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-3">
            <div class="animated fadeIn">
                {{-- form --}}
                <form action="{{url()->to('catwisereport')}}" method="POST">
                    @csrf
                    <div id="msg">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group ">
                                                    <label for="dateS" class=" form-control-label" >শুরু তারিখ</label>
                                                    <input type="date" id="dateS" class="form-control" name="dateS" >
                                                    @error('dateS')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group ">
                                                    <label for="dateE" class=" form-control-label" >শেষ তারিখ</label>
                                                    <input type="date" id="dateE" class="form-control" name="dateE" >
                                                    @error('dateE')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="application_type" class=" form-control-label">আবেদনের বিষয়</label>
                                                    <select class="form-control"  style="color:#312e2e"id="application_type" name="application_type" >
                                                        <option value="">আবেদনের বিষয় বাছাই করুন</option>
                                                        <option value="নারী উদ্যোক্তা">নারী উদ্যোক্তা</option>
                                                        
                                                        <option value="নারী নির্যাতন ও প্রতিরোধ">নারী নির্যাতন ও প্রতিরোধ</option>
                                                        <option value="শিক্ষা সহায়তা">শিক্ষা সহায়তা</option>
                                                        <option value="অন্যান্য">অন্যান্য</option>
                                                    </select>
                                                    @error('application_type')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="service_type" class=" form-control-label">সেবার ধরন</label>
                                                    <select class="form-control"  style="color:#312e2e"id="service_type" name="service_type" >
                                                            <option value="">সেবার ধরন বাছাই করুন</option>
                                                            <option value="আইনি সহায়তা">আইনি সহায়তা</option>
                                                            <option value="ভূমি সেবা">ভূমি সেবা</option>
                                                            <option value="আর্থিক সহায়তা">আর্থিক সহায়তা</option>
                                                            <option value="ঋণ সহায়তা">ঋণ সহায়তা</option>
                                                            <option value="প্রশিক্ষণ সংক্রান্ত সহায়তা">প্রশিক্ষণ সংক্রান্ত সহায়তা</option>
                                                            <option value="শিক্ষা সহায়তা">শিক্ষা সহায়তা</option>
                                                            <option value="আইন প্রয়োগকারী সংস্থার সহায়তা">আইন প্রয়োগকারী সংস্থার সহায়তা</option>
                                                            <option value="তথ্য ও প্রযুক্তিগত সেবা">তথ্য ও প্রযুক্তিগত সেবা</option>
                                                            <option value="উদ্যোক্তা সেবা">উদ্যোক্তা সেবা</option>
                                                            <option value="স্বাস্থ্যসেবা">স্বাস্থ্যসেবা</option>
                                                            <option value="ক্রীড়া, সংষ্কৃতি ও বিনোদন সংক্রান্ত সহায়তা">ক্রীড়া, সংষ্কৃতি ও বিনোদন সংক্রান্ত সহায়তা</option>
                                                            <option value="ডিজিটাল নিরাপত্তা সেবা">ডিজিটাল নিরাপত্তা সেবা</option>
                                                            <option value="অন্যান্য">অন্যান্য</option>
                                                    </select>
                                                    @error('service_type')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="row">
                                            
                                           <!-- <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="item_name" class=" form-control-label">সেবার নাম</label>
                                                    <select class="form-control"  style="color:#312e2e"id="item_name" name="item_name" >
                                                        <option value="">সেবা বাছাই করুন</option>
                                                        <option value="ড্রেস মেকিং">ড্রেস মেকিং</option>
                                                        <option value="ব্লক,বটিক">ব্লক,বটিক</option>
                                                        <option value="ফূড প্রসেসিং">ফূড প্রসেসিং</option>
                                                        <option value="বিউটি পার্লার">বিউটি পার্লার</option>
                                                        <option value="উদ্যোক্তা ঋন">উদ্যোক্তা ঋন</option>
                                                        <option value="শিক্ষা বৃত্তি">শিক্ষা বৃত্তি</option>
                                                        <option value="ভর্তি সংক্রান্ত">ভর্তি সংক্রান্ত</option>
                                                        <option value="টিউশন ফি">টিউশন ফি</option>
                                                        <option value="অন্যান্য">অন্যান্য</option>
                                                    </select>
                                                    @error('item_name')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>-->
                                            
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="user_id" class=" form-control-label"> ফোকাল পয়েন্ট</label>
                                                    <select class="form-control"  style="color:#312e2e"id="user_id" name="user_id" >
                                                        <option value="">ফোকাল পয়েন্ট বাছাই করুন</option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="mobile" class=" form-control-label" >মোবাইল</label>
                                                    <input type="number" id="mobile" placeholder="মোবাইল নম্বর" class="form-control" name="mobile" >
                                                    @error('mobile')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nid">ভোটার আইডি নম্বর (NID)</label>
                                                    <input type="text" class="form-control numeric" name="nid" id="nid"  placeholder="ভোটার আইডি নম্বর">
                                                    @error('nid')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="button theme_button">রিপোর্ট ডাউনলোড</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('vendors/chosen/chosen.jquery.min.js')}}"></script>

</script>

@if(session()->has('msg') && session()->get('msg') == 1)
<script>
    toastr.success('আপনার ডেটা সফলভাবে সংরক্ষণ করা হয়েছে', 'Success');
</script>
@endif
@if(session()->has('msg') && session()->get('msg') == 2)
<script>
toastr.error('আপনার ডেটা সফলভাবে সংরক্ষণ করা হয়নি  । আবার চেষ্ঠা করুন ', 'Error!!!');
</script>
@endif
@endsection