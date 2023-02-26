@extends('layouts.default')

@section('css')

@endsection

@section('content')
    
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $mamla->case_no }} নং মামলা তথ্য পরিবর্তন করুন</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
            <div class="card">
                    
                    <div class="card-body container">
                        <div style="border-bottom: 1px solid gray; margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>RM এর (১ম) অংশ</b></p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="row my-1">
                                <div class="col-md-4 ">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>মামলার নং</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{ $mamla->case_no }}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>উপজেলার নাম</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{ $mamla->upazila }}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>বিচারাধীন আদালতে নাম</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{ $mamla->first_pending_court_name }}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>সংযুক্ত ফাইল দেখা</strong></span>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <span style="color">
                                        <div class="container ">
                                            <b>:-</b>
                                            <?php 
                                               $case_file = (explode(",",$mamla->case_file));
                                               $case_file_location = (explode(",",$mamla->case_file_location));
                                               for($i=0 ; $i<count($case_file)-1;$i++){
                                                   $k = $i+1;
                                            ?>
                                                {{"(".$k.")"}}<a href=" {{ asset(  $case_file_location[$i] )}}" target="_blank">{{$case_file[$i]}}</a>,
                                            <?php
                                               }
                                            ?>
                                        </div>
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div style="border-bottom: 1px solid gray;margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>তফসিল</b></p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-3 ">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>মৌজা</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{ $mamla->mouza }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>শ্রেণি</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{ $mamla->classes }}</span>
                                    </div>
                                </div>
                            </li>
                            <p for="company" style="display: flex;justify-content: center;color: #2f2c2c;padding-bottom: 13px;border-bottom: 1px solid #8080808f;padding-top: 13px;"><b>খতিয়ান</b></p>
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>এসএ</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{ $mamla->ledger_sa }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row" >
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>বিআরএস</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{$mamla->ledger_brs}}</span>
                                    </div>
                                </div>
                            </li>
                            <p for="company" style="display: flex;justify-content: center;color: #2f2c2c;padding-bottom: 13px;border-bottom: 1px solid #8080808f;padding-top: 13px;"><b>দাগ</b></p>
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>এসএ</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{ $mamla->stains_sa }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row" >
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>বিআরএস</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{$mamla->stains_brs}}</span>
                                    </div>
                                </div>
                            </li>
                            <p for="company" style="display: flex;justify-content: center;color: #2f2c2c;padding-bottom: 13px;border-bottom: 1px solid #8080808f;padding-top: 13px;"><b>পরিমান</b></p>
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>একর</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{ $mamla->acres }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row" >
                                    <div class="col-md-3">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>শতাংশ</strong></span>
                                    </div>
                                    <div class="col-md-9">
                                        <span style="color"><b>:-</b>{{$mamla->percent}}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="row my-1 mt-3">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>ACL অফিস (সরকারি স্বর্থ আছে কিনা ?)</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{$mamla->acl_gov_interest}}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>সংযুক্ত ফাইল দেখা</strong></span>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <span style="color">
                                        <div class="container ">
                                            <b>:-</b>
                                            <?php 
                                               $acl_file = (explode(",",$mamla->acl_file));
                                               $acl_file_location = (explode(",",$mamla->acl_file_location));
                                               for($i=0 ; $i<count($acl_file)-1;$i++){
                                                   $k = $i+1;
                                            ?>
                                                {{"(".$k.")"}}<a href=" {{ asset(  $acl_file_location[$i] )}}" target="_blank">{{$acl_file[$i]}}</a>,
                                            <?php
                                               }
                                            ?>
                                        </div>
                                    </span>
                                </div>
                                
                            </li>
                        </ul>

                        <div style="border-bottom: 1px solid gray;margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>RM এর (২য়) অংশ</b></p>
                        </div>
                        <ul class="list-unstyled">
                           
                            <li class="row my-1 mt-3">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>DC অফিস (বর্ণনা প্রেরণ করা হয়েছে কিনা ?)</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{$mamla->description_dc}}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>সংযুক্ত ফাইল দেখা</strong></span>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <span style="color">
                                        <div class="container ">
                                            <b>:-</b>
                                            <?php 
                                               $dc_description_file = (explode(",",$mamla->dc_description_file));
                                               $dc_description_file_location = (explode(",",$mamla->dc_description_file_location));
                                               for($i=0 ; $i<count($dc_description_file)-1;$i++){
                                                   $k = $i+1;
                                            ?>
                                                {{"(".$k.")"}}<a href=" {{ asset(  $dc_description_file_location[$i] )}}" target="_blank">{{$dc_description_file[$i]}}</a>,
                                            <?php
                                               }
                                            ?>
                                        </div>
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div style="border-bottom: 1px solid gray;margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>জিপি বা অতিরিক্ত জিপির (১ম) অংশ</b></p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-6 ">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>পরবর্তী তারিখ</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->first_next_date }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>সরকারি স্বর্থ হয়েছে কিনা ?</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->first_gov_interestY }}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="row my-1 mt-3">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>ফলাফল</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{$mamla->first_result}}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>সংযুক্ত ফাইল দেখা</strong></span>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <span style="color">
                                        <div class="container ">
                                            <b>:-</b>
                                            <?php 
                                               $first_result_file = (explode(",",$mamla->first_result_file));
                                               $first_result_file_location = (explode(",",$mamla->first_result_file_location));
                                               for($i=0 ; $i<count($first_result_file)-1;$i++){
                                                   $k = $i+1;
                                            ?>
                                                {{"(".$k.")"}}<a href=" {{ asset(  $first_result_file_location[$i] )}}" target="_blank">{{$first_result_file[$i]}}</a>,
                                            <?php
                                               }
                                            ?>
                                        </div>
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div style="border-bottom: 1px solid gray;margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>RM এর (২য়) অংশ</b></p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-6 ">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>আপিল হয়েছে কিনা ?</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->appeal }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>বিচারাধীন আদালতে নাম</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->secound_pending_court_name }}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div style="border-bottom: 1px solid gray;margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>জিপি বা অতিরিক্ত জিপির (২য়) অংশ</b></p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-6 ">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>পরবর্তী তারিখ</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->secound_next_date }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>সরকারি স্বর্থ হয়েছে কিনা ?</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->secound_gov_interest }}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="row my-1 mt-3">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>ফলাফল</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{$mamla->secound_result}}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>সংযুক্ত ফাইল দেখা</strong></span>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <span style="color">
                                        <div class="container ">
                                            <b>:-</b>
                                            <?php 
                                               $secound_result_file = (explode(",",$mamla->secound_result_file));
                                               $secound_result_file_location = (explode(",",$mamla->secound_result_file_location));
                                               for($i=0 ; $i<count($secound_result_file)-1;$i++){
                                                   $k = $i+1;
                                            ?>
                                                {{"(".$k.")"}}<a href=" {{ asset(  $secound_result_file_location[$i] )}}" target="_blank">{{$secound_result_file[$i]}}</a>,
                                            <?php
                                               }
                                            ?>
                                        </div>
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div style="border-bottom: 1px solid gray;margin-bottom: 10px;background: #6c757d1f;">
                            <p style="color: black;font-size: large;padding: 13px 0px 0px 8px;"><b>RM এর (৩য়) অংশ</b></p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-6 ">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>বিভিশন হয়েছে কিনা ?</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->revision }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>দায়িত্বপ্রাপ্ত অ্যাডভোকেটের নাম</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->advocate_name }}</span>
                                    </div>
                                </div>
                            </li>

                            <li class="row my-1">
                                <div class="col-md-6 row" style="border-right: 1px solid gray;margin-right: 1px;">
                                    <div class="col-md-6 ">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>পরবর্তী তারিখ</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->third_next_date }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <span style="padding: 5px 9px 5px 2px;"><strong>সরকারি স্বর্থ হয়েছে কিনা ?</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color"><b>:-</b>{{ $mamla->rm_gov_interest }}</span>
                                    </div>
                                </div>
                            </li>
                          
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>ফলাফল</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{ $mamla->third_result }}</span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>সংযুক্ত ফাইল দেখা</strong></span>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <span style="color">
                                        <div class="container ">
                                            <b>:-</b>
                                            <?php 
                                               $third_result_file = (explode(",",$mamla->third_result_file));
                                               $third_result_file_location = (explode(",",$mamla->third_result_file_location));
                                               for($i=0 ; $i<count($third_result_file)-1;$i++){
                                                   $k = $i+1;
                                            ?>
                                                {{"(".$k.")"}}<a href=" {{ asset(  $third_result_file_location[$i] )}}" target="_blank">{{$third_result_file[$i]}}</a>,
                                            <?php
                                               }
                                            ?>
                                        </div>
                                    </span>
                                </div>
                            </li>
                            <li class="row my-1">
                                <div class="col-md-4">
                                    <span style="padding: 5px 9px 5px 2px;"><strong>মন্তব্য</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span style="color"><b>:-</b>{{ $mamla->comment }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')


@endsection
