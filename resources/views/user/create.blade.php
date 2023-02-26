@extends('layouts.default')
@section('csses')
@endsection
@section('content')
    <!--==========User========-->


    <div class="main-content">
        <div class="container-fluid">
            <div class="app-page-title Mytilte">
                <div class="animated fadeIn delay-1s">
                    <div class="page-title-wrapper container-fluid" id="showitem">
                        <div class="page-title-heading d-flex">
                            <div class="page-title-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div id="showitem">
                                <div>
                                    <h4>ব্যবহারকারী তৈরি</h4>
                                </div>
                                <div class="page-title-subheading">
                                    <p style="margin: 0;"><strong>প্রয়োজনীয় তথ্য দিয়ে ফর্ম পূরণ করুন</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- form --}}
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div id="data-table" class="animated fadeIn delay-1s ">
                        <div class="main-card mb-3 card">
                            <div class="card-header justify-content-center">
                                <h5 class="text-white">ব্যবহারকারী অন্তর্ভুক্তিকরণ ফর্ম</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf




                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class=" form-control-label">নাম <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="name" placeholder="নাম" class="form-control @error('name') is-invalid @enderror"
                                                name="name"  type="text">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class=" form-control-label">ইউজারনেইম <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="username" placeholder="ইউজারনেইম"
                                                class="form-control  @error('username') is-invalid @enderror" name="username"
                                                type="text">
                                            @error('username')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class=" form-control-label">ই-মেইল <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" id="email" placeholder="ই-মেইল" class="form-control @error('email') is-invalid @enderror"
                                                name="email" type="text">
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class=" form-control-label">মোবাইল <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="mobile" placeholder="মোবাইল" class="form-control @error('mobile') is-invalid @enderror" type="text" name="mobile">
                  @error('mobile')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror


                                        </div>
                                    </div>


                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="" class=" form-control-label"> পদবি </label>
                                            <select id="position" style="color:#312e2e" placeholder="পদবি"
                                                class="form-control" name="position">
                                                <option value="UNO">ইউএনও</option>
                                                <option value="ADC">এডিসি</option>
                                                <option value="DC-OFFICE">ডিসি-অফিস</option>
                                                <option value="AC">এসি-ল্যান্ড</option>
                                                <option value="STUFF">কর্মচারী</option>
                                            </select>

                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>প্রয়োজনীয় কাগজপত্র সংযুক্ত করুন</label>
                                            <div class="input-group col-xs-12">
                                                <input type="file" accept=".jpg,.bmp,.png,.jpeg,.pdf,.docs"  id="profile_image_btn" name="profile_image[]" multiple hidden/>
                                                <input type="text" id="profile_image_choose" name="profile_image" placeholder="প্রয়োজনীয় কাগজপত্র সংযুক্ত করুন" class="form-control "  disabled style="height:0px">
                                                <label for="profile_image_btn" class="btn theme_button rounded-0 pt-2" style="height:35px;">ফাইল বাছাই করুন</label>
                                                @error('profile_image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    



                                    <div class=" text-center">
                                        <input type="submit" class="button btn theme_button" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <!--==========/User/========-->
@endsection

@section('scripts')

<script src="{{asset('vendors/chosen/chosen.jquery.min.js')}}"></script>

<script>

    jQuery(document).ready(function() {


        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });

    const profile_image_btn = document.getElementById('profile_image_btn');
    const profile_image_choose = document.getElementById('profile_image_choose');
    profile_image_btn.addEventListener('change', function(){
        var text = "";
        // for (var i = 0; i < profile_image_btn.files.length; i++){
            text = this.files[0].name + ",";
        // }
        profile_image_choose.placeholder = text;
        });


</script>
    <script type="text/javascript" src="{{ asset('assets/toastr.js') }}"></script>
    @if (session()->has('msg') && session()->get('msg') == 1)
        <script>
            toastr.success('Your data has been saved successfully', 'Success');
        </script>
    @endif

    @if (session()->has('msg') && session()->get('msg') == 2)
        <script>
            toastr.error('Please select either cash or cheque for all fields.', 'Error!!!');
        </script>
    @endif
@endsection
