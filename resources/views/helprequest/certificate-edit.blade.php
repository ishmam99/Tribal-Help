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
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div id="showitem">
                            <div><h4>আবেদন করুন</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>নিম্নোক্ত ফর্মে আবেদন করার জন্য তথ্য দিন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-3">
            <div class="animated fadeIn">
                {{-- form --}}
                <form action="{{route('certificate.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="msg">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="application_date" class=" form-control-label" >* আবেদনের তারিখ</label>
                                                    <input type="date" id="application_date" class="form-control" value="{{$daydate}}" disabled="disabled" name="application_date" required>
                                                    @error('application_date')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="applicant_name" class=" form-control-label" >* আবেদনকারীর নাম</label>
                                            <input type="text" id="applicant_name" placeholder="নাম" class="form-control" name="applicant_name" required >
                                            @error('applicant_name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                      <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="father_name" class=" form-control-label" >* পিতার/স্বামীর নাম</label>
                                            <input type="text" id="father_name" placeholder="পিতা/স্বামীর নাম" class="form-control" name="father_name" required >
                                            @error('father_name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mother_name" class=" form-control-label" >মাতার নাম</label>
                                            <input type="text" id="mother_name" placeholder="মাতার নাম" class="form-control" name="mother_name" >
                                            @error('father_name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mobile" class=" form-control-label" >* মোবাইল</label>
                                            <input type="text" id="mobile" placeholder="মোবাইল নম্বর" class="form-control" name="mobile" required>
                                            @error('mobile')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-7 col-12">
                                        <div class="form-group">
                                            <label for="nid">* ভোটার আইডি নম্বর (NID)</label>
                                            <input type="text" class="form-control numeric" name="nid" id="nid" required placeholder="ভোটার আইডি নম্বর">
                                            @error('nid')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
<br>
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="village" class=" form-control-label" >* গ্রাম</label>
                                            <input name="village" id="village" placeholder="গ্রাম" required class="form-control " cols="5" >
                                            @error('village')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="post_office" class=" form-control-label" >* ডাকঘর</label>
                                            <input name="post_office" id="post_office" placeholder="ডাকঘর" required class="form-control " cols="5" >
                                            @error('post_office')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="union" class=" form-control-label" >* ইউনিয়ন</label>
                                            <input name="union" id="union" placeholder="ইউনিয়ন" required class="form-control " cols="5" >
                                            @error('union')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="upazila" class=" form-control-label">* উপজেলা</label>
                                            <select class="form-control"  style="color:#312e2e"id="upazila" name="upazila" required>
                                                <option value="">উপজেলা বাছাই করুন</option>
                                                <option value="নেত্রকোনা সদর">নেত্রকোনা সদর</option>
                                                <option value="কলমাকান্দা">কলমাকান্দা</option>
                                                <option value="বারহাট্টা">বারহাট্টা</option>
                                                <option value="আটপাড়া">আটপাড়া</option>
                                                <option value="মোহনগঞ্জ">মোহনগঞ্জ</option>
                                                <option value="কেন্দুয়া">কেন্দুয়া</option>
                                                <option value="খালিয়াজুরী">খালিয়াজুরী</option>
                                                <option value="মদন">মদন</option>
                                                <option value="পূর্বধলা">পূর্বধলা</option>
                                                <option value="দুর্গাপুর">দুর্গাপুর</option>
                                            </select>
                                            @error('upazila')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="zila" class=" form-control-label" >* জেলা</label>
                                            <input name="zila" id="zila" placeholder="জেলা" required class="form-control " cols="5" >
                                            @error('zila')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="application_subject" class=" form-control-label">* আবেদনের বিষয়</label>
                                            <input type="text" placeholder="আবেদনের বিষয়"  class="form-control"  id="application_subject" name="application_subject" required>

                                            @error('application_subject')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="subject_id" class=" form-control-label">* আবেদনের ধরন</label>
                                            <select class="form-control"  style="color:#312e2e"id="subject_id" name="subject_id" required>
                                                @foreach ($subjects as $subject)


                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                             @endforeach

                                            </select>
                                            @error('subject_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="focal_point_id" class=" form-control-label">* ফোকাল পয়েন্ট</label>
                                            <select class="form-control"  style="color:#312e2e"id="focal_point_id" name="user_id" required>
                                                @foreach ($focals as $focal)


                                                <option value="{{$focal->id}}">{{$focal->position}}</option>
                                             @endforeach

                                            </select>
                                            @error('user_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>ছবি সংযুক্ত করুন</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.png,.jpeg"  id="applicant_image_btn" name="applicant_image"  hidden/>
                                                <input type="text" id="applicant_image_choose" placeholder="ছবি সংযুক্ত করুন" class="form-control "  disabled style="height:0px">
                                                <label for="applicant_image_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('applicant_image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>নাগরিকত্ব সনদ সংযুক্ত করুন</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.png,.jpeg"  id="applicant_chairman_certificate_btn" name="applicant_chairman_certificate"  hidden/>
                                                <input type="text" id="applicant_chairman_certificate_choose" placeholder="নাগরিকত্ব সনদ সংযুক্ত করুন" class="form-control "  disabled style="height:0px">
                                                <label for="applicant_chairman_certificate_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('applicant_chairman_certificate')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>প্রত্যয়ন পত্র সংযুক্ত করুন</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.png,.jpeg"  id="applicant_certificate_btn" name="applicant_certificate"  hidden/>
                                                <input type="text" id="applicant_certificate_choose" placeholder="প্রত্যয়ন পত্র সংযুক্ত করুন" class="form-control "  disabled style="height:0px">
                                                <label for="applicant_certificate_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('applicant_certificate')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>প্রশংসাপত্র সংযুক্ত করুন</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.png,.jpeg"  id="applicant_testimonial_btn" name="applicant_testimonial"  hidden/>
                                                <input type="text" id="applicant_testimonial_choose" placeholder="প্রশংসাপত্র সংযুক্ত করুন" class="form-control "  disabled style="height:0px">
                                                <label for="applicant_testimonial_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('applicant_testimonial')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>এন আই ডি সংযুক্ত করুন</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.png,.jpeg"  id="applicant_nid_btn" name="applicant_nid"  hidden/>
                                                <input type="text" id="applicant_nid_choose" placeholder="এন আই ডি সংযুক্ত করুন" class="form-control "  disabled style="height:0px">
                                                <label for="applicant_nid_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('applicant_nid')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="applicant_comment" class=" form-control-label" >মন্তব্য</label>
                                            <textarea name="applicant_comment" placeholder="আপনার মন্তব্য" id="applicant_comment" class="form-control " cols="5" rows="1"></textarea>
                                            @error('applicant_comment')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>-->
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="button theme_button">সাবমিট করুন</button>
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

<script >
  /*    document.getElementById("application_type").onchange = function() {
    if(this.value == "নারী উদ্যোক্তা"){
     document.getElementById("service_type").innerHTML = " <option value=''>সেবার ধরন বাছাই করুন</option> <option value='পরামর্শ ও প্রশিক্ষণ সহায়তা'>পরামর্শ ও প্রশিক্ষণ সহায়তা</option>  <option value='আর্থিক সহায়তা'>আর্থিক সহায়তা</option><option value='ঋণ সহায়তা'>ঋণ সহায়তা</option><option value='উপকরণ সহায়তা'>উপকরণ সহায়তা</option><option value='অন্যান্য'>অন্যান্য</option>";
       document.getElementById("item_name").innerHTML = " <option value=''>সেবা বাছাই করুন</option>  <option value='ড্রেস মেকিং'>ড্রেস মেকিং</option><option value='ব্লক,বটিক'>ব্লক,বটিক</option><option value='ফূড প্রসেসিং'>ফূড প্রসেসিং</option><option value='বিউটি পার্লার'>বিউটি পার্লার</option><option value='উদ্যোক্তা ঋন'>উদ্যোক্তা ঋন</option><option value='অন্যান্য'>অন্যান্য</option>";
    }
    else if(this.value == "নারী নির্যাতন ও প্রতিরোধ"){
     document.getElementById("service_type").innerHTML = "<option value=''>সেবার ধরন বাছাই করুন</option><option value='পরামর্শ ও আইনই সহায়তা'>পরামর্শ ও আইনই সহায়তা</option><option value='অন্যান্য'>অন্যান্য</option>";
     document.getElementById("item_name").innerHTML = " <option value=''>সেবা বাছাই করুন</option> <option value='যৌতুক নিরোধ'>যৌতুক নিরোধ</option><option value='পারিবারিক কলহ'>পারিবারিক কলহ</option><option value='ভরন-পোষন'>ভরন-পোষন</option>    <option value='পিতা মাতার সম্পত্তিতে নারীর অধিকার'>পিতা মাতার সম্পত্তিতে নারীর অধিকার</option><option value='হয়রানি রোধ'>হয়রানি রোধ</option><option value='ইভটিজিং/যৌনহয়রানি'>ইভটিজিং/যৌনহয়রানি</option><option value='হুমকি'>হুমকি</option> <option value='আবাসন'>আবাসন</option>    <option value='আইন সহযোগীতা'>আইন সহযোগীতা</option><option value='বাল্যবিবাহ নিরোধ'>বাল্যবিবাহ নিরোধ</option><option value='অন্যান্য'>অন্যান্য</option>";
    }
    else if(this.value == "শিক্ষা সহায়তা"){
     document.getElementById("service_type").innerHTML = " <option value=''>সেবার ধরন বাছাই করুন</option> <option value='পরামর্শ ও প্রশিক্ষণ সহায়তা'>পরামর্শ ও প্রশিক্ষণ সহায়তা</option>            <option value='আর্থিক সহায়তা'>আর্থিক সহায়তা</option><option value='উপকরণ সহায়তা'>উপকরণ সহায়তা</option><option value='অন্যান্য'>অন্যান্য</option>";
    document.getElementById("item_name").innerHTML = " <option value=''>সেবা বাছাই করুন</option><option value='শিক্ষা বৃত্তি'>শিক্ষা বৃত্তি</option>        <option value='ভর্তি সংক্রান্ত'>ভর্তি সংক্রান্ত</option>            <option value='টিউশন ফি'>টিউশন ফি</option>   <option value='শিক্ষা উপকরণ'>শিক্ষা উপকরণ</option><option value='আর্থিক সহায়তা'>আর্থিক সহায়তা</option><option value='অন্যান্য'>অন্যান্য</option>";
    }
 };*/
</script>
<script src="{{asset('vendors/chosen/chosen.jquery.min.js')}}"></script>

<script>

    jQuery(document).ready(function() {


        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });

    const applicant_image_btn = document.getElementById('applicant_image_btn');
    const applicant_image_choose = document.getElementById('applicant_image_choose');
    applicant_image_btn.addEventListener('change', function(){
        let text = ""
            text += this.files[0].name ;
        applicant_image_choose.placeholder = text;
        });

    const applicant_chairman_certificate_btn = document.getElementById('applicant_chairman_certificate_btn');
    const applicant_chairman_certificate_choose = document.getElementById('applicant_chairman_certificate_choose');
    applicant_chairman_certificate_btn.addEventListener('change', function(){
        let text = ""
            text += this.files[0].name ;
        applicant_chairman_certificate_choose.placeholder = text;
        });
    const applicant_certificate_btn = document.getElementById('applicant_certificate_btn');
    const applicant_certificate_choose = document.getElementById('applicant_certificate_choose');
    applicant_certificate_btn.addEventListener('change', function(){
        let text = ""
            text += this.files[0].name ;
        applicant_certificate_choose.placeholder = text;
        });
    const applicant_testimonial_btn = document.getElementById('applicant_testimonial_btn');
    const applicant_testimonial_choose = document.getElementById('applicant_testimonial_choose');
    applicant_testimonial_btn.addEventListener('change', function(){
        let text = ""
            text += this.files[0].name ;
        applicant_testimonial_choose.placeholder = text;
        });
    const applicant_nid_btn = document.getElementById('applicant_nid_btn');
    const applicant_nid_choose = document.getElementById('applicant_nid_choose');
    applicant_nid_btn.addEventListener('change', function(){
        let text = ""
            text += this.files[0].name ;
        applicant_nid_choose.placeholder = text;
        });


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
