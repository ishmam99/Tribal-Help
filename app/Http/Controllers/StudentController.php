<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Classes\PropClass;
use DB;
use File;
use Session;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users;
        if(Session::get('type')==99)
        $users = DB::table('students')->where('id','<',100500)->where('status', '=', 1)->get();
        else
        {
            $uid = Session::get('userid');
            $users = DB::table('students')->where('school_id', '=', $uid)->where('status', '=', 1)->get();
        
        }
       // dd($users);
        $propclass = new PropClass();
        $user_prop_array = $propclass->getStudentsInfo();
        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');
        return view('studentinfo.list',[
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
        $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();
        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentsInfo();
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

    $optionArray["session"]='
                        <option value="">সেশন বাছাই করুন</option>
                        <option value="২০১৮">২০১৮</option>
                        <option value="২০১৯">২০১৯</option>
                        <option value="২০২০">২০২০</option>
                        <option value="২০২১">২০২১</option>
                        <option value="২০২২">২০২২</option>
                        <option value="২০২৩">২০২৩</option>
                        ';
    $optionArray["religion"]='
                        <option value="">ধর্ম বাছাই করুন</option>
                        <option value="ইসলাম">ইসলাম</option>
                        <option value="হিন্দু">হিন্দু</option>
                        <option value="বৌদ্ধ">বৌদ্ধ</option>
                        <option value="খ্রিস্টিয়ান">খ্রিস্টিয়ান</option>
                        ';
    $optionArray["gender"]='
                        <option value="">লিঙ্গ বাছাই করুন</option>
                        <option value="পুরুষ">পুরুষ</option>
                        <option value="নারী">নারী</option>
                        ';
    $optionArray["nationality"]='
                        <option value="বাংলাদেশি">বাংলাদেশি</option>
                        ';
    $optionArray["bloodgroup"]='
                         <option value="">রক্তের গ্রুপ বাছাই করুন</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        ';
    $optionArray["marital_status"]='
                        <option value="অবিবাহিত">অবিবাহিত</option>
                        <option value="বিবাহিত">বিবাহিত</option>
                        ';
    $optionArray["status"]='
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        ';

        return view('studentinfo.create',[
            'schooladmin'=>$schooladmin,
            'schoolinfo'=>$schoolinfo,
            'users'=>$users,
            'daydate'=>$daydate,
            'std_prop_array'=>$std_prop_array,
            'input_type_array'=>$input_type_array,
            'optionArray'=>$optionArray,
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
        $std_prop_array = $propclass->getStudentsInfo();
        $input_type_array = $propclass->getInputType();

        $file_upload_location = "uploadfile/";
        $timeset = date_default_timezone_set('Asia/Dhaka');
        $tableObject = new Student();
        foreach ($std_prop_array as $item_prop) {
            if($item_prop->inputType==6){
                $myfile_location = "";
                $myfile_location_public = "";
                if($request->file($item_prop->sql) != NULL){
                    $myfile = $request->file($item_prop->sql);
                    $fileName = $item_prop->sql."_".time()."__".date('Y_m_d').".".$myfile->getClientOriginalExtension();           
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
                if($item_prop->sql=="password"){
                    $tableObject->password = md5($request->password);
                    $tableObject->realpassword = $request->password;
                }
                else
                    $tableObject->{$item_prop->sql} = $request->{$item_prop->sql};
                }
           
        }
        
        if($tableObject->save())
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $schoolinfo = new User();
        $schooladmin = false;
        if(Session::get('type')!=99){
            $uid = Session::get('userid');
            $schooladmin = true;
            $schoolinfo = $schoolinfo->select('id','upazila_name')->find($uid);
        }
         $cur_std = DB::table('students')
        ->distinct()
        ->where('id', '=', $id)
        ->first();
         $users = new User();
        $users = $users->where('is_delete','=',0)->where('status', '=', 1)->get();
        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentsInfo();
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

    $optionArray["session"]='
                        <option value="">সেশন বাছাই করুন</option>
                        <option value="২০১৮">২০১৮</option>
                        <option value="২০১৯">২০১৯</option>
                        <option value="২০২০">২০২০</option>
                        <option value="২০২১">২০২১</option>
                        <option value="২০২২">২০২২</option>
                        <option value="২০২৩">২০২৩</option>
                        ';
    $optionArray["religion"]='
                        <option value="">ধর্ম বাছাই করুন</option>
                        <option value="ইসলাম">ইসলাম</option>
                        <option value="হিন্দু">হিন্দু</option>
                        <option value="বৌদ্ধ">বৌদ্ধ</option>
                        <option value="খ্রিস্টিয়ান">খ্রিস্টিয়ান</option>
                        ';
    $optionArray["gender"]='
                        <option value="">লিঙ্গ বাছাই করুন</option>
                        <option value="পুরুষ">পুরুষ</option>
                        <option value="নারী">নারী</option>
                        ';
    $optionArray["nationality"]='
                        <option value="বাংলাদেশি">বাংলাদেশি</option>
                        ';
    $optionArray["bloodgroup"]='
                         <option value="">রক্তের গ্রুপ বাছাই করুন</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        ';
    $optionArray["marital_status"]='
                        <option value="অবিবাহিত">অবিবাহিত</option>
                        <option value="বিবাহিত">বিবাহিত</option>
                        ';
    $optionArray["status"]='
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        ';

        return view('studentinfo.edit',[
            'cur_std'=>$cur_std,
            'schooladmin'=>$schooladmin,
            'schoolinfo'=>$schoolinfo,
            'users'=>$users,
            'daydate'=>$daydate,
            'std_prop_array'=>$std_prop_array,
            'input_type_array'=>$input_type_array,
            'optionArray'=>$optionArray,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentsInfo();
        $input_type_array = $propclass->getInputType();

        $file_upload_location = "uploadfile/";
        $timeset = date_default_timezone_set('Asia/Dhaka');
        $tableObject = new Student();
        $tableObject = $tableObject->find($id);
        foreach ($std_prop_array as $item_prop) {
            if($item_prop->inputType==6){
                $myfile_location = "";
                $myfile_location_public = "";
                if($request->file($item_prop->sql) != NULL){
                    $myfile = $request->file($item_prop->sql);
                    $fileName = $item_prop->sql."_".time()."__".date('Y_m_d').".".$myfile->getClientOriginalExtension();           
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
                if($item_prop->sql=="password"){
                    $tableObject->password = md5($request->password);
                    $tableObject->realpassword = $request->password;
                }
                else
                    $tableObject->{$item_prop->sql} = $request->{$item_prop->sql};
                }
           
        }
        
        if($tableObject->save())
        {
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
