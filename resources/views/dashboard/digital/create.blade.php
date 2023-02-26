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
                            <div><h4>কন্টেন্ট
                                তৈরি করুন</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>নিম্নোক্ত ফর্মে ডিজিটাল কন্টেন্ট
                                তৈরি করার জন্য তথ্য দিন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-3">
            <div class="animated fadeIn">
                {{-- form --}}
                <form action="{{route('digitalContent.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="msg">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row">

                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label" >*  নাম</label>
                                            <input type="text" id="name" placeholder="নাম" class="form-control" name="name" required >
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="description" class=" form-control-label" >* বর্ণনা</label>
                                            <textarea name="description" id="description" placeholder="বর্ণনা" required class="form-control " cols="5" rows="1"></textarea>
                                            @error('description')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>কনটেন্ট</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.bmp,.png,.jpeg,.pdf,.docs,.mp4,.avi,.mpeg4"  id="applicant_attachment_btn" name="applicant_attachment"  hidden/>
                                                <input type="text" id="applicant_attachment_choose" placeholder="কনটেন্ট" class="form-control "  disabled style="height:0px">
                                                <label for="applicant_attachment_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('applicant_attachment')
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

    const applicant_attachment_btn = document.getElementById('applicant_attachment_btn');
    const applicant_attachment_choose = document.getElementById('applicant_attachment_choose');
    applicant_attachment_btn.addEventListener('change', function(){
        var text = "";

            text += this.files[0].name + ",";

        applicant_attachment_choose.placeholder = text;
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
