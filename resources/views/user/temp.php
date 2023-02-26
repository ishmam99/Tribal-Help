@extends('layouts.default')
@section('csses')

</style>
@endsection
@section('content')

<!--==========User========-->


<div class="main-content" >
    <div class="container-fluid">
        <div class="app-page-title Mytilte" >
            <div class="animated fadeIn delay-1s">
                <div class="page-title-wrapper container-fluid" id="showitem">
                    <div class="page-title-heading d-flex">
                        <div class="page-title-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div id="showitem"> 
                            <div><h4>ইউজার তৈরি</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>নতুন ইউজার তৈরি করুন</strong></p></div>
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
                            <h5 class="text-white">User Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url()->to('users')}}" method="POST" enctype="multipart/form-data">
                                @csrf
  
                                <div id="msg"> </div>
									<div class="position-relative form-group">
										<label for="name">* Organization Name</label>
										<input type="text" id="name" name="name" placeholder="Organization Name" class="@error('name') is-invalid @enderror form-control" value="{{old('name')}}" required>
										@error('name')
											<div class="invalid-feedback">
												{{$message}}
											</div>
										@enderror
									</div>
                                    <div class="position-relative form-group">
										<label for="position">* Position</label>
										<input type="text" id="position" name="position" placeholder="Position" class="@error('position') is-invalid @enderror form-control" value="{{old('position')}}" required>
										@error('name')
											<div class="invalid-feedback">
												{{$message}}
											</div>
										@enderror
									</div>
                                    <div class="position-relative form-group">
									   <label for="username">* Username (in English)</label>
									   <input type="username" id="username" name="username" placeholder="Username" class="@error('username') is-invalid @enderror form-control" value="{{old('username')}}" required>
										@error('username')
											<div class="invalid-feedback">
												{{$message}}
											</div>
										@enderror
									</div>
									<div class="position-relative form-group">
									   <label for="email">* Email (in English)</label>
									   <input type="email" id="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror form-control" value="{{old('email')}}" required>
										@error('email')
											<div class="invalid-feedback">
												{{$message}}
											</div>
										@enderror
									</div>
									<div class="position-relative form-group">
									   <label for="password">* Password (in English)</label>
									   <input type="password" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror form-control" required>
										@error('password')
											<div class="invalid-feedback">
												{{$message}}
											</div>
										@enderror
									</div>
 
									<div class="row">
										<div class="col-lg-6 col-xl-6">
											<div class="position-relative form-group">
												<label for="usertype">* User Type</label>
												<select name="usertype" id="usertype" class="form-control" value="{{old('usertype')}}" required>
													<option value="">Select Type</option>
													<option value="1">Focal Point</option>
                                                    <option value="99">Admin</option>
												</select>
												@error('usertype')
													<div class="invalid-feedback">
														{{$message}}
													</div>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-xl-6">
											<div class="position-relative form-group">
												<label for="mobile">* Mobile (in English)</label>
												<input type="text" id="mobile" name="mobile" placeholder="Mobile" class="@error('mobile') is-invalid @enderror form-control" value="{{old('mobile')}}" required>
												@error('mobile')
													<div class="invalid-feedback">
														{{$message}}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="position-relative form-group">
										<label for="address">* Address</label>
                                        <textarea type="text" id="address" name="Address" placeholder="address" class="@error('address') is-invalid @enderror form-control" value="{{old('address')}}" required></textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Profile Image (optional)</label>
                                                <div class="input-group ">
                                                    <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="profile_image" name="profile_image" hidden/>                           
                                                    <input type="text" id="profile_image_choose" value="Choose Profile Image" class="form-control rounded-0" style="height: 0;" disabled>
                                                    <label for="profile_image" class="btn theme_button rounded-0 py-2" style="height:36px">Choose Profile Image</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Signature (optional)</label>
                                                <div class="input-group ">
                                                    <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="signature" name="signature" hidden/>                           
                                                    <input type="text" id="signature_choose" value="Add Signature" class="form-control" disabled style="height: 0;">
                                                    <label for="signature" class="btn theme_button rounded-0 pt-2" style="height:36px">Add Signature</label>
                                                </div>
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


        {{-- <div id="data-table" class="animated slideInUp delay-1s" style="margin-top: 60px;">
            <div class="main-card mb-3 card tabelanimate">
                <div class="card-header justify-content-center bg-dark">
                    <h5 class="text-white">সকল ইউজারের তালিকা</h5>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">নাম</th>
                                <th class="text-center">স্ট্যাটাস</th>
                                <th class="text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center text-muted">{{$i++}}</td>
                                <td class="text-center">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$user->name}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if ($user->status == 1)
                                <td class="text-center">
                                    <div class="badge badge-warning">Active</div>
                                </td>
                                @elseif($user->status == 2)
                                <td class="text-center">
                                    <div class="badge badge-danger">Deactivated</div>
                                </td>
                                @endif
                                <td class="text-center">
                                    <a type="button" href="{{url()->to('user/'.$user->id.'/edit')}}" class= "button edit-button btn btn-success btn-sm"><i class="ik ik-edit-2"></i>Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        
    </div>
</div>

{{-- Add Department --}} 
<div class="modal fade" id="adddeparment" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <form action="{{url()->to('department')}}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">ডিপার্টম্যান্ট
                     যোগ করুন  (Add Department)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">ডিপার্টম্যান্ট  (Department)</label>
                        <input type="text" class="form-control" name="name" id="name"   required >
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button btn btn-danger" data-dismiss="modal" >বাতিল করুন</button>
                    <button type="submit" class="button btn btn-success">যোগ করুন</button>
                </div>
            </div>
        </div>
    </form>
</div>


{{-- Add Section --}}  
<div class="modal fade" id="addsection" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <form action="{{url()->to('section')}}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">সেকশন
                     যোগ করুন  (Add Section)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">সেকশন  (Section)</label>
                        <input type="text" class="form-control" name="name" id="name"   required >
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button btn btn-danger" data-dismiss="modal" >বাতিল করুন</button>
                    <button type="submit" class="button btn btn-success">যোগ করুন</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--==========/User/========-->
@endsection

@section('scripts')

<script>
        const profile_image = document.getElementById('profile_image');
        const profile_image_choose = document.getElementById('profile_image_choose');
        profile_image.addEventListener('change', function(){
        var text = "";
        for (var i = 0; i < profile_image.files.length; i++){
            text += this.files[i].name ;
        }
        profile_image_choose.value = text;
        });
        const signature = document.getElementById('signature');
        const signature_choose = document.getElementById('signature_choose');
        signature.addEventListener('change', function(){
        var text = "";
        for (var i = 0; i < signature.files.length; i++){
            text += this.files[i].name ;
        }
        signature_choose.value = text;
        });

</script>
<script type="text/javascript" src="{{asset('assets/toastr.js')}}"></script>
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

