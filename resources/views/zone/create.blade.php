@extends('layouts.default')
@section('content') 
<div class="app-page-title" >
    <div class="animated fadeIn delay-1s">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon" style="width:60px; height:60px; font-size:2.8rem;">
                    <i class="pe-7s-plus icon-gradient bg-mean-fruit" style="font-weight: bolder; margin: -5px;"></i>
                </div>
                <div>
                	<div><h4 style="margin: 0;"><strong>Zone</strong></h4></div>
                    <div class="page-title-subheading"><p style="margin: 0;"><strong>Add zone from here</strong></p></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- form --}}
    <div class="col-lg-12 col-xl-8">
        <div class="animated fadeIn delay-1s">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h4 class="card-title main-theme-color text-primary" style="margin-bottom: 0; font-family: Cooper;  font-size: 20px; text-align: center; letter-spacing: 4px; word-spacing: 5px; padding: 10px;"><strong>Add Zone</strong></h4 >
					<hr class="main-bg-color bg-primary" style="width: 30%; padding: 1px; margin: 0 auto 1.5rem auto;"/>
                    <form action="{{url()->to('zone')}}" method="POST">
                        @csrf

                        <div id="msg"> </div>
                        <div class="position-relative form-group">
                            <label for="name" style="font-family: cursive; font-weight: bold; font-size: 17px;">Name</label>
                            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control" style="font-family: calibri; font-weight: bold; font-size: 17px;" placeholder="Ex:Dhaka" value="{{old('name')}}" required />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="description" style="font-family: cursive; font-weight: bold; font-size: 17px;">Description</label>
                            <textarea type="text" id="description" name="description" class="@error('description') is-invalid @enderror form-control" style="font-family: calibri; font-weight: bold; font-size: 17px;" placeholder="Add description about workzone" value="{{old('description')}}" required></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" class="main-button-color btn-wide btn btn-primary form-control" style="border-radius: 50px; font-weight: bold; font-size: 15px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- instructions --}}
    <div class="col-lg-12 col-xl-4">
        <div class="animated fadeIn delay-1s">
            <div class="mb-3 card" style="opacity:0.8;">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
						<p style="margin-bottom: 0; "><i class="header-icon pe-7s-note2 icon-gradient bg-happy-itmeo" style="font-weight: 600; "> </i></p>
                        <p style="margin-bottom: 0; font-family: cursive; font-weight: 600; letter-spacing: 3px">Instructions</p>
                    </div>
                </div>

                <div class="p-0 card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container" style="background-image: none;">
                                    <div class="p-3">

                                            <div class="notifications-box">
                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                    <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                        <div><span class="main-bg-color vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <div class="animated slideInLeft delay-2s">
                                                                    <h4 class="timeline-title" style="font-family: cursive; font-size: 16px;">Enter work zone name.
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notifications-box">
                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                    <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                        <div><span class="main-bg-color vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <div class="animated slideInLeft delay-2s">
                                                                    <h4 class="timeline-title" style="font-family: cursive; font-size: 16px;">Enter description.
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notifications-box">
                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                    <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                        <div>
                                                            <span class="main-bg-color vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <div class="animated slideInLeft delay-2s">
                                                                    <h4 class="timeline-title" style="font-family: cursive; font-size: 16px;">Try to avoid redundency.</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="animated slideInUp delay-1s">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <p class="text-primary main-theme-color" style="text-align: center; width: 100%; font-family: Cooper; font-size: 20px; text-align: center; letter-spacing: 4px; margin-bottom: 0;"><strong>Zones</strong></p>
                    {{-- <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="active btn btn-focus">Last Week</button>
                            <button class="btn btn-focus">All Month</button>
                        </div>
                    </div> --}}
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($zones as $zone)
                                <tr>
                                    <td class="text-center text-muted">{{$i++}}</td>
                                    <td class="text-center">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$zone->name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @if ($zone->status == 1)
                                        <td class="text-center">
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                    @elseif($zone->status == 2)
                                        <td class="text-center">
                                            <div class="badge badge-danger">Deactivated</div>
                                        </td>
                                    @endif
                                    <td class="text-center">
                                        <a type="button" href="{{url()->to('zone/'.$zone->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="d-block text-center card-footer">
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                    <button type="submit" class="main-button-color btn-wide btn btn-primary form-control" style="border-radius: 50px; font-weight: bold; font-size: 15px;">Save</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript" src="{{asset('assets/toastr.js')}}"></script>
@if(session()->has('msg') && session()->get('msg') == 2)
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
