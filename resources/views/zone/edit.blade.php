@extends('layouts.default')
@section('content')
<div class="app-page-title" >
    <div class="animated fadeIn delay-1s">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-plus icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Zone
                    <div class="page-title-subheading">Edit zone from here
                    </div>
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
                    <h5 class="card-title">Edit Zone</h5>
                    <form action="{{url()->to('zone/'.$zone->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="position-relative form-group">
                            <label for="exampleEmail6">Name</label>
                            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Ex:Dhakka" value="{{$zone->name}}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror    
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail6">Description</label>
                            <textarea type="text" id="description" name="description" class="@error('description') is-invalid @enderror form-control" placeholder="Add description about workzone" required>{{$zone->description}}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror    
                        </div>
                        
                        <div style="text-align: right">
                            <button type="submit" class="btn-wide btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- instructions --}}
    <div class="col-lg-12 col-xl-4">
        <div class="animated fadeIn delay-1s">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon pe-7s-note2 icon-gradient bg-happy-itmeo"> </i>
                        Instructions
                    </div>
                </div>
                
                <div class="p-0 card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <div class="p-3">
                                       
                                            <div class="notifications-box">
                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                    <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                        <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <div class="animated slideInLeft delay-2s">
                                                                    <h4 class="timeline-title">Enter work zone name.
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
                                                        <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <div class="animated slideInLeft delay-2s">
                                                                    <h4 class="timeline-title">Enter description.
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
                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <div class="animated slideInLeft delay-2s">
                                                                    <h4 class="timeline-title">
                                                                        Try to avoid redundency.
                                                                    </h4>
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

@endsection