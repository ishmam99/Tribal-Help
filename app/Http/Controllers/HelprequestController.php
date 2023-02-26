<?php

namespace App\Http\Controllers;

use App\Models\Helprequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Session;
use DB;
class HelprequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function toEnglish($number){
    $search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".","-"," ");
    $replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","","","");
    $con_number = str_replace($search_array, $replace_array, $number);
    return $con_number;
  }
    function toBangla ($number){
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
    $bn_number = str_replace($search_array, $replace_array, $number);
    return $bn_number;
  }


    public function indexOld()
    {
        $helprequests = new Helprequest();
        $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();

        if(Session::get('type')==99)
        $helprequests = $helprequests->where('is_delete','=',0)->orderBy('id', 'DESC')->get();
        else
        $helprequests = $helprequests->where('user_id','=',Session::get('userid'))->where('is_delete','=',0)->orderBy('id', 'DESC')->get();

        $userArray = Array();
        foreach($users as $user) $userArray[$user->id] = $user;


        return view('helprequest.list',[
            'helprequests' => $helprequests,
            'users'=>$users,
            'userArray'=>$userArray,
        ]);

    }

public function index()
    {


        $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();

        $service_types = Subject::all();

        // $service_type_list = array();
        // foreach ($service_types as $service) {
        //  $service_type_list[] = $service->service_type;
        // }


        //  if(request()->ajax())
        // {


        // $helpdatatable = new Helprequest();
        // if(Session::get('type')==99){
        // $helpdatatable = DB::table('helprequests')
        //     ->join('users', 'helprequests.user_id', '=', 'users.id')
        //     ->select('helprequests.id',
        //         'helprequests.application_date',
        //         'helprequests.application_type',
        //         'helprequests.service_type',
        //         'users.name AS name',
        //         'helprequests.applicant_name',
        //         'helprequests.applicant_attachment',
        //         'helprequests.mobile',
        //         'helprequests.nid',
        //         'helprequests.result',
        //         'helprequests.feedback_date',
        //          'helprequests.feedback_comment',
        //         'helprequests.feedback_attachment'

        //     )
        //     ->where('helprequests.is_delete','=',0)
        //     ->orderBy('helprequests.id','desc')
        //     ->get();
        //   }
        //   else{
        //       $helpdatatable = DB::table('helprequests')
        //     ->join('users', 'helprequests.user_id', '=', 'users.id')
        //     ->select('helprequests.id',
        //         'helprequests.application_date',
        //         'helprequests.application_type',
        //         'helprequests.service_type',
        //         'users.name AS name',
        //         'helprequests.applicant_name',
        //         'helprequests.applicant_attachment',
        //         'helprequests.mobile',
        //         'helprequests.nid',
        //         'helprequests.result',
        //         'helprequests.feedback_date',
        //          'helprequests.feedback_comment',
        //         'helprequests.feedback_attachment'

        //     )
        //     ->where('helprequests.user_id','=',Session::get('userid'))
        //     ->where('helprequests.is_delete','=',0)
        //     ->orderBy('helprequests.id','desc')
        //     ->get();
        //   }

        //     return datatables()->of($helpdatatable)
        //             ->addColumn('service_type', function($data){
        //               $modifiedfield = $data->service_type;
        //               if(isset($data->applicant_attachment)){
        //                     $acl_file_location = (explode(",",$data->applicant_attachment));
        //                     for($i=0 ; $i<count($acl_file_location);$i++){
        //                     $k = $i+1;
        //                      $modifiedfield .= '<br><a href="'.url()->to($acl_file_location[$i]).'" class="d-flex justify-content-center" target="_blank">Attachment_'.$k.'</a>';
        //                     }
        //                }
        //                 return $modifiedfield;
        //             })
        //             ->addColumn('mobile', function($data){
        //               $modifiedfield = $this->toBangla($data->mobile);

        //                 return $modifiedfield;
        //             })
        //             ->addColumn('nid', function($data){
        //               $modifiedfield = $this->toBangla($data->nid);
        //                 return $modifiedfield;
        //             })
        //              ->addColumn('feedback_date', function($data){
        //               $modifiedfield = $data->feedback_date;
        //               if(isset($data->feedback_attachment)){

        //                     $acl_file_location = (explode(",",$data->feedback_attachment));
        //                     for($i=0 ; $i<count($acl_file_location);$i++){
        //                     $k = $i+1;
        //                      $modifiedfield .= '<br><a href="'.url()->to($acl_file_location[$i]).'" class="d-flex justify-content-center" target="_blank">Attachment_'.$k.'</a>';
        //                     }

        //               }
        //                 return $modifiedfield;
        //             })

        //             ->addColumn('action', function($data){
        //                 $button = '<div class="d-flex table-actions">';
        //                 $button .='<a class="btn btn-dark" href="'.url()->to('applicationreport/'.$data->id).'" target="_blank" style="color: white;" >Details</a>';
        //                 $button .='<a class="btn btn-info" href="'.url()->to('applicationreport/'.$data->id).'" target="_blank" style="color: white;" >Download</a>';
        //                   if(1){
        //                       // !isset($data->feedback_date)
        //                 $button .='<a class="btn btn-success" href="#feedback"  data-toggle="modal" data-helprequestid="'.$data->id.'" data-feedbackdate="'.$data->feedback_date.'" data-feedbackcomment="'.$data->feedback_comment.'" data-result="'.$data->result.'" data-feedbackattachment="'.$data->feedback_attachment.'"  style="color: white;" >Feedback</a>';
        //                 $button .='<a class="btn btn-primary" href="#refer"  data-toggle="modal" data-helprequestid="'.$data->id.'" style="color: white;" >Refer</a>';
        //                     if(Session::get('type')==99){
        //                       $button .='<a class="btn btn-danger" href="#deleter"  data-toggle="modal" data-helprequestid="'.$data->id.'" style="color: white;" >Delete</a>';
        //                     }
        //                   }

        //                 $button .= '</div>';
        //                 return $button;
        //             })


        //             ->rawColumns(['mobile','nid','service_type','feedback_date','action'])
        //             ->make(true);
        // }
         return view('helprequest.list',[
            'users'=>$users,
            'service_type_list'=> $service_types,
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();
        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');
        return view('helprequest.create',[
            'users'=>$users,
            'daydate'=>$daydate,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $helprequest = new Helprequest();
        $helprequest->user_id = 1;
        $helprequest->refered_ids=1;
        $users = new User();
        $users = $users->find($helprequest->user_id);
        $helprequest->application_type = $request->application_type;
        $helprequest->service_type = $request->service_type;
     //   $helprequest->item_name = $request->item_name;

        $helprequest->applicant_name = $request->applicant_name;
        $helprequest->mobile = $this->toEnglish($request->mobile);
        $helprequest->nid = $this->toEnglish($request->nid);
        $helprequest->email = $request->email;
        $helprequest->address = $request->address;
        $helprequest->upazila = $request->upazila;
        $helprequest->father_name = $request->father_name;
        $helprequest->mother_name = $request->mother_name;
    //  $helprequest->applicant_comment = $request->applicant_comment;

        $file_upload_location = "uploadfile/";
        $timeset = date_default_timezone_set('Asia/Dhaka');

        $helprequest->application_date = date('Y-m-d');

        $applicant_attachment_location = "";
        $applicant_attachment_location_public = "";
        if($request->file('applicant_attachment') != NULL){
            $files = $request->file('applicant_attachment');
            $k=1;
            $mm=0;
            foreach($files as $file){
                $fileName = "applicant_attachment_".$request->mobile."_".$k++."__".date('Y_m_d').".".$file->getClientOriginalExtension();
                 if($mm==0)
                $applicant_attachment_location .= $file_upload_location.$fileName;
                else
                $applicant_attachment_location .= ",".$file_upload_location.$fileName;
                $mm++;
                $applicant_attachment_location_public .= $file_upload_location.$fileName;
                if(File::exists($applicant_attachment_location_public)) {
                    unlink($applicant_attachment_location_public);
                }
                $file->move($file_upload_location, $fileName);
            }
            $helprequest->applicant_attachment = $applicant_attachment_location;
        }
        if($helprequest->save())
        {
            if(isset($request->mobile)){

              $mssg = "সম্মানিত গ্রাহক, আপনার আবেদনটি গৃহীত হয়েছে। আবেদন ID:".$this->toBangla($helprequest->id)." । পরবর্তী আপডেট SMS এর মাধ্যমে জানানো হবে।"."\n-". $users->name;
            $numbers = "88".$helprequest->mobile;
             $sms =  "http://sms.esmsbd.com/smsapi?api_key=R60010955e58f5a1b11ed3.99591206&type=text&contacts=".$numbers."&senderid=8809601000500&msg=".urlencode($mssg);
            $xml = file_get_contents($sms);
         }

            $h_id = $helprequest->orderBy('id', 'desc')->first()->id;
            return redirect()->to('applicationreport/'.$h_id)->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }

    }

    public function feedback(Request $request)
    {
        $helprequest = new Helprequest();
        $helprequest = $helprequest->find($request->helprequest_id);
        $helprequest->feedback_date = $request->feedback_date;
        $helprequest->feedback_comment = $request->feedback_comment;
        $helprequest->result = $request->result;

        $file_upload_location = "uploadfile/";
        $timeset = date_default_timezone_set('Asia/Dhaka');

        $feedback_attachment_location = "";
        $feedback_attachment_location_public = "";
        if($request->file('feedback_attachment') != NULL){
            $files = $request->file('feedback_attachment');
            $k=1;
            $mm =0;
            foreach($files as $file){
                $fileName = "feedback_attachment_".$request->helprequest_id."_".$k++."__".date('Y_m_d').".".$file->getClientOriginalExtension();
                if($mm==0)
                $feedback_attachment_location .= $file_upload_location.$fileName;
                else
                $feedback_attachment_location .= ",".$file_upload_location.$fileName;
                $mm++;
                $feedback_attachment_location_public .= $file_upload_location.$fileName;
                if(File::exists($feedback_attachment_location_public)) {
                    unlink($feedback_attachment_location_public);
                }
                $file->move($file_upload_location, $fileName);
            }
            $helprequest->feedback_attachment = $feedback_attachment_location;
        }
        if(isset($request->result))
         $helprequest->status =2;

        if($helprequest->save())
        {
         if(isset($request->result)){
             $mssg = "".$helprequest->result;
             $numbers = "88".$helprequest->mobile;
         //TODO...................................................
          //      $numbers = "880183298326";
             $sms =  "http://sms.esmsbd.com/smsapi?api_key=R60010955e58f5a1b11ed3.99591206&type=text&contacts=".$numbers."&senderid=8809601000500&msg=".urlencode($mssg);
            $xml = file_get_contents($sms);
         }
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }


    }


    public function refer(Request $request)
    {
        $helprequest = new Helprequest();
        $helprequest = $helprequest->find($request->helprequest_id);
        $helprequest->user_id = $request->user_id;
        $helprequest->refered_ids = $helprequest->refered_ids.",".$request->user_id;


        if($helprequest->save())
        {
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }


    }

     public function deleter(Request $request)
    {
        $helprequest = new Helprequest();
        $helprequest = $helprequest->find($request->helprequest_id);

        if($helprequest->delete())
        {
            return redirect()->back()->with(['msg' => 3]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 4]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Helprequest  $helprequest
     * @return \Illuminate\Http\Response
     */
    public function show(Helprequest $helprequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Helprequest  $helprequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Helprequest $helprequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helprequest  $helprequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helprequest $helprequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helprequest  $helprequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helprequest $helprequest)
    {
        //
    }
}
