<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use App\Classes\PropClass;
use Illuminate\Http\Request;

class SqlQueryGenController extends Controller
{
/*  public function stdquery()
    {

        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentsInfo();
    	$tablename = "students";
        $querystring = "CREATE TABLE ".$tablename." ( id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY \n";
        $i=0;
        foreach ($std_prop_array as $table_prop) {
        	
        		if($table_prop->inputType==4)
        			$querystring= $querystring." , ".$table_prop->sql." VARCHAR(512) ";
        		else if($table_prop->sql."" == "status")
        			$querystring= $querystring." , ".$table_prop->sql."  tinyint(4) NOT NULL DEFAULT 1 ";
        		else
        			$querystring= $querystring." , ".$table_prop->sql." VARCHAR(255) ";
        
        }
        $querystring =$querystring." , created_at timestamp NULL DEFAULT current_timestamp() ";
        $querystring =$querystring." , updated_at timestamp NULL DEFAULT current_timestamp() );";

        return view('sql_gen_file',[
            'querystring'=>$querystring,
        ]);
    }*/
      public function stdquery()
    {

        $propclass = new PropClass();
        $std_prop_array = $propclass->getStudentHealth();
    	$tablename = "student_healths";
        $querystring = "CREATE TABLE ".$tablename." ( id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY \n";
        $i=0;
        foreach ($std_prop_array as $table_prop) {
        	
        	if($i>=5){
        	$querystring= $querystring." , ".$table_prop->sql." VARCHAR(255) ";
        	$querystring= $querystring." , ".$table_prop->sql."_remark VARCHAR(512) ";
        	$querystring= $querystring." , ".$table_prop->sql."_file VARCHAR(255) ";
            }
            else
            $querystring= $querystring." , ".$table_prop->sql." VARCHAR(255) ";
            
        	$i++;
        }
        $querystring =$querystring." , created_at timestamp NULL DEFAULT current_timestamp() ";
        $querystring =$querystring." , updated_at timestamp NULL DEFAULT current_timestamp() );";

        return view('sql_gen_file',[
            'querystring'=>$querystring,
        ]);
    }
}
