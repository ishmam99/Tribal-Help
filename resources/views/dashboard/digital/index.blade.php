@extends('layouts.default')
@section('csses')

@endsection
@section('content')

<!--==========User========-->
<div class="main-content">
    <div class="container-fluid">
        <div class="app-page-title Mytilte" >
            <div class="animated fadeIn delay-1s">
                <div class="page-title-wrapper container-fluid">
                    <div class="page-title-heading d-flex">
                        <div class="page-title-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <div >
                            <div><h4>ডিজিটাল কনটেন্ট তালিকা</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>সকল ডিজিটাল কনটেন্ট দেখুন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="data-table" class="animated slideInUp delay-1s">
            <div class="main-card mb-3 card tabelanimate">
                <div class="card-header justify-content-center">
                    <h5 class="text-white">ডিজিটাল কনটেন্ট তালিকা</h5>
                </div>
                <div class="card-body table-responsive">
                            <div class="row">
                           @foreach ($contents as $item)
                                <div class="col-3 card">
                                     <h1>{{$item->name,$item->video}} <form method="post" action="{{route('digitalContent.destroy',$item->id)}}" class="d-inline-block">
                    @csrf
                    @method('DELETE') <button class="btn btn-danger">Delete</button></form></h1>

                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" sandbox src="{{setImage($item->video)}}" allowfullscreen></iframe>
                                        </div>
                                </div>
                           @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--==========/User/========-->
@endsection

@section('scripts')
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

