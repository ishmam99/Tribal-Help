<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentHealth;
use App\Models\Student;
use App\Models\User;
use App\Classes\PropClass;
use Session;
use DB;


class AjaxController extends Controller
{
    public function getSchools($upazila)
    {
        // TO DO
        $schools;
        if(Session::get('type')==99){
        	$schools =  DB::table('users')
            ->select('id','name')
            ->distinct()
            ->where('upazila_name', '=', $upazila)
            ->where('usertype', '=', 1)
            ->get();
          
        }
        else{
            $uid = Session::get('userid');
            $schools =  DB::table('users')
            ->select('id','name')
            ->distinct()
            ->where('id', '=', $uid)
            ->get();
        }
          return response()->json([
                'schools' => $schools
            ]);

    }

    public function getStudents($year,$upazila_name, $school_id, $classname,$section,$session)
    {
    	$students =  DB::table('students')
        ->where('upazila_name', '=', $upazila_name)
        ->where('session', '=', $session)
        ->where('school_id', '=', $school_id)
        ->where('classname', '=', $classname)
        ->where('section', '=', $section)
        ->where('status', '=', 1)
        ->get();
        
        $healtharray = array();
        $healthdatas = DB::table('student_healths')
        ->where('year', '=', $year)
        ->where('upazila_name', '=', $upazila_name)
        ->where('school_id', '=', $school_id)
        ->get();
        foreach ($healthdatas as $data) {
            $healtharray[$data->auto_id] = $data;
        }
     //   dd($healtharray);

        $propclass = new PropClass();
        $stdhealth_prop_array = $propclass->getStudentHealth();
        $input_type_array = $propclass->getInputType();

		$optionArray = array();
        $optionArray["yesno"]='
                            <option value="0">No</option>
                            <option value="1">1(Worse)</option>
                            <option value="2">2(Bad)</option>
                            <option value="3">3(Good)</option>
                            <option value="4">4(Very Good)</option>
                            ';

    	$tableText = '<table style="table-layout:fixed; width: 300%;" class="align-middle table table-borderless table-striped" >
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th style="width:200px;" class="text-center">আইডি</th>
                                <th style="width:200px;" class="text-center">নাম</th>';

                                foreach ($stdhealth_prop_array as $item_prop)
                        		{
                              	  $tableText = $tableText.'<th style="width:200px;" class="text-center">'.$item_prop->name.'</th>';
                               	} 
                                $tableText = $tableText.'
	                            </tr>
	                        </thead>
	                        <tbody>';
                            $i=1;
                            foreach ($students as $student){
                                if(isset($healtharray[$student->id])){
                                $tableText = $tableText.'<tr>

                                    <td class="text-center text-muted"><input type="hidden"  value="'.count($students).'" name="cnt"/>'.$i.'</td>
                                    <td class="text-center"><input type="hidden"  value="'.$student->id.'" name="auto_id'.$i.'"/>'.$student->id.'</td>
                                    <td class="text-center"><input type="hidden"  value="'.$healtharray[$student->id]->id.'" name="id'.$i.'"/>'.$student->bangla_name.'</td>';
                                    $j = 0;
                                     foreach ($stdhealth_prop_array as $item_prop){
                                     	$j++;
                                     $tableText = $tableText.'<td class="text-center text-muted">';
                                          if($item_prop->inputType>=0&&$item_prop->inputType<=3){
                                             $tableText = $tableText.'<div class="col-md-12 col-12">
                                                <div class="form-group">
                                                 
                                                    <input type="'.$input_type_array[$item_prop->inputType].'" id="'.$item_prop->sql.$i.'"  class="form-control" value="'.$healtharray[$student->id]->{$item_prop->sql}.'" name="'.$item_prop->sql.$i.'"  >';
                                            if($j>3){
                                             $tableText = $tableText.'<input type="text" id="'.$item_prop->sql.'_remark'.$i.'"  placeholder="মন্তব্য"class="form-control" name="'.$item_prop->sql.'_remark'.$i.'"  >';
                                               $tableText = $tableText.'<div class="col-md-12 col-12">
                                                 <div class="form-group">
                                                        
                                                        <div class="input-group ">
                                                            <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="'.$item_prop->sql.'_file'.$i.'" name="'.$item_prop->sql.$i.'"    hidden/>                           
                                                            <input type="text" id="'.$item_prop->sql.'_file'.$i.'_choose" value="'.$item_prop->name.'" class="form-control rounded-0" style="height: 0;" disabled>
                                                            <label for="'.$item_prop->sql.'_file'.$i.'" class="btn theme_button rounded-0 py-2" style="height:36px">ফাইল</label>
                                                        </div>
                                                    </div>
                                            
                                            	</div>';   
                                        	}
                                            $tableText = $tableText.'</div>
                                            </div>';
                                        	}

                                            else if($item_prop->inputType==4){
                                             $tableText = $tableText.'<div class="col-md-12 col-12">
                                                <div class="form-group">
                                                   
                                                    <textarea  id="'.$item_prop->sql.$i.'" placeholder="'.$item_prop->name.'" class="form-control" name="'.$item_prop->sql.$i.'"  cols="5" rows="1" >'.$healtharray[$student->id]->{$item_prop->sql}.'</textarea>

                                                  
                                                </div>
                                            </div>';
                                        }
                                        //value="'.$healtharray[$student->id]->{$item_prop->sql}.'"


                                            else if($item_prop->inputType==5){
                                             
                                             $tableText = $tableText.'<select  id="'.$item_prop->sql.$i.'"  style="color:#312e2e" placeholder="'.$item_prop->name.'" class="form-control"  name="'.$item_prop->sql.$i.'"  > '.'<option value="'.$healtharray[$student->id]->{$item_prop->sql}.'">'.$healtharray[$student->id]->{$item_prop->sql}.'</option>'.$optionArray["yesno"].' </select>
                                             	<input type="text" id="'.$item_prop->sql.'_remark'.$i.'" placeholder="মন্তব্য" class="form-control" name="'.$item_prop->sql.'_remark'.$i.'"  >';

                                              $tableText = $tableText.'<div class="col-md-12 col-12">
                                                 <div class="form-group">
                                                        
                                                        <div class="input-group ">
                                                            <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="'.$item_prop->sql.'_file'.$i.'" name="'.$item_prop->sql.$i.'"    hidden/>                           
                                                            <input type="text" id="'.$item_prop->sql.'_file'.$i.'_choose" value="'.$item_prop->name.'" class="form-control rounded-0" style="height: 0;" disabled>
                                                            <label for="'.$item_prop->sql.'_file'.$i.'" class="btn theme_button rounded-0 py-2" style="height:36px">ফাইল</label>
                                                        </div>
                                                    </div>
                                            
                                            	</div>';     
                                               }
                                            else if($item_prop->inputType==6){
                                             $tableText = $tableText.'<div class="col-md-12 col-12">
                                                 <div class="form-group">
                                                        
                                                        <div class="input-group ">
                                                            <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="'.$item_prop->sql.$i.'" name="'.$item_prop->sql.$i.'"    hidden/>                           
                                                            <input type="text" id="'.$item_prop->sql.$i.'_choose" value="'.$item_prop->name.' বাছাই করুন" class="form-control rounded-0" style="height: 0;" disabled>
                                                            <label for="'.$item_prop->sql.$i.'" class="btn theme_button rounded-0 py-2" style="height:36px">'.$item_prop->name.' বাছাই করুন</label>
                                                        </div>
                                                    </div>
                                            
                                            	</div>';
                                            }
                                        $tableText = $tableText.'</td>';
                                    }
                                    
                                   
                                    $tableText = $tableText.'
                                </tr>';
                            }
                            else
                            {
                                 $tableText = $tableText.'<tr>

                                <td class="text-center text-muted"><input type="hidden"  value="'.count($students).'" name="cnt"/>'.$i.'</td>
                                <td class="text-center"><input type="hidden"  value="'.$student->id.'" name="auto_id'.$i.'"/>'.$student->id.'</td>
                                <td class="text-center"><input type="hidden"  value="0" name="id'.$i.'"/>'.$student->bangla_name.'</td>';
                                    
                                $j = 0;
                                 foreach ($stdhealth_prop_array as $item_prop){
                                    $j++;
                                 $tableText = $tableText.'<td class="text-center text-muted">';
                                      if($item_prop->inputType>=0&&$item_prop->inputType<=3){
                                         $tableText = $tableText.'<div class="col-md-12 col-12">
                                            <div class="form-group">
                                             
                                                <input type="'.$input_type_array[$item_prop->inputType].'" id="'.$item_prop->sql.$i.'"  class="form-control" name="'.$item_prop->sql.$i.'"  >';
                                        if($j>3){
                                         $tableText = $tableText.'<input type="text" id="'.$item_prop->sql.'_remark'.$i.'"  placeholder="মন্তব্য"class="form-control" name="'.$item_prop->sql.'_remark'.$i.'"  >';
                                           $tableText = $tableText.'<div class="col-md-12 col-12">
                                             <div class="form-group">
                                                    
                                                    <div class="input-group ">
                                                        <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="'.$item_prop->sql.'_file'.$i.'" name="'.$item_prop->sql.$i.'"    hidden/>                           
                                                        <input type="text" id="'.$item_prop->sql.'_file'.$i.'_choose" value="'.$item_prop->name.'" class="form-control rounded-0" style="height: 0;" disabled>
                                                        <label for="'.$item_prop->sql.'_file'.$i.'" class="btn theme_button rounded-0 py-2" style="height:36px">ফাইল</label>
                                                    </div>
                                                </div>
                                        
                                            </div>';   
                                        }
                                        $tableText = $tableText.'</div>
                                        </div>';
                                        }

                                        else if($item_prop->inputType==4){
                                         $tableText = $tableText.'<div class="col-md-12 col-12">
                                            <div class="form-group">
                                               
                                                <textarea  id="'.$item_prop->sql.$i.'" placeholder="'.$item_prop->name.'" class="form-control" name="'.$item_prop->sql.$i.'"  cols="5" rows="1" ></textarea>

                                              
                                            </div>
                                        </div>';
                                    }
                                        else if($item_prop->inputType==5){
                                         
                                         $tableText = $tableText.'<select  id="'.$item_prop->sql.$i.'"  style="color:#312e2e" placeholder="'.$item_prop->name.'" class="form-control" name="'.$item_prop->sql.$i.'"  > '. $optionArray["yesno"].' </select>
                                            <input type="text" id="'.$item_prop->sql.'_remark'.$i.'" placeholder="মন্তব্য" class="form-control" name="'.$item_prop->sql.'_remark'.$i.'"  >';

                                          $tableText = $tableText.'<div class="col-md-12 col-12">
                                             <div class="form-group">
                                                    
                                                    <div class="input-group ">
                                                        <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="'.$item_prop->sql.'_file'.$i.'" name="'.$item_prop->sql.$i.'"    hidden/>                           
                                                        <input type="text" id="'.$item_prop->sql.'_file'.$i.'_choose" value="'.$item_prop->name.'" class="form-control rounded-0" style="height: 0;" disabled>
                                                        <label for="'.$item_prop->sql.'_file'.$i.'" class="btn theme_button rounded-0 py-2" style="height:36px">ফাইল</label>
                                                    </div>
                                                </div>
                                        
                                            </div>';     
                                           }
                                        else if($item_prop->inputType==6){
                                         $tableText = $tableText.'<div class="col-md-12 col-12">
                                             <div class="form-group">
                                                    
                                                    <div class="input-group ">
                                                        <input type="file" accept=".jpg,.bmp,.png,.jpeg" id="'.$item_prop->sql.$i.'" name="'.$item_prop->sql.$i.'"    hidden/>                           
                                                        <input type="text" id="'.$item_prop->sql.$i.'_choose" value="'.$item_prop->name.' বাছাই করুন" class="form-control rounded-0" style="height: 0;" disabled>
                                                        <label for="'.$item_prop->sql.$i.'" class="btn theme_button rounded-0 py-2" style="height:36px">'.$item_prop->name.' বাছাই করুন</label>
                                                    </div>
                                                </div>
                                        
                                            </div>';
                                        }
                                    $tableText = $tableText.'</td>';
                                }
                                
                               
                                $tableText = $tableText.'
                            </tr>';
                            }
                            $i++;
                       	}
                           
                        $tableText = $tableText.'</tbody>
                    </table>  <div class="form-group mt-6 ">
                                    <button type="submit" class="button theme_button">সাবমিট করুন</button>
                                </div>';
        return response()->json([
            'tableText' => $tableText
        ]);
   }

}
