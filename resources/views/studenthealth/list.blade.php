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
                            <div><h4>শিক্ষার্থীর তালিকা</h4></div>
                            <div class="page-title-subheading"><p style="margin: 0;"><strong>সকল শিক্ষার্থীর তালিকা দেখুন</strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="data-table" class="animated slideInUp delay-1s">
            <div class="main-card mb-3 card tabelanimate">
                <div class="card-header justify-content-center">
                    <h5 class="text-white">শিক্ষার্থী তালিকা</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                @foreach ($user_prop_array as $item_prop)
                                @if($item_prop->sql=="password")
                                 
                                @else
                                <th class="text-center">{{$item_prop->name}}</th>
                                @endif
                                @endforeach
                                <th class="text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center text-muted">{{$i++}}</td>
                                 @foreach ($user_prop_array as $item_prop)
                                 @if($item_prop->sql=="password")

                                 @elseif($item_prop->inputType==6)
                                  <td class="text-center">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <a href=" {{ asset($user->{$item_prop->sql})}}" target="_blank">Open File</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                 @else
                                 <td class="text-center">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$user->{$item_prop->sql} }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                                @endforeach
                               
                              
                                <td class="text-center">
                                    <a type="button" href="{{url()->to('student/edit/'.$user->id)}}" class="button theme_button"><i class="ik ik-edit-2 mr-2"></i>Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

