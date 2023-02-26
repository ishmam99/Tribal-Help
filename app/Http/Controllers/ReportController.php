<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helprequest;
use App\Models\StudentHealth;
use App\Models\Student;
use App\Models\User;
use App\Classes\PropClass;
use DB;
use PDF;
use Session;
class ReportController extends Controller
{
      public function individual()
    {
        $schoolinfo = new User();
        $schooladmin = false;
        if(Session::get('type')!=99){
            $uid = Session::get('userid');
            $schooladmin = true;
            $schoolinfo = $schoolinfo->select('id','upazila_name')->find($uid);
        }
        $propclass = new PropClass();
        $stdhealth_prop_array = $propclass->getStudentHealth();
        $input_type_array = $propclass->getInputType();
        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');

        $optionArray = array();
        $upazilas = DB::table('upazilas')->select('name')->get();
        $optionArray["upazila_name"]='<option value="">উপজেলা বাছাই করুন</option>';
        foreach ($upazilas as $upazila) {
            $optionArray["upazila_name"]=$optionArray["upazila_name"].' <option value="'.$upazila->name.'">'.$upazila->name.'</option> ';
        }

        $optionArray["school_id"]='
                            <option value="">প্রতিষ্ঠান বাছাই করুন</option>

                            ';
    $optionArray["classname"]='
                        <option value="">শ্রেণী বাছাই করুন</option>
                        <option value="১ম">১ম</option>
                        <option value="২য়">২য়</option>
                        <option value="৩য়">৩য়</option>
                        <option value="৪র্থ">৪র্থ</option>
                        <option value="৫ম">৫ম</option>
                        <option value="৬ষ্ঠ">৬ষ্ঠ</option>
                        <option value="৭ম">৭ম</option>
                        <option value="৮ম">৮ম</option>
                        <option value="৯ম">৯ম</option>
                        <option value="১০ম">১০ম</option>
                        <option value="১১শ">১১শ</option>
                        <option value="১২শ">১২শ</option>

                        ';
    $optionArray["section"]='
                        <option value="">শাখা বাছাই করুন</option>
                        <option value="ক">ক</option>
                        <option value="খ">খ</option>
                        <option value="গ">গ</option>
                        <option value="ঘ">ঘ</option>
                        <option value="ঙ">ঙ</option>
                        <option value="চ">চ</option>
                        <option value="ছ">ছ</option>
                        <option value="জ">জ</option>
                        <option value="ঝ">ঝ</option>
                        <option value="ঞ">ঞ</option>
                        ';

        $optionArray["year"]='
                            <option value="">বছর বাছাই করুন</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২৪">২০২৪</option>
                            ';

        $optionArray["session"]='
                            <option value="">সেশন বাছাই করুন</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২8">২০২8</option>
                            ';

        $optionArray["yesno"]='
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            ';
        return view('studenthealth.individual_report',[
            'schooladmin'=>$schooladmin,
            'schoolinfo'=>$schoolinfo,
            'daydate'=>$daydate,
            'optionArray'=>$optionArray,
            'stdhealth_prop_array'=>$stdhealth_prop_array,
            'input_type_array'=>$input_type_array,
        ]);

    }

   public function pdayreport()
    {
        return view('helprequest.daysinglewise_report');
    }
      public function categoryreport()
    {
           $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();
        return view('helprequest.category_report',[
            'users'=>$users,
        ]);
    }

     public function individualpdf(Request $request)
    {
        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentHealth();
        $input_type_array = $propclass->getInputType();

        $timeset = date_default_timezone_set('Asia/Dhaka');

        $students =  DB::table('students')
        ->where('upazila_name', '=', $request->upazila_name)
        ->where('session', '=', $request->session)
        ->where('school_id', '=', $request->school_id)
        ->where('classname', '=', $request->classname)
        ->where('section', '=', $request->section)
        ->where('class_roll', '=', $request->class_roll)
        ->where('status', '=', 1)
        ->distinct()
        ->get();
        $student = new Student();
        foreach ($students as $std) {
            $student = $std;
        }

        $school = new User();
        $school = $school->where('id', '=', $student->school_id)
        ->first();

        $healthinfos = DB::table('student_healths')
        ->where('auto_id', '=', $student->id)
        ->orderBy('year')
        ->get();
         if(!isset($school->name)){
            return redirect()->back()->with(['msg' => 404]);
        }
        $healthByCatYear =  array();
        $years = array();
        $ii = 0;
        foreach ($healthinfos as $healthinfo){
            $years[$ii++] = $healthinfo->year;
            foreach ($std_prop_array as $std_prop) {
                $healthByCatYear[$std_prop->sql][$healthinfo->year] = $healthinfo->{$std_prop->sql};
            }
        }



        $pdffilename = 'IndividualReport_'.$student->id.'.pdf';
          return view('studenthealth.individual_pdf',[
            'school' => $school,
            'student'=>$student,
            'years'=>$years,
            'healthByCatYear'=>$healthByCatYear,
            'std_prop_array'=>$std_prop_array,
        ]);
       /* return $pdf = PDF::loadView('studenthealth.individual_pdf',[
            'school' => $school,
            'student'=>$student,
            'years'=>$years,
            'healthByCatYear'=>$healthByCatYear,
            'std_prop_array'=>$std_prop_array,

        ],[],['mode'=> '',
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
    'title'                => 'স্কুল হেলথ কার্ড',
    'show_watermark'       => false,
    'watermark_font'       => 'sans-serif',
    'display_mode'         => 'fullpage']
    )->stream($pdffilename);
*/
    }

     public function bn2enNumber ($number){
        $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
        $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
        $bn_number = str_replace($search_array, $replace_array, $number);

        return $bn_number;
      }

        public function catwisereport(Request $request)
    {

    	if(!isset($request->dateE))
    		$request->dateE=$request->dateS;
    	 $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();
         $userArray = Array();
        foreach($users as $user) $userArray[$user->id] = $user;


        $startDate = date_create($request->dateS);
        $endDate = date_create($request->dateE);

        $startDate = date_format($startDate,"d-m-Y");
        $endDate = date_format($endDate,"d-m-Y");
        if($request->dateS==$request->dateE)
        $pdffilename = 'WomensCornerreport_'.$startDate.'.pdf';
        else
        $pdffilename = 'WomensCornerreport_'.$startDate.'_'.$endDate.'.pdf';

        $reportTitle = "";
        $comaflag = false;
        $filterCondition =array();
        array_push($filterCondition, ['is_delete','=',0]);

        if(Session::get('type')!=99)
         array_push($filterCondition,['user_id','=',Session::get('userid')]);


        if(isset($request->dateS)){
        array_push($filterCondition, ['application_date' ,'>=', $request->dateS]);
        array_push($filterCondition, ['application_date' ,'<=', $request->dateE]);
        $reportTitle.="তারিখঃ ".$this->bn2enNumber($startDate);
        if($request->dateS!=$request->dateE)
            $reportTitle.=" থেকে  ".$this->bn2enNumber($endDate);
        $comaflag = true;
        }
        if(isset($request->application_type)){
        array_push($filterCondition, ['application_type' ,'=', $request->application_type]);
        $reportTitle.= ($comaflag?", ":""). "সেবার বিষয়ঃ ".$request->application_type;
        $comaflag = true;
        }

        if(isset($request->service_type)){
        array_push($filterCondition, ['service_type' ,'=', $request->service_type]);
        $reportTitle.= ($comaflag?", ":""). "সেবার ধরনঃ ".$request->service_type;
        $comaflag = true;
        }
        if(isset($request->item_name)){
        array_push($filterCondition, ['item_name' ,'=', $request->item_name]);
        $reportTitle.= ($comaflag?", ":""). "সেবার নামঃ ".$request->item_name;
        $comaflag = true;
        }
        if(isset($request->user_id)){
        array_push($filterCondition, ['user_id' ,'=', $request->user_id]);
        $reportTitle.= ($comaflag?", ":""). "ফোকাল পয়েন্টঃ ".$userArray[$request->user_id]->name;
        $comaflag = true;
        }
        if(isset($request->mobile)){
        array_push($filterCondition, ['mobile' ,'=', $request->mobile]);
        $reportTitle.= ($comaflag?", ":""). "মোবাইলঃ ".$this->bn2enNumber($request->mobile);
        $comaflag = true;
        }
        if(isset($request->nid)){
        array_push($filterCondition, ['nid' ,'=', $request->nid]);
        $reportTitle.= ($comaflag?", ":""). "NID: ".$this->bn2enNumber($request->nid);
        $comaflag = true;
        }

    	 $helprequests = new Helprequest();


            $helprequests = $helprequests->where($filterCondition)->orderBy('application_date')->get();



        return $pdf = PDF::loadView('helprequest.catwise_pdf_range',[
            'helprequests' => $helprequests,
            'reportTitle' => $reportTitle,
            'dateS'=>$request->dateS,
            'dateE'=>$request->dateE,
            'userArray'=>$userArray,

        ],[],['mode'=> '',
    'format'               => 'A4',
    'default_font_size'    => '12',
    'default_font'         => 'nikosh',
    'margin_left'          => 10,
    'margin_right'         => 10,
    'margin_top'           => 15,
    'margin_bottom'        => 5,
    'margin_header'        => -10,
    'margin_footer'        => 0,
    'orientation'          => 'L',
    'title'                => 'বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেনস কর্ণার রিপোর্ট',
    'show_watermark'       => false,
    'watermark_font'       => 'sans-serif',
    'display_mode'         => 'fullpage']
    )->stream($pdffilename);

    }

        public function daywisereport(Request $request)
    {

    	if(!isset($request->dateE))
    		$request->dateE=$request->dateS;
    	 $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();
         $userArray = Array();
        foreach($users as $user) $userArray[$user->id] = $user;

    	 $helprequests = new Helprequest();
         if(Session::get('type')==99)
            $helprequests = $helprequests->whereBetween('application_date', [ $request->dateS, $request->dateE ])->where('is_delete','=',0)->orderBy('application_date')->get();
         else
            $helprequests = $helprequests->where('user_id','=',Session::get('userid'))->whereBetween('application_date', [ $request->dateS, $request->dateE ])->where('is_delete','=',0)->orderBy('application_date')->get();



        $startDate = date_create($request->dateS);
        $endDate = date_create($request->dateE);

        $dateS = date_format($startDate,"d-m-Y");
        $dateE = date_format($endDate,"d-m-Y");
        if($dateS==$dateE)
        $pdffilename = 'WomensCornerreport_'.$dateS.'.pdf';
        else
        $pdffilename = 'WomensCornerreport_'.$dateS.'_'.$dateE.'.pdf';
        return $pdf = PDF::loadView('helprequest.daywise_pdf_range',[
            'helprequests' => $helprequests,
            'dateS'=>$dateS,
            'dateE'=>$dateE,
            'userArray'=>$userArray,

        ],[],['mode'=> '',
    'format'               => 'A4',
    'default_font_size'    => '12',
    'default_font'         => 'nikosh',
    'margin_left'          => 10,
    'margin_right'         => 10,
    'margin_top'           => 15,
    'margin_bottom'        => 5,
    'margin_header'        => -10,
    'margin_footer'        => 0,
    'orientation'          => 'L',
    'title'                => 'বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেনস কর্ণার রিপোর্ট',
    'show_watermark'       => false,
    'watermark_font'       => 'sans-serif',
    'display_mode'         => 'fullpage']
    )->stream($pdffilename);

    }
    public function applicationreport($id)
    {

        $helprequest = new Helprequest();
        $helprequest = $helprequest->find($id);
        $user = new User();
        $user = $user->find($helprequest->user_id);



        $pdffilename = 'WomensCornerreport_' . $id . '.pdf';
        return $pdf = PDF::loadView(
            'helprequest.details_pdf',
            [
                'helprequest' => $helprequest,
                'user' => $user,

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
                'title'                => 'বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব উইমেনস কর্ণার রিপোর্ট',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream($pdffilename);
    }






}
