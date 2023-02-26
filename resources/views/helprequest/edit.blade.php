@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('vendors/chosen/chosen.min.css')}}">

@endsection

@section('content')
<div class="main-content dashboard" id="mywraper" >
    <div class="container-fluid">
        <div class="app-page-title Mytilte" style="margin-top: 6px;">
            <div class="animated fadeIn delay-1s">
                <div class="page-title-wrapper container-fluid" id="showitem">
                    <div class="page-title-heading d-flex">
                        <div class="page-title-icon ">
                            <i class="ik ik-plus-circle icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div id="showitem">
                            <div><h4>তথ্য পরিবর্তন করুন</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div >
            @if($application->status == 2)
            <button class="btn btn-success float-right mb-3 mr-3" > সম্পন্ন </button>
            @elseif ($application->statuses->count() == $application->statuses->where('status',1)->count())
                <form action="{{route('application.update',$application->id)}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="status" value="2">
                                <button class="btn btn-primary float-right mb-3"> সম্পন্ন করুন </button>
                        </form>
            @else
                           <button class="btn btn-secondary float-right mb-3" > অপেক্ষমান </button>
            @endif

        </div>
    <div class="card">
         <table class="table table-striped table-bordered display" >
                <thead>
                    <tr>
                        <th>বর্তমান ফোকাল পয়েন্ট </th>
                        <th>পরবর্তী ফোকাল পয়েন্ট</th>
                        <th>স্ট্যাটাস</th>
                        <th>সর্বশেষ আপডেট তারিখ</th>
                        <th>হালনাগাদ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($application->statuses as $item)


                    <tr>
                        <td>{{$item->parent->position}}</td>
                        <td>{{$item->child->position}}</td>
                        <td >@if($item->status == 0 )
                            <span class="text-warning">অপেক্ষমাণ</span>
                             @elseif( $item->status ==1)
                            <span class="text-success">সম্পন্ন</span>
                             @elseif($item->status ==2)
                            <span class="text-danger">পুনঃ প্রেরন</span>



                        @endif</td>
                        <td>{{Carbon\Carbon::parse($item->updated_at)->format('d/m/y')}}</td>
                        <td>@if($item->child_id == auth()->id())
                            <div class="d-flex">
                            <form  action="{{route('application.statusUpdate',$item->id)}}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn btn-primary m-1" {{$item->status == 1 ?'disabled':''}}> সম্পন্ন করুন </button>
                                    </form>
                                    @if ($item->parent_id == auth()->id())


                            <form  action="{{route('application.statusUpdate',$item->id)}}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="status" value="2">
                                        <button class="btn btn-danger m-1"> পুনঃ প্রেরণ করুন </button>
                                    </form> @endif
                                    </div>
                            @else
                            প্রযোজ্য নয়
                            @endif
                        </td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
    </div>
        <div class="card my-2">
            <div class="card-header">
                <h6>আবেদন প্রেরন করুন</h6>
            </div>
            {{-- form --}}

            <form action="{{route('application.update',$application->id)}}" method="POST" enctype="multipart/form-data">

                @csrf


                        <div class="card-body card-block">
                            <!-- DC first part -->
                            <div class="row" style="border: 2px solid #5ed84fab;padding: 12px 3px;border-radius: 8px;margin: 5px 0;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dept_id" class=" form-control-label">ফোকাল পয়েন্ট বাছাই করুন <span class="text-danger">*</span></label>
                                        <select class="form-control" required  style="color:#312e2e"id="user_id" name="user_id">
                                            @foreach (App\Models\User::where('id','!=',auth()->id())->where('usertype',1)->get() as $user)
                                                <option value="{{$user->id}}" class="text-center">{{$user->position}} ({{$user->name}})</option>
                                            @endforeach





                                        </select>
                                        @error('user_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deadline" class=" form-control-label" >ডেটলাইন</label>
                                        <input type="date" id="deadline" class="form-control" name="deadline" value="" >
                                        @error('deadline')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="section_id" class=" form-control-label">কমেন্ট</label>
                                         <textarea name="details" id="details" class="form-control form-control-solid @error('details') is-invalid @enderror">{{ old('details') }}</textarea>
                                        @error('section_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-8">
                                <div class="form-group mx-3">
                                <button type="submit" class="button btn btn-success btn-md btn-block" style="margin-top: 60px;">সাবমিট করুন</button>
                                </div>
                            </div>
                        </div>


            </form>
                                {{-- <div class="col-12 row">
                                    <div class="form-group col-3">
                                        <label for="date" class=" form-control-label" >তারিখ</label>
                                        <input type="date" id="date" class="form-control" name="date" value="" required>
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class=" form-control-label" >শিরোনাম</label>
                                        <input type="text" id="title" class="form-control" name="title"
                                        value="" required>
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ফাইল সংযুক্তকরণ</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" accept=".jpg,.bmp,.png,.jpeg,.pdf,.docs"  id="file_attach_dc_btn" name="file_attach_dc[]" multiple hidden/>
                                            <input type="text" id="file_attach_dc_choose" placeholder="" class="form-control "  disabled style="height:0px">
                                            <label for="file_attach_dc_btn" class="btn btn-success pt-2"  style="height:36px">ফাইল বাছাই করুন</label>
                                            @error('file_attach_dc')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dept_id" class=" form-control-label">ডিপার্টম্যান্ট</label>
                                        <select class="form-control"  style="color:#312e2e"id="dept_id" name="dept_id">

                                            <option value=""></option>

                                            <option value="">ডিপার্টম্যান্ট বাছাই করুন</option>


                                        </select>
                                        @error('dept_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="section_id" class=" form-control-label">সেকশন</label>
                                        <select class="form-control"  style="color:#312e2e"id="section_id" name="section_id">

                                            <option value=""></option>

                                            <option value="">সেকশন বাছাই করুন</option>

                                        </select>
                                        @error('section_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deadline" class=" form-control-label" >ডেটলাইন</label>
                                        <input type="date" id="deadline" class="form-control" name="deadline" value="">
                                        @error('deadline')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority" class=" form-control-label">প্রায়োরিটি</label>
                                        <select class="form-control"  style="color:#312e2e"id="priority" name="priority">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        @error('priority')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- DC first part -->
                            <div class="row" style="border: 2px solid #5ed84fab;padding: 12px 3px;border-radius: 8px;margin: 5px 0;margin-top:10px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deadline_dc" class=" form-control-label" >ডেটলাইন বাই ডিসি</label>
                                        <input type="date" id="deadline_dc" class="form-control" name="deadline_dc" value="" >
                                        @error('deadline_dc')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adc_id" class=" form-control-label">এডিসি বাছাই</label>
                                        <select class="form-control"  style="color:#312e2e" id="adc_id" name="adc_id">

                                            <option value=""></option>

                                        </select>
                                        @error('adc_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remark_dc" class=" form-control-label" >রিমারক বাই ডিসি</label>
                                        <textarea name="remark_dc" id="remark_dc" class="form-control " cols="10" rows="1"></textarea>
                                        @error('remark_dc')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- ADC part -->
                            <div class="row" style="border: 2px solid #5ed84fab;padding: 12px 3px;border-radius: 8px;margin: 5px 0;margin-top:10px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ac_id" class=" form-control-label">AC বাছাই</label>
                                        <select class="form-control"  style="color:#312e2e"id="" name="ac_id">

                                        </select>
                                        @error('ac_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ফাইল সংযুক্তকরণ</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" accept=".jpg,.bmp,.png,.jpeg,.pdf,.docs"  id="file_attach_adc_btn" name="file_attach_adc[]" multiple hidden/>
                                            <input type="text" id="file_attach_adc_choose" placeholder="" class="form-control "  disabled style="height:0px">
                                            <label for="file_attach_adc_btn" class="btn btn-success pt-2"  style="height:36px">ফাইল বাছাই করুন</label>
                                            @error('file_attach_adc')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remark_adc" class=" form-control-label" >রিমারক বাই এডিসি</label>
                                        <textarea name="remark_adc" id="remark_adc" class="form-control " cols="10" rows="1"></textarea>
                                        @error('remark_adc')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- AC part -->
                            <div class="row" style="border: 2px solid #5ed84fab;padding: 12px 3px;border-radius: 8px;margin: 5px 0;margin-top:10px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" class=" form-control-label">ওয়ার্ক স্ট্যাটাস</label>
                                        <select class="form-control"  style="color:#312e2e"id="ac_status" name="ac_status">
                                            {{-- @if($pendingletter->ac_status == 2)
                                            <option value="2">কমপ্লিট</option>
                                            @else
                                            <option value="1">প্যান্ডিং</option>
                                            <option value="2">কমপ্লিট</option>
                                            @endif
                                        </select>
                                        @error('dept_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ফাইল সংযুক্তকরণ</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" accept=".jpg,.bmp,.png,.jpeg,.pdf,.docs"  id="file_attach_ac_btn" name="file_attach_ac[]" multiple hidden/>
                                            <input type="text" id="file_attach_ac_choose" placeholder="" class="form-control "  disabled style="height:0px">
                                            <label for="file_attach_ac_btn" class="btn btn-success pt-2"  style="height:36px">ফাইল বাছাই করুন</label>
                                            @error('file_attach_ac')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remark_ac" class=" form-control-label" >রিমারক বাই এসি</label>
                                        <textarea name="remark_ac" id="remark_ac" class="form-control " cols="5" rows="1"></textarea>
                                        @error('remark_ac')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="result_ac" class=" form-control-label" >ফলাফল</label>
                                        <textarea name="result_ac" id="result_ac" class="form-control " cols="5" rows="1"></textarea>
                                        @error('result_ac')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}


        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{asset('vendors/chosen/chosen.jquery.min.js')}}"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#details' ) )
      .catch( error => {
        console.error( error );
      } );
  </script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });


    const file_attach_dc_btn = document.getElementById('file_attach_dc_btn');
    const file_attach_dc_choose = document.getElementById('file_attach_dc_choose');
    file_attach_dc_btn.addEventListener('change', function(){
        var text = "";
        for (var i = 0; i < file_attach_dc_btn.files.length; i++){
            text += this.files[i].name + ",";
        }
        file_attach_dc_choose.placeholder = text;
        });

    const file_attach_adc_btn = document.getElementById('file_attach_adc_btn');
    const file_attach_adc_choose = document.getElementById('file_attach_adc_choose');
    file_attach_adc_btn.addEventListener('change', function(){
        var text = "";
        for (var i = 0; i < file_attach_adc_btn.files.length; i++){
            text += this.files[i].name + ",";
        }
        file_attach_adc_choose.placeholder = text;
        });

    const file_attach_ac_btn = document.getElementById('file_attach_ac_btn');
    const file_attach_ac_choose = document.getElementById('file_attach_ac_choose');
    file_attach_ac_btn.addEventListener('change', function(){
        var text = "";
        for (var i = 0; i < file_attach_ac_btn.files.length; i++){
            text += this.files[i].name + ",";
        }
        file_attach_ac_choose.placeholder = text;
        });


</script>


@if(session()->has('msg') && session()->get('msg') == 1)
<script>
    toastr.success('Your data has been saved successfully', 'Success');
</script>
@endif

@if(session()->has('msg') && session()->get('msg') == 2)
<script>
    toastr.error('Please select either cash or cheque for all fields.', 'Error!!!');
</script>
@endif

@endsection
