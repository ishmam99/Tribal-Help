<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class ApplicationController extends Controller
{
    public function index()
    {
        if(auth()->user()->usertype == 0){
            $applications = Application::all();
        }
        else {
            $application = auth()->user()->applications;

            $app = Application::whereHas('statuses', function ($query) {
                $query->where('child_id', auth()->id());
            })->get();
            $applications = $application->concat($app)->unique();

        }

        return view('helprequest.list', compact('applications'));
    }
    public function certificates()
    {
        $applications = Application::where('subject_id',5)->get();
        return view('helprequest.certificate_list', compact('applications'));
    }
    public function edit(Application $application)
    {
        return view('helprequest.edit', compact('application'));
    }
    public function update(Request $request, Application $application)
    {
        if($request->status){
            $application->update(['status'=>$request->status]);
        }
        else{
            $application->update(['status' => 1]);
        $status = $application->statuses->where('child_id',auth()->id())->first();

            $application->statuses()->create([
                'parent_id' => auth()->id(),
                'child_id' =>  $request->user_id,
                'deadline'  =>  $request->deadline]);


                if($request->details)
                {
                    $application->comments()->create([
                        'user_id'   =>  auth()->id(),
                        'content'   =>  $request->details
                    ]);
                }
            }
        return redirect()->back();
    }
    public function statusUpdate(ApplicationStatus $applicationStatus,Request $request)
    {
     if($request->status == 2)
       {
      $applicationStatus->application->statuses->where('parent_id',auth()->id())->first()->update(['status'=> 0]);

       }

       $applicationStatus->update(['status'=>$request->status]);

       return redirect()->back();
    }
    public function create()
    {

        $users = new User();
        $users = $users->where('is_delete', '=', 0)->where('status', '=', 1)->get();
        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');
        $subjects  = Subject::all();
        $focals = User::where('usertype',1)->get();

        return view('helprequest.create',compact('subjects','focals', 'daydate'));
    }
    public function createCertificate()
    {
        $users = new User();

        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');
        $subjects  = Subject::where('name', 'সনদপত্র')->get();
        $focals = User::where('usertype', 1)->get();

        return view('helprequest.certificate', compact('subjects', 'focals', 'daydate'));
    }
    public function storeCertificate(Request $request)
    {
        // dd($request);
       $input = $request->validate([
            'applicant_name'    =>  'required|string',
            'father_name'       =>  'required|string',
            'mother_name'       =>   'required|string',
            'mobile'            =>  'required|string',
            'village'           =>  'required',
            'union'             =>  'required',
            'post_office'       =>  'required',
            'upazila'            =>  'required',
            'zila'              =>  'required',
            'nid'               =>  'required',
            'application_subject'           =>  'required',
            'subject_id'        =>  'required',
            'user_id'    =>  'required',
       ]);
       $input['address'] = $input['village'].','. $input['union'].','. $input['post_office'].','. $input['upazila'].','. $input['zila'];
       $application = Application::create($input);

       if($request->applicant_image){
        $image = uploadFile($request->file('applicant_image'));
        $application->files()->create(['name'=>'image','file'=>$image,'type'=>1]);
       }
       if($request->applicant_chairman_certificate){
        $chairman_certificate = uploadFile($request->file('applicant_chairman_certificate'));
            $application->files()->create(['name' => 'image', 'file' => $chairman_certificate, 'type' => 2]);
       }
       if($request->applicant_certificate){
        $certificate = uploadFile($request->file('applicant_certificate'));
            $application->files()->create(['name' => 'image', 'file' => $certificate, 'type' => 3]);
       }
       if($request->applicant_testimonial){
        $testimonial = uploadFile($request->file('applicant_testimonial'));
            $application->files()->create(['name' => 'image', 'file' => $testimonial, 'type' => 4]);
       }
       if($request->applicant_nid){
        $nid = uploadFile($request->file('applicant_nid'));
            $application->files()->create(['name' => 'image', 'file' => $nid, 'type' => 5]);
       }
    //    dd($application->files->where('type', 1)->first());
       $id = $application->id+10000;
        $pdffilename = 'Applicationreport_' . $id. '.pdf';
        return $pdf = PDF::loadView(
            'helprequest.details_pdf',
            [
                'helprequest' => $application,
                'image' => $application->files->where('type',1)->first(),
                'user'  => User::find(1),
                'id'    =>$id

            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার সনদপত্র আবেদন ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream($pdffilename);
    }
    public function store(Request $request)
    {

       $input = $request->validate([
            'applicant_name'    =>  'required|string',
            'father_name'       =>  'required|string',
            'mother_name'       =>   'required|string',
            'mobile'            =>  'required|string',
            'address'           =>  'required',
            'email'             =>  'nullable',
            // 'post_office'       =>  'required',
            // 'upazila'            =>  'required',
            // 'zila'              =>  'required',
            'nid'               =>  'required',
            'application_subject'           =>  'required',
            'subject_id'        =>  'required',
            'user_id'    =>  'required',
       ]);
       $application = Application::create($input);

       if($request->applicant_attachment){

        foreach($request->applicant_attachment as $data){

            $image = uploadFile($data);
             $application->files()->create(['name'=>'image','file'=>$image,'type'=>1]);
        }


       }



       $id = $application->id+10000;
        $pdffilename = 'Applicationreport_' . $id. '.pdf';
        return $pdf = PDF::loadView(
            'helprequest.details_pdf',
            [
                'helprequest' => $application,
                'image' => $application->files->where('type',1)->first(),
                'user'  => User::find(1),
                'id'    =>$id
            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার সনদপত্র আবেদন ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream($pdffilename);
    }
    public function pdf(Application $application)
    {
        $id = $application->id + 10000;
        $pdffilename = 'Applicationreport_' . $id . '.pdf';
        return $pdf = PDF::loadView(
            'helprequest.certificate_application_pdf',
            [
                'helprequest' => $application,
                'image' => $application->files->where('type', 1)->first(),
                'user'  => User::find(1),
                'id'    => $id
            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার সনদপত্র আবেদন ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream($pdffilename);
    }
    public function pdf2(Application $application)
    {
        $id = $application->id + 10000;
        $pdffilename = 'Applicationreport_' . $id . '.pdf';
        return $pdf = PDF::loadView(
            'helprequest.details_pdf',
            [
                'helprequest' => $application,
                'image' => $application->files->where('type', 1)->first(),
                'user'  => User::find(1),
                'id'    => $id
            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার সনদপত্র আবেদন ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream($pdffilename);
    }


}
