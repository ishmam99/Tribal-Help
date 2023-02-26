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
                            <div><h4>শিক্ষার্থী স্বাস্থ্য তথ্য এন্ট্রি</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>নিম্নোক্ত ফর্মে শিক্ষার্থীদের স্বাস্থ্য তথ্য দিন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
                {{-- form --}}
                <form action="{{url()->to('studenthealth')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="msg">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="year" class=" form-control-label" >* ক্যালেন্ডার বর্ষ</label>
                                            <select  id="year"  style="color:#312e2e" class="form-control" name="year" required>
                                                <?php echo $optionArray["year"]; ?>
                                            </select>
                                            @error('year')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if(!$schooladmin)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="upazila_name" class=" form-control-label" >* উপজেলা</label>
                                            <select  id="upazila_name"  style="color:#312e2e" class="form-control" name="upazila_name" required>
                                                <?php echo $optionArray["upazila_name"]; ?>
                                            </select>
                                            @error('upazila_name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="school_id" class=" form-control-label" >* প্রতিষ্ঠানের নাম</label>
                                            <select  id="school_id"  style="color:#312e2e" class="form-control" name="school_id" required>
                                                <?php echo $optionArray["school_id"]; ?>
                                            </select>
                                            @error('school_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @else
                                        <input type="hidden"  value="{{$schoolinfo->upazila_name}}" name="upazila_name" id="upazila_name" />
                                        <input type="hidden"  value="{{$schoolinfo->id}}" name="school_id" id="school_id" />
                                    @endif
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="session" class=" form-control-label" >* সেশন</label>
                                            <select  id="session"  style="color:#312e2e" class="form-control" name="session" required>
                                                <?php echo $optionArray["session"]; ?>
                                            </select>
                                            @error('session')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="classname" class=" form-control-label" >* শ্রেণী</label>
                                            <select  id="classname"  style="color:#312e2e" class="form-control" name="classname" required>
                                                <?php echo $optionArray["classname"]; ?>
                                            </select>
                                            @error('classname')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="section" class=" form-control-label" >* শাখা</label>
                                            <select  id="section"  style="color:#312e2e" class="form-control" name="section" required>
                                                <?php echo $optionArray["section"]; ?>
                                            </select>
                                            @error('section')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

        <div id="data-table" class="col-md-12 col-12" >
         
                <div class="card-header justify-content-center">
                    <h5 class="text-white">শিক্ষার্থী তালিকা</h5>
                </div>
                <div id="mytable" name="mytable" class="card-body table-responsive">
                    
                </div>
                
        </div>
                        

                                </div>
                               
                            </div>
                        </div>
                    </div>
                </form>
            
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

      $("#section").on('change',function(){
                var classname = $('#classname').val();
                var section = $('#section').val();
                var school_id = $('#school_id').val();
                var upazila_name = $('#upazila_name').val();
                var session = $('#session').val();
                var year = $('#year').val();
                $.ajax({
                    type: "GET",
                    url: "/api/students/"+year+"/"+upazila_name+"/"+school_id+"/"+classname+"/"+section+"/"+session,
                    dataType: 'json',
                    success: function(data){
                        var tableText = data.tableText;
                        $('#mytable').empty();
                        $('#mytable').append(tableText);
                        
                    }
                });
            });
      $("#classname").on('change',function(){
                var classname = $('#classname').val();
                var section = $('#section').val();
                var school_id = $('#school_id').val();
                var upazila_name = $('#upazila_name').val();
                var session = $('#session').val();
                var year = $('#year').val();
                $.ajax({
                    type: "GET",
                    url: "/api/students/"+year+"/"+upazila_name+"/"+school_id+"/"+classname+"/"+section+"/"+session,
                    dataType: 'json',
                    success: function(data){
                        var tableText = data.tableText;
                        $('#mytable').empty();
                        $('#mytable').append(tableText);
                        
                    }
                });
            });
       $("#year").on('change',function(){
                var classname = $('#classname').val();
                var section = $('#section').val();
                var school_id = $('#school_id').val();
                var upazila_name = $('#upazila_name').val();
                var session = $('#session').val();
                var year = $('#year').val();
                $.ajax({
                    type: "GET",
                    url: "/api/students/"+year+"/"+upazila_name+"/"+school_id+"/"+classname+"/"+section+"/"+session,
                    dataType: 'json',
                    success: function(data){
                        var tableText = data.tableText;
                        $('#mytable').empty();
                        $('#mytable').append(tableText);
                        
                    }
                });
            });
       $("#session").on('change',function(){
                var classname = $('#classname').val();
                var section = $('#section').val();
                var school_id = $('#school_id').val();
                var upazila_name = $('#upazila_name').val();
                var session = $('#session').val();
                var year = $('#year').val();
                $.ajax({
                    type: "GET",
                    url: "/api/students/"+year+"/"+upazila_name+"/"+school_id+"/"+classname+"/"+section+"/"+session,
                    dataType: 'json',
                    success: function(data){
                        var tableText = data.tableText;
                        $('#mytable').empty();
                        $('#mytable').append(tableText);
                        
                    }
                });
            });

        
       
</script>
<script src="{{asset('vendors/chosen/chosen.jquery.min.js')}}"></script>
<script>

    @foreach ($stdhealth_prop_array as $item_prop)
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
