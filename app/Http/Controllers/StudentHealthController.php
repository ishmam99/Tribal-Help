<?php

namespace App\Http\Controllers;

use App\Models\StudentHealth;
use App\Models\Student;
use App\Models\User;
use App\Classes\PropClass;
use DB;
use File;
use Session;
use Illuminate\Http\Request;

class StudentHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
    {
        $users = DB::table('student_healths')->get();
        $propclass = new PropClass();
        $user_prop_array = $propclass->getStudentHealth();
        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');
        return view('studentHealth.list',[
            'users'=>$users,
            'daydate'=>$daydate,
            'user_prop_array'=>$user_prop_array,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
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
        return view('studenthealth.create',[
            'schooladmin'=>$schooladmin,
            'schoolinfo'=>$schoolinfo,
            'daydate'=>$daydate,
            'optionArray'=>$optionArray,
            'stdhealth_prop_array'=>$stdhealth_prop_array,
            'input_type_array'=>$input_type_array,
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
        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentHealth();
        $input_type_array = $propclass->getInputType();

        $file_upload_location = "uploadfile/";
        $timeset = date_default_timezone_set('Asia/Dhaka');
        $cnt = $request->cnt;
        $savecnt = 0;
        for($i=1;$i<=$cnt;$i++){
            $tableObject = new StudentHealth();
            $curid = (int)$request->{"id".$i};
            if($curid!=0){
                $tableObject = $tableObject->find($curid);
            }
            $tableObject->year = $request->year;
            $tableObject->upazila_name = $request->upazila_name;
            $tableObject->school_id = $request->school_id;
            $tableObject->class = $request->classname;
            $j = 0;
            foreach ($std_prop_array as $item_prop) {
                $j++;
                
                $tableObject->auto_id = $request->{"auto_id".$i};
                if($item_prop->inputType==6){
                    $myfile_location = "";
                    $myfile_location_public = "";
                    if($request->file($item_prop->sql.$i) != NULL){
                        $myfile = $request->file($item_prop->sql.$i);
                        $fileName = $item_prop->sql.$i."_".time()."__".date('Y_m_d').".".$myfile->getClientOriginalExtension();           
                        $myfile_location .= $file_upload_location.$fileName;
                        $myfile_location_public .= $file_upload_location.$fileName;
                        if(File::exists($myfile_location_public)) {
                            unlink($myfile_location_public);
                        }
                        $myfile->move($file_upload_location, $fileName);
                        $tableObject->{$item_prop->sql} = $myfile_location;           
                    }
                }
                else
                {
                   
                     $tableObject->{$item_prop->sql} = $request->{$item_prop->sql.$i};
                     if($j>3){
                        $tableObject->{$item_prop->sql."_remark"} = $request->{$item_prop->sql."_remark".$i};
                     }
                }
               
            }
            if($tableObject->save())
                $savecnt++;
        }
        
        if($savecnt==$cnt)
        {
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentHealth  $studentHealth
     * @return \Illuminate\Http\Response
     */
    public function show(StudentHealth $studentHealth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentHealth  $studentHealth
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentHealth $studentHealth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentHealth  $studentHealth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentHealth $studentHealth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentHealth  $studentHealth
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentHealth $studentHealth)
    {
        //
    }
}
