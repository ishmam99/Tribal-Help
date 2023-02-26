@extends('layouts.default')
@section('csses')
<link rel="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
@endsection
@section('content')

<!--==========Catagory========-->
<?php
  function toBangla ($number){
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
    $bn_number = str_replace($search_array, $replace_array, $number);
    return $bn_number;
  }

?>

<div class="main-content">
    <div class="container-fluid">
        <div id="data-table" >
            <div class="card tabelanimate">
                <div class="card-header justify-content-center">
                    <h5 class="text-white">আবেদনের তালিকা</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive">

                        <div style="display: flex;
  justify-content: center;">
                        <div class="col-md-6 col-12"  id = "myselect" name="myselect">
                        </div>
                        </div>
                       <table id="example"  class="table table-striped table-bordered display"  style="width:100%">
                            <thead>
                                <tr>

                                    <th>আবেদনের আইডি</th>
                                    <th>আবেদনের তারিখ</th>
                                    <th>সেবার বিষয়</th>
                                    <th class="select-filter">সেবার ধরণ</th>
                                    <th>ফোকাল পয়েন্ট</th>
                                    <th>আবেদনকারীর নাম</th>
                                    <th>মোবাইল</th>
                                    <th>এনআইডি</th>
                                    <th>স্ট্যাটাস</th>
                                    <th>সর্বশেষ আপডেট তারিখ</th>
                                    <th class="nosort">ডাউনলোড</th>
                                    <th class="nosort">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    <tr>
                                        <td>{{$application->id }} </td>
                                        <td>{{toBangla(Carbon\Carbon::parse($application->created_at)->format('d/m/y'))}}</td>
                                        <td>{{$application->application_subject}}</td>
                                        <td>{{$application->subject->name}}</td>
                                        <td>{{$application->user->name}}</td>
                                        <td>{{$application->applicant_name}}</td>
                                        <td>{{$application->mobile}}</td>
                                        <td>{{$application->nid}}</td>
                                        <td>@if($application->status == 0 )
                                             <span class="text-warning">অপেক্ষমাণ </span>
                                             @elseif($application->status == 1)
                                             <span class="text-primary"> প্রক্রিয়াধীন</span>
                                             @elseif($application->status == 2)
                                             <span class="text-success"> সম্পন্ন
                                             </span>
                                            @endif</td>
                                         <td>{{toBangla(Carbon\Carbon::parse($application->updated_at)->format('d/m/y'))}}</td>
                                         <td><a href="{{route('application.pdf2',$application->id)}}">ডাউনলোড</a></td>
                                         <td><a href="{{route('application.edit',$application->id)}}">আপডেট</a></td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Feedback --}}
    <div class="modal " id="feedback" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ফিডব্যাক দিন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url()->to('feedback')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group "style="width:100%">
                                <input type="text" name="helprequest_id" id="helprequest_id" value="" hidden>
                                <label for="feedback_date" class=" form-control-label" >* ফিডব্যাক তারিখ</label>
                                <input type="date" id="feedback_date" class="form-control" name="feedback_date" vlaue="" required>
                                @error('feedback_date')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ফাইল সংযুক্তকরণ</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" accept=".jpg,.bmp,.png,.jpeg,.pdf,.docs"  id="feedback_attachment_btn" name="feedback_attachment[]" multiple hidden/>
                                    <input type="text" id="feedback_attachment_choose" placeholder="ফাইল সংযুক্তকরণ" class="form-control "  disabled style="height:0px">
                                    <label for="feedback_attachment_btn" class="btn theme_button rounded-0 pt-2"  style="height:36px">ফাইল বাছাই করুন</label>
                                    @error('feedback_attachment')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feedback_comment" class=" form-control-label" >পূর্ণাঙ্গ ফিডব্যাক</label>
                                <textarea name="feedback_comment" id="feedback_comment" class="form-control " cols="5" rows="1"></textarea>
                                @error('feedback_comment')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="result" class=" form-control-label" >* এস.এম.এস</label>
                                <textarea name="result" id="result" class="form-control " cols="5" rows="1" required></textarea>
                                @error('result')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn btn-danger" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="button theme_button">সাবমিট</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Refer --}}
    <div class="modal " id="refer" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ">রেফার করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url()->to('refer')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="helprequest_id" id="helprequest_id" value="" hidden>
                                <label for="user_id" class=" form-control-label">ইউজার</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">ইউজার বাছাই করুন</option>
                                    @foreach(App\Models\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn btn-danger" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="button btn theme_button">সাবমিট</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete --}}
    <div class="modal " id="deleter" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ডিলিট করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url()->to('deleter')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>আপনি কি আবেদনটি ডিলিট করতে চান?</h5>
                                <input type="text" name="helprequest_id" id="helprequest_id" value="" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button btn theme_button" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="button btn btn-danger">সাবমিট</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
    //         $(document).ready( function () {

    //         var dataTable = $('#myTable').DataTable({
    //                 processing: true,
    //                 serverSide: true,
    //                 pageLength: 10,
    //                 filter: true,
    //                 deferRender: true,
    //                 ordering: true,
    //                 "searching": true,
    //                 order: [[ 0, "desc" ]],

    //                 ajax: {
    //                     url: '{{route('application.index')}}',
    //                 },
    //                 columns: [

    //                     {data: 'id', name: 'id'},
    //                     {data: 'application_date', name: 'application_date',orderable:true},
    //                     {data: 'application_type', name: 'application_type'},
    //                     {data: 'service_type', name: 'service_type'},
    //                     {data: 'name', name: 'name'},
    //                     {data: 'applicant_name', name: 'applicant_name'},
    //                     {data: 'mobile', name: 'mobile'},
    //                     {data: 'nid', name: 'nid'},
    //                     {data: 'result', name: 'result'},
    //                     {data: 'feedback_date', name: 'feedback_date'},

    //                      {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
    //                 ],

    //                     "rowCallback": function( row, data, index ) {
    //                       if (data.feedback_date) {
    //                         $('td', row).css('background-color', '#aafcaa6f');
    //                       }
    //                       else
    //                       {

    //                         $('td', row).css('background-color', '#fcaaaa8f');
    //                       }
    //                     },
    //                     initComplete: function () {
    //                         this.api().columns('.select-filter').every(function () {
    //                         var column = this;
    //                         var service_type_list = @json($applications);;

    //                         var selectList = document.createElement("select");
    //                         selectList.className  = "form-control";

    //                         for (var i = -1; i <service_type_list.length; i++) {
    //                             if(i==-1){
    //                             var option = document.createElement("option");
    //                             option.value = "";
    //                             option.text = "সেবার ধরন বাছাই করুন";
    //                             selectList.appendChild(option);
    //                             }
    //                             else{
    //                             var option = document.createElement("option");
    //                             option.value = service_type_list[i];
    //                             option.text = service_type_list[i];
    //                             selectList.appendChild(option);
    //                             }
    //                         }

    //                         $(selectList).appendTo(document.getElementById("myselect"))
    //                         .on('change', function () {
    //                             column.search($(this).val(), false, false, true).draw();
    //                         });
    //                     });
    //                     }

    //             });
    //     } );
    //     </script>
    // <script>
    //     $('#feedback').on('show.bs.modal', function (event) {

    //         var button = $(event.relatedTarget) // Button that triggered the modal

    //         var Applicant_Id  = button.data('helprequestid')
    //         var Feedback_Date = button.data('feedbackdate')
    //         var Feedback_Comment = button.data('feedbackcomment')
    //         var Result = button.data('result')
    //         var Feedback_Attachment = button.data('feedbackattachment')

    //         var modal = $(this)
    //         modal.find('.modal-body #helprequest_id').val(Applicant_Id)
    //         modal.find('.modal-body #feedback_date').val(Feedback_Date)
    //         modal.find('.modal-body #feedback_attachment_choose').val(Feedback_Attachment)
    //         modal.find('.modal-body textarea#feedback_comment').html(Feedback_Comment)
    //         modal.find('.modal-body textarea#result').html(Result)


    //     });

    //     $('#refer').on('show.bs.modal', function (event) {

    //      var button = $(event.relatedTarget) // Button that triggered the modal

    //      var Applicant_Id  = button.data('helprequestid')

    //      var modal = $(this)
    //      modal.find('.modal-body #helprequest_id').val(Applicant_Id)
    //      });

    //     $('#deleter').on('show.bs.modal', function (event) {

    //      var button = $(event.relatedTarget) // Button that triggered the modal

    //      var Applicant_Id  = button.data('helprequestid')

    //      var modal = $(this)
    //      modal.find('.modal-body #helprequest_id').val(Applicant_Id)
    //      });
    // </script>
    // <script>
    //     jQuery(document).ready(function() {
    //         jQuery(".standardSelect").chosen({
    //             disable_search_threshold: 10,
    //             no_results_text: "Oops, nothing found!",
    //             width: "100%"
    //         });
    //     });

    //     const feedback_attachment_btn = document.getElementById('feedback_attachment_btn');
    //     const feedback_attachment_choose = document.getElementById('feedback_attachment_choose');
    //     feedback_attachment_btn.addEventListener('change', function(){
    //         var text = "";
    //         for (var i = 0; i < feedback_attachment_btn.files.length; i++){
    //             if(i==0)
    //             text += this.files[i].name ;
    //             else
    //             text +=  ","+this.files[i].name ;

    //         }
    //         feedback_attachment_choose.placeholder = text;
    //         });


    // </script>


    @if(session()->has('msg') && session()->get('msg') == 1)
    <script>
        toastr.success('আপনার ডেটা সফলভাবে সংরক্ষণ করা হয়েছে', 'Success');
    </script>
    @endif

    @if(session()->has('msg') && session()->get('msg') == 2)
    <script>
        toastr.error('আপনার ডেটা সফলভাবে সংরক্ষণ করা হয়নি  । আবার চেষ্টা করুন ', 'Error!!!');
    </script>
    @endif
    @if(session()->has('msg') && session()->get('msg') == 3)
    <script>
        toastr.success('আপনার ডেটা সফলভাবে ডিলিট করা হয়েছে', 'Success');
    </script>
    @endif
    @if(session()->has('msg') && session()->get('msg') == 4)
    <script>
        toastr.error('আপনার ডেটা সফলভাবে ডিলিট হয়নি  । আবার চেষ্টা করুন ', 'Error!!!');
    </script>
    @endif
@endsection

