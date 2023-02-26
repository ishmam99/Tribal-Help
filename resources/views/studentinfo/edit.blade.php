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
                            <div><h4>শিক্ষার্থী তথ্য পরিবর্তন করুন</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>নিম্নোক্ত ফর্মে শিক্ষার্থীর তথ্য দিন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-3">
            <div class="animated fadeIn">
                {{-- form --}}
                <form action="{{url()->to('students/'.$cur_std->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div id="msg">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row">
                                   
                                    @foreach ($std_prop_array as $item_prop)
                                    @if($item_prop->inputType>=0&&$item_prop->inputType<=3)
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="{{$item_prop->sql}}" class=" form-control-label" > @if($item_prop->isRequired) {{"*"}} @endif {{$item_prop->name}}</label>
                                            <input type="{{$input_type_array[$item_prop->inputType]}}" id="{{$item_prop->sql}}" placeholder="{{$item_prop->name}}" value="<?php echo $cur_std->{$item_prop->sql}; ?>" class="form-control" name="{{$item_prop->sql}}" @if($item_prop->isRequired) {{"required"}} @endif >
                                            @error('{{$item_prop->sql}}')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @elseif($item_prop->inputType==4)
                                     <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="{{$item_prop->sql}}" class=" form-control-label" > @if($item_prop->isRequired) {{"*"}} @endif {{$item_prop->name}}</label>
                                            <textarea  id="{{$item_prop->sql}}" placeholder="{{$item_prop->name}}" class="form-control" name="{{$item_prop->sql}}"  cols="5" rows="1" @if($item_prop->isRequired) {{"required"}} @endif ><?php echo $cur_std->{$item_prop->sql}; ?></textarea>
                                            @error('{{$item_prop->sql}}')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @elseif($item_prop->inputType==5)
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="{{$item_prop->sql}}" class=" form-control-label" > @if($item_prop->isRequired) {{"*"}} @endif {{$item_prop->name}}</label>
                                            <select  id="{{$item_prop->sql}}"  style="color:#312e2e" placeholder="{{$item_prop->name}}" class="form-control" name="{{$item_prop->sql}}"value="<?php echo $cur_std->{$item_prop->sql}; ?>"  @if($item_prop->isRequired) {{"required"}} @endif >
                                                <?php 
                                                echo '<option value="'.$cur_std->{$item_prop->sql}.'">'.$cur_std->{$item_prop->sql}.'</option>';
                                                echo $optionArray[$item_prop->sql]; ?>
                                            </select>
                                            @error('{{$item_prop->sql}}')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    @elseif($item_prop->inputType==6)
                                     <div class="col-md-12 col-12">
                                         <div class="form-group">
                                                <label>@if($item_prop->isRequired) {{"*"}} @endif {{$item_prop->name}}</label>
                                                <div class="input-group ">
                                                    <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="{{$item_prop->sql}}" name="{{$item_prop->sql}}"   @if($item_prop->isRequired) {{"required"}} @endif hidden/>                           
                                                    <input type="text" id="{{$item_prop->sql}}_choose" value="{{$item_prop->name}} বাছাই করুন" class="form-control rounded-0" style="height: 0;" disabled>
                                                    <label for="{{$item_prop->sql}}" class="btn theme_button rounded-0 py-2" style="height:36px">{{$item_prop->name}} বাছাই করুন</label>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                    @endforeach

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

        $("#upazila_name").on('change',function(){
            var upazila = this.value;
            $.ajax({
                type: "GET",
                url: "/api/schools/"+upazila,
                dataType: 'json',
                success: function(data){
                    var schools = data.schools;
                    $('#school_id').empty();
                    $('#school_id').append('<option value="">প্রতিষ্ঠান বাছাই করুন</option>');
                    for(var i=0; i < schools.length; i++){
                        $('#school_id').append('<option value="'+schools[i].id+'">'+schools[i].name+'</option>');
                    }
                }
            });
        });


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

    @foreach ($std_prop_array as $item_prop)
    @if($item_prop->inputType==6)
    {
        const selected_image = document.getElementById('{{$item_prop->sql}}');
        const selected_image_choose = document.getElementById('{{$item_prop->sql}}_choose');
        selected_image.addEventListener('change', function(){
        var text = "";
        for (var i = 0; i < selected_image.files.length; i++){
        text += this.files[i].name ;
        }
        selected_image_choose.value = text;
        });
    }
    @endif
    @endforeach

        

</script>

<script>
 

    jQuery(document).ready(function() {
        
 
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

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
