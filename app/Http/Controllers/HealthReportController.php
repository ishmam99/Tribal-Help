<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class HealthReportController extends Controller
{
    public function student()
    {
        $upazilas = DB::table('upazilas')->get();
        $schools = DB::table('users')->where('usertype', 1)->get();
        $sessions = ['২০০০', '২০০১', '২০০২', '২০০৩', '২০০৪', '২০০৫', '২০০৬', '২০০৭', '২০০৮', '২০০৯', '২০১০', '২০১১', '২০১২', '২০১৩', '২০১৪', '২০১৫', '২০১৬', '২০১৭', '২০১৮', '২০১৯', '২০২০', '২০২১', '২০২২', '২০২৩', '২০২৪', '২০২৫', '২০২৬', '২০২৭', '২০২৮', '২০২৯', '২০৩০'];

        return view('report.search', compact('upazilas', 'schools', 'sessions'));
    }

    //Individual Student Report Generate
    public function report(Request $request)
    {

        $student = DB::table('students')
            ->join('users', 'students.school_id', 'users.id')
            ->select('students.*', 'users.name as school',)
            ->where([['session', $request->session], ['students.upazila_name', $request->upazila], ['section', $request->section], ['school_id', $request->school], ['classname', $request->class], ['class_roll', $request->roll]])
            ->first();

        $healths = DB::table('student_healths')->where('auto_id', $student->id)->get();

        $pdf = \PDF::loadView('report', compact('healths', 'student'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 1000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->download('a.pdf');
    }

    //Show Line Chart Report filtering page
    public function reportShow()
    {
        $upazilas = DB::table('upazilas')->get();


        return view('report.report_view', compact('upazilas'));
    }

    //Show Upazila Page
    public function upazilaShow()
    {
        $upazilas = DB::table('upazilas')->get();


        return view('report.upazila', compact('upazilas'));
    }
    //Show Calendar Page
    public function calendarShow()
    {
        $upazilas = DB::table('upazilas')->get();
        return view('report.calendar', compact('upazilas'));
    }
    //Show School Page
    public function schoolShow()
    {
        $upazilas = DB::table('upazilas')->get();
        $schools = DB::table('users')->where('usertype', 1)->get();
        return view('report.school', compact('upazilas'));
    }
    //Show Age Page
    public function ageShow()
    {

        return view('report.age');
    }

    //Print the line chart report 
    public function graphReport(Request $request)
    {
        $test = 0;
        $years = [];
        if ($request->disease == null) {
            $test = 1;
            for ($i = bn2en($request->year_from); $i <= bn2en($request->year_to); $i++) {
                $year = [];

                $neat_clean_all = $this->check('neat_clean', $i, $request->upazila, $request->school);
                if ($neat_clean_all->count() == 0) {
                    $neat_clean = 0;
                } else {
                    $neat_clean = $neat_clean_all->sum('neat_clean') / $neat_clean_all->count();
                }

                $muac_all = $this->check('muac', $i, $request->upazila, $request->school);
                if ($muac_all->count() == 0)
                    $muac = 0;
                else
                    $muac = $muac_all->sum('muac') / $muac_all->count();

                $skin_disease_all = $this->check('skin_disease', $i, $request->upazila, $request->school);
                if ($skin_disease_all->count() == 0)
                    $skin_disease = 0;
                else
                    $skin_disease = $skin_disease_all->sum('skin_disease') / $skin_disease_all->count();

                $cough_all = $this->check('cough', $i, $request->upazila, $request->school);
                if ($cough_all->count() == 0)
                    $cough = 0;
                else
                    $cough = $cough_all->sum('cough') / $cough_all->count();

                $asthma_all = $this->check('asthma', $i, $request->upazila, $request->school);
                if ($asthma_all->count() == 0)
                    $asthma = 0;
                else
                    $asthma = $asthma_all->sum('asthma') / $asthma_all->count();

                $diarrhoea_all = $this->check('diarrhoea', $i, $request->upazila, $request->school);
                if ($diarrhoea_all->count() == 0)
                    $diarrhoea = 0;
                else
                    $diarrhoea = $diarrhoea_all->sum('diarrhoea') / $diarrhoea_all->count();

                $jaundice_all = $this->check('jaundice', $i, $request->upazila, $request->school);
                if ($jaundice_all->count() == 0)
                    $jaundice = 0;
                else
                    $jaundice = $jaundice_all->sum('jaundice') / $jaundice_all->count();

                $infection_all = $this->check('infection', $i, $request->upazila, $request->school);
                if ($infection_all->count() == 0)
                    $infection = 0;
                else
                    $infection = $infection_all->sum('infection') / $infection_all->count();

                $epi_tt_all = $this->check('epi_tt', $i, $request->upazila, $request->school);
                if ($epi_tt_all->count() == 0)
                    $epi_tt = 0;
                else
                    $epi_tt = $epi_tt_all->sum('epi_tt') / $epi_tt_all->count();

                $eye_test_all = $this->check('eye_test', $i, $request->upazila, $request->school);
                if ($eye_test_all->count() == 0)
                    $eye_test = 0;
                else
                    $eye_test = $eye_test_all->sum('eye_test') / $eye_test_all->count();

                $anemia_all = $this->check('neat_clean', $i, $request->upazila, $request->school);
                if ($anemia_all->count() == 0)
                    $anemia = 0;
                else
                    $anemia = $anemia_all->sum('anemia') / $anemia_all->count();

                $pulse_all = $this->check('pulse', $i, $request->upazila, $request->school);
                if ($pulse_all->count() == 0)
                    $pulse = 0;
                else
                    $pulse = $pulse_all->sum('pulse') / $pulse_all->count();


                $years['পরিষ্কার পরিছন্নতাঃ'][$i] = $neat_clean;
                $years['পুষ্টিগত অবস্থানঃ'][$i]  = $muac;
                $years['চর্ম রোগঃ'][$i] = $skin_disease;
                $years['কাশিঃ'][$i] = $cough;
                $years['হাঁপানিঃ'][$i] = $asthma;
                $years['ডায়ারিয়াঃ'][$i] = $diarrhoea;
                $years['জন্ডিসঃ'][$i] = $jaundice;
                $years['সংক্রমণঃ'][$i] = $infection;
                $years['ইপিআই ও টি.টিঃ'][$i] = $epi_tt;
                $years['দৃষ্টি পরীক্ষাঃ'][$i] = $eye_test;
                $years['রক্তশূন্যতাঃ'][$i] = $anemia;
                $years['পালস ও হার্ট বিটঃ'][$i] = $pulse;
                // $years[$i] = $year;
            }
        } else {
            $test = 2;

            for ($i = bn2en($request->year_from); $i <= bn2en($request->year_to); $i++) {
                if ($request->school == null) {
                    if ($request->upazila == null) {
                        $year = DB::table('student_healths')->where('year', en2bn($i))->where($request->disease, '>', 0)->get($request->disease);
                        $students = DB::table('student_healths')->count();
                    } else {
                        $year = DB::table('student_healths')->where([['year', en2bn($i)], ['upazila_name', $request->upazila]])->where($request->disease, '>', 0)->get($request->disease);
                        $students = DB::table('student_healths')->where('upazila_name', $request->upazila)->count();
                    }
                } else {
                    $year = DB::table('student_healths')->where([['year', en2bn($i)], ['upazila_name', $request->upazila], ['school_id', $request->school]])->where($request->disease, '>', 0)->get($request->disease);
                    $school = DB::table('users')->where('id', $request->school)->first()->name;
                    $students = DB::table('student_healths')->where('school_id', $request->school)->count();
                }


                $count = $year->where($request->disease, '>', 0)->count();

                $sum = $year->where($request->disease, '>', 0)->sum($request->disease);
                $check[] = $sum;
                $check[] = $count;
                if ($count == 0) {
                    $avg = 0;
                } else {
                    $avg = $sum / $count;
                }
                //   dd($year);
                // $check[] = $avg;
                // $year = $year->where($request->disease,'>',0)->get($request->disease);
                $years[$i] =  $avg;
            }
        }
        $disease = $request->disease;

        $name = "উপজেলা";
        $value = $request->upazila;
        if ($request->school != null) {
            $school = DB::table('users')->where('id', $request->school)->first()->name;
        } else $school = null;
        if ($request->upazila == null) {

            $students = DB::table('student_healths')->count();
        } elseif ($request->school != null) {

            $students = DB::table('student_healths')->where('school_id', $request->school)->count();
        } else {

            $students = DB::table('student_healths')->where('upazila_name', $request->upazila)->count();
        }


        // dd($years);
        if ($test == 2) {

            $disease = $this->disease($request->disease);
            return view('report.line_chart_single', compact('students', 'name', 'disease', 'value', 'years', 'school'));
        } else
            return view('report.line_chart', compact('students', 'name', 'value', 'years', 'school'));
    }
    ///end line chart report printing



    //Age filtered Report
    public function ageReport(Request $request)
    {



        $disease = $request->disease;
        $disease_bn = $this->disease($request->disease);
        return view('report.age_report', compact('disease', 'disease_bn'));
    }

    //School  Filtered Report
    public function schoolReport(Request $request)
    {
        $schools = DB::table('users')->where('upazila_name', $request->upazila)->where('usertype', 1)->get();
        $disease['neat_clean'] = 'পরিষ্কার পরিচ্ছন্নতা';

        $disease['muac'] = 'পুষ্টিগত অবস্থান';

        $disease['skin_disease'] = 'চর্ম রোগ';
        $disease['cough'] = 'কাশি';
        $disease['asthma'] = 'হাঁপানি';
        $disease['diarrhoea'] = 'ডায়ারিয়া';
        $disease['jaundice'] = 'জন্ডিস';
        $disease['infection'] = 'সংক্রমণ';
        $disease['epi_tt'] = 'ইপিআই টি.টি';
        $disease['eye_test'] = 'দৃষ্টি পরীক্ষা';
        $disease['anemia'] = 'রক্তশূন্যতা';
        $disease['pulse'] = 'পালস ও হার্ট বিটঃ';
        $upazila = $request->upazila;
        return view('report.school_report', compact('schools', 'disease','upazila'));
    }

    //Upazila Report
    public function upazilaReport(Request $request)
    {
        $upazilas = DB::table('upazilas')->get('name');

        if ($request->disease == null) {
            $disease_check = 1;
            $disease['neat_clean'] = 'পরিষ্কার পরিচ্ছন্নতা';

            $disease['muac'] = 'পুষ্টিগত অবস্থান';

            $disease['skin_disease'] = 'চর্ম রোগ';
            $disease['cough'] = 'কাশি';
            $disease['asthma'] = 'হাঁপানি';
            $disease['diarrhoea'] = 'ডায়ারিয়া';
            $disease['jaundice'] = 'জন্ডিস';
            $disease['infection'] = 'সংক্রমণ';
            $disease['epi_tt'] = 'ইপিআই টি.টি';
            $disease['eye_test'] = 'দৃষ্টি পরীক্ষা';
            $disease['anemia'] = 'রক্তশূন্যতা';
            $disease['pulse'] = 'পালস ও হার্ট বিটঃ';
        } else {
            $disease_check = 2;
            $disease[] = $this->disease($request->disease);
            $disease[] = $request->disease;
        }


        return view('report.upazila_report', compact('upazilas', 'disease', 'disease_check'));
    }


    //Calendar Year Filtered Report
    public function calendarReport(Request $request)
    {
        $upazilas = DB::table('upazilas')->get('name');
        if ($request->disease == null) {
            $disease_check = 1;
            $disease['neat_clean'] = 'পরিষ্কার পরিচ্ছন্নতা';

            $disease['muac'] = 'পুষ্টিগত অবস্থান';

            $disease['skin_disease'] = 'চর্ম রোগ';
            $disease['cough'] = 'কাশি';
            $disease['asthma'] = 'হাঁপানি';
            $disease['diarrhoea'] = 'ডায়ারিয়া';
            $disease['jaundice'] = 'জন্ডিস';
            $disease['infection'] = 'সংক্রমণ';
            $disease['epi_tt'] = 'ইপিআই টি.টি';
            $disease['eye_test'] = 'দৃষ্টি পরীক্ষা';
            $disease['anemia'] = 'রক্তশূন্যতা';
            $disease['pulse'] = 'পালস ও হার্ট বিটঃ';
        } else {
            $disease_check = 2;
            $disease[] = $this->disease($request->disease);
            $disease[] = $request->disease;
        }
        $value = $request->year;
        $students = DB::table('student_healths')->where('year', $request->year)->get();
        return view('report.calendar_report', compact('disease', 'upazilas', 'disease_check', 'value'));
    }



    //Custom  fucntion to get 5 year data for a Student-Health Collection
    public function destructure($students)
    {
        $neat_clean = [];
        $muac = [];
        $skin_disease = [];
        $cough = [];
        $asthma = [];
        $diarrhoea = [];
        $jaundice = [];
        $infection = [];
        $epi_tt = [];
        $eye_test = [];
        $anemia = [];
        $pulse = [];
        $overall = [];
        $years = [];
        for ($year = now()->format('Y') - 4; $year <= now()->format('Y'); $year++) {
            $neat_clean[] =  $students->where('neat_clean', '!=', 0)->where('neat_clean', '!=', null)->where('year', en2bn($year))->count();
            $muac[] =  $students->where('muac', '!=', 0)->where('muac', '!=', null)->where('year', en2bn($year))->count();
            $skin_disease[] =  $students->where('skin_disease', '!=', 0)->where('skin_disease', '!=', null)->where('year', en2bn($year))->count();
            $cough[] =  $students->where('cough', '!=', 0)->where('cough', '!=', null)->where('year', en2bn($year))->count();
            $asthma[] =  $students->where('asthma', '!=', 0)->where('asthma', '!=', null)->where('year', en2bn($year))->count();
            $diarrhoea[] =  $students->where('diarrhoea', '!=', 0)->where('diarrhoea', '!=', null)->where('year', en2bn($year))->count();
            $jaundice[] =  $students->where('jaundice', '!=', 0)->where('jaundice', '!=', null)->where('year', en2bn($year))->count();
            $infection[] =  $students->where('infection', '!=', 0)->where('infection', '!=', null)->where('year', en2bn($year))->count();
            $epi_tt[] =  $students->where('epi_tt', '!=', 0)->where('epi_tt', '!=', null)->where('year', en2bn($year))->count();
            $eye_test[] =  $students->where('eye_test', '!=', 0)->where('eye_test', '!=', null)->where('year', en2bn($year))->count();
            $anemia[] =  $students->where('anemia', '!=', 0)->where('anemia', '!=', null)->where('year', en2bn($year))->count();
            $pulse[] =  $students->where('pulse', '!=', 0)->where('pulse', '!=', null)->where('year', en2bn($year))->count();
            $overall[] =  $students->where('overall', '!=', 0)->where('overall', '!=', null)->where('year', en2bn($year))->count();
            $years[] = $year;
        }
        $all = [$years, $neat_clean, $muac, $skin_disease, $cough, $asthma, $diarrhoea, $jaundice, $infection, $epi_tt, $eye_test, $anemia, $pulse, $overall];

        return $all;
    }
    //end custom

    //School List for Specific Upazila Ajax Call
    public function schoolList($id)
    {
        $schools = DB::table('users')->where('upazila_name', $id)->where('usertype', 1)->get();

        return json_encode($schools);
    }
    //end ajax

    //Disease Bangla name function
    public function disease($name)
    {

        switch ($name) {
            case "neat_clean":
                return 'পরিষ্কার পরিচ্ছন্নতা';
                break;
            case "muac":
                return 'পুষ্টিগত অবস্থান';
                break;
            case "skin_disease":
                return 'চর্ম রোগ';
                break;
            case "cough":
                return 'কাশি';
                break;
            case "asthma":
                return 'হাঁপানি';
                break;
            case "diarrhoea":
                return 'ডায়ারিয়া';
                break;
            case "jaundice":
                return 'জন্ডিস';
                break;
            case "infection":
                return 'সংক্রমণ';
                break;
            case "epi_tt":
                return 'ইপিআই টি.টি';
                break;
            case "eye_test":
                return 'দৃষ্টি পরীক্ষা';
                break;
            case "anemia":
                return 'রক্তশূন্যতা';
                break;
            case "pulse":
                return 'পালস ও হার্ট বিট';
                break;
        }
    }
    //end name function

    //Custom Null request check for filtering
    public function check($disease, $year, $upazila, $school)
    {
        if ($school == null) {
            if ($upazila == null) {
                $year_data = DB::table('student_healths')->where('year', en2bn($year))->where($disease, '>', 0)->get($disease);
            } else {
                $year_data = DB::table('student_healths')->where([['year', en2bn($year)], ['upazila_name', $upazila]])->where($disease, '>', 0)->get($disease);
            }
        } else {
            $year_data = DB::table('student_healths')->where([['year', en2bn($year)], ['upazila_name', $upazila], ['school_id', $school]])->where($disease, '>', 0)->get($disease);
        }
        return $year_data;
    }
    //end

    public function dangerZone()
    {
        return view('report.danger-zone');
    }
    public function areaDanger()
    {
        $upazilas = DB::table('upazilas')->get('name');
        return view('report.area',compact('upazilas'));
    }
    public function schoolDanger()
    {
       
        $upazilas = DB::table('upazilas')->get('name');
        return view('report.school_danger',compact('upazilas'));
    }
    public function ageDanger()
    {
      
        return view('report.age_danger');
    }
    
    public function areaDangerReport(Request $request)
    {
        $students =DB::table('student_healths')->where([['year', en2bn($request->year)], ['upazila_name', $request->upazila]])->get();
        $diseases = [];
        if($students->isEmpty())
        return back()->with('danger','no data');
        $diseases['পরিষ্কার পরিচ্ছন্নতা'] =round(($students->where('neat_clean','<','3')->where('neat_clean', '!=', null)->count()/ $students->count())*100,1);
        $diseases['পুষ্টিগত অবস্থান'] = round(($students->where('muac','<','3')->where('muac', '!=',null)->count()/ $students->count())*100,1);
        $diseases['চর্ম রোগ'] = round(($students->where('skin_disease','<','3')->where('skin_disease','!=',null)->count()/ $students->count())*100,1);
        $diseases['কাশি'] = round(($students->where('cough','<','3')->where('cough','!=',null)->count()/ $students->count())*100,1);
        $diseases['হাঁপানি'] = round(($students->where('asthma','<','3')->where('asthma', '!=', null)->count()/ $students->count())*100,1);
        $diseases['ডায়ারিয়া'] = round(($students->where('diarrhoea','<','3')->where('diarrhoea', '!=',null)->count()/ $students->count())*100,1);
        $diseases['জন্ডিস']= round(($students->where('jaundice','<','3')->where('jaundice', '!=',null)->count()/ $students->count())*100,1);
        $diseases['সংক্রমণ'] = round(($students->where('infection','<','3')->where('infection', '!=',null)->count()/ $students->count())*100,1);
        $diseases['ইপিআই টি.টি'] = round(($students->where('epi_tt','<','3')->where('epi_tt', '!=',null)->count()/ $students->count())*100,1);
        $diseases['দৃষ্টি পরীক্ষা'] = round(($students->where('eye_test','<','3')->where('eye_test', '!=',null)->count()/ $students->count())*100,1);
        $diseases['রক্তশূন্যতা'] = round(($students->where('anemia','<','3')->where('anemia', '!=', null)->count()/ $students->count())*100,1);
        $diseases['পালস ও হার্ট বিট'] = round(($students->where('pulse','<','3')->where('pulse', '!=', null)->count()/ $students->count())*100,1);
        arsort($diseases);
        // dd($diseases);
            $area = $request->upazila;
            $year = $request->year;
        return view('report.danger_area_report',compact('diseases','year','area'));
    }
    public function ageDangerReport(Request $request)
    {
        $students =DB::table('student_healths')->where([['year', en2bn($request->year)], ['age', $request->age]])->get();
        $diseases = [];
        if($students->isEmpty())
        return back()->with('danger','no data');
        $diseases['পরিষ্কার পরিচ্ছন্নতা'] =round(($students->where('neat_clean','<','3')->where('neat_clean', '!=', null)->count()/ $students->count())*100,1);
        $diseases['পুষ্টিগত অবস্থান'] = round(($students->where('muac','<','3')->where('muac', '!=',null)->count()/ $students->count())*100,1);
        $diseases['চর্ম রোগ'] = round(($students->where('skin_disease','<','3')->where('skin_disease','!=',null)->count()/ $students->count())*100,1);
        $diseases['কাশি'] = round(($students->where('cough','<','3')->where('cough','!=',null)->count()/ $students->count())*100,1);
        $diseases['হাঁপানি'] = round(($students->where('asthma','<','3')->where('asthma', '!=', null)->count()/ $students->count())*100,1);
        $diseases['ডায়ারিয়া'] = round(($students->where('diarrhoea','<','3')->where('diarrhoea', '!=',null)->count()/ $students->count())*100,1);
        $diseases['জন্ডিস']= round(($students->where('jaundice','<','3')->where('jaundice', '!=',null)->count()/ $students->count())*100,1);
        $diseases['সংক্রমণ'] = round(($students->where('infection','<','3')->where('infection', '!=',null)->count()/ $students->count())*100,1);
        $diseases['ইপিআই টি.টি'] = round(($students->where('epi_tt','<','3')->where('epi_tt', '!=',null)->count()/ $students->count())*100,1);
        $diseases['দৃষ্টি পরীক্ষা'] = round(($students->where('eye_test','<','3')->where('eye_test', '!=',null)->count()/ $students->count())*100,1);
        $diseases['রক্তশূন্যতা'] = round(($students->where('anemia','<','3')->where('anemia', '!=', null)->count()/ $students->count())*100,1);
        $diseases['পালস ও হার্ট বিট'] = round(($students->where('pulse','<','3')->where('pulse', '!=', null)->count()/ $students->count())*100,1);
        arsort($diseases);
        // dd($diseases);
            $age = $request->age;
            $year = $request->year;
        return view('report.danger_age_report',compact('diseases','year','age'));
    }
    public function schoolDangerReport(Request $request)
    {
        $students =DB::table('student_healths')->where([['year', en2bn($request->year)], ['school_id', $request->school]])->get();
        $diseases = [];
        if($students->isEmpty()){
            $diseases['পরিষ্কার পরিচ্ছন্নতা'] = 0;
            $diseases['পুষ্টিগত অবস্থান'] = 0;
            $diseases['চর্ম রোগ'] = 0;
            $diseases['কাশি'] =0;
            $diseases['হাঁপানি'] = 0;
            $diseases['ডায়ারিয়া'] = 0;
            $diseases['জন্ডিস'] = 0;
            $diseases['সংক্রমণ'] =0;
            $diseases['ইপিআই টি.টি'] =0;
            $diseases['দৃষ্টি পরীক্ষা'] =0;
            $diseases['রক্তশূন্যতা'] = 0;
            $diseases['পালস ও হার্ট বিট'] = 0;
        }
       else{
        $diseases['পরিষ্কার পরিচ্ছন্নতা'] =round(($students->where('neat_clean','<','3')->where('neat_clean', '!=', null)->count()/ $students->count())*100,1);
        $diseases['পুষ্টিগত অবস্থান'] = round(($students->where('muac','<','3')->where('muac', '!=',null)->count()/ $students->count())*100,1);
        $diseases['চর্ম রোগ'] = round(($students->where('skin_disease','<','3')->where('skin_disease','!=',null)->count()/ $students->count())*100,1);
        $diseases['কাশি'] = round(($students->where('cough','<','3')->where('cough','!=',null)->count()/ $students->count())*100,1);
        $diseases['হাঁপানি'] = round(($students->where('asthma','<','3')->where('asthma', '!=', null)->count()/ $students->count())*100,1);
        $diseases['ডায়ারিয়া'] = round(($students->where('diarrhoea','<','3')->where('diarrhoea', '!=',null)->count()/ $students->count())*100,1);
        $diseases['জন্ডিস']= round(($students->where('jaundice','<','3')->where('jaundice', '!=',null)->count()/ $students->count())*100,1);
        $diseases['সংক্রমণ'] = round(($students->where('infection','<','3')->where('infection', '!=',null)->count()/ $students->count())*100,1);
        $diseases['ইপিআই টি.টি'] = round(($students->where('epi_tt','<','3')->where('epi_tt', '!=',null)->count()/ $students->count())*100,1);
        $diseases['দৃষ্টি পরীক্ষা'] = round(($students->where('eye_test','<','3')->where('eye_test', '!=',null)->count()/ $students->count())*100,1);
        $diseases['রক্তশূন্যতা'] = round(($students->where('anemia','<','3')->where('anemia', '!=', null)->count()/ $students->count())*100,1);
        $diseases['পালস ও হার্ট বিট'] = round(($students->where('pulse','<','3')->where('pulse', '!=', null)->count()/ $students->count())*100,1);
       }
        arsort($diseases);
            $upazila = $request->upazila;
            $school = DB::table('users')->where('id',$request->school)->first()->name;
            $year = $request->year;
        return view('report.danger_school_report',compact('diseases','year','school','upazila'));
    }
    
    public function dangerZoneList(Request $request)
    {
        $disease = $this->disease($request->disease);
        $students  = DB::table('student_healths')
            ->join('students', 'student_healths.auto_id', '=', 'students.id')
            ->join('users','student_healths.school_id','=','users.id')
            ->select('students.*','users.name')
            ->where([['year', en2bn(now()->format('Y'))], [$request->disease, 1]])->get();
   
        return view('report.danger-zone-report',compact('students','disease'));
    }
}
