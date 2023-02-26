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
                            <i class="fas fa-list"></i>
                        </div>
                        <div id="showitem">
                            <div><h4>দৈনিক আবেদনের তালিকা</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>দৈনিক আবেদনের রিপোর্ট ডাউনলোড করুন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-3">
            <div class="animated fadeIn">
                {{-- form --}}
                <form action="{{url()->to('daywisereport')}}" method="POST">
                    @csrf
                    <div id="msg">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-5 col-12">
                                        <div class="form-group">
                                            <label for="dateS" class=" form-control-label" >তারিখ</label>
                                            <input type="date" id="dateS" class="form-control" name="dateS" required>
                                            @error('dateS')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
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
