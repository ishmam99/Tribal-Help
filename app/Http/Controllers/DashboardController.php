<?php

namespace App\Http\Controllers;

use App\Models\DigitalContent;
use Illuminate\Http\Request;
use App\Models\Helprequest;
use App\Models\User;
use App\Models\Student;
use File;
use Session;

class DashboardController extends Controller
{
     public function dashboard()
    {
        // $stdcount = new Student();
        // $stdcount = $stdcount->where('status', '=', 1)->count();
        // $usercount = new User();
        // $usercount = $usercount->where('is_delete','=',0)->where('status', '=', 1)->count();
        // $schoolcount = new User();
        // $schoolcount = $schoolcount->where('is_delete','=',0)->where('status', '=', 1)->where('usertype','=',1)->count();
        // $helpobject = new Helprequest();
        // $helpcount = $helpobject->where('is_delete','=',0)->count();
        // $servedhelpcount = $helpobject->where('is_delete','=',0)->where('status', '=', 2)->count();
        // $applier = $helpobject->distinct()
        //     ->count('nid');
        //     $startday = date('Y-m-01');
        //     $today = date('Y-m-d');
        //     $month0 = date('Y-M',strtotime($today));
        //     $help_cnt_month_0 = $helpobject->where('is_delete','=',0)->whereBetween('application_date', [$startday,$today ])->count();

        //     $prev5monthstart = date('Y-m-01',strtotime( $startday. " - 5 months"));
        //     $prev5monthend = date('Y-m-t',strtotime( $startday. " - 5 months"));
        //     $help_cnt_month_5 = $helpobject->where('is_delete','=',0)->whereBetween('application_date', [$prev5monthstart,$prev5monthend] )->count();

        //     $prev4monthstart = date('Y-m-01',strtotime( $startday. " - 4 months"));
        //     $prev4monthend = date('Y-m-t',strtotime( $startday. " - 4 months"));
        //      $help_cnt_month_4 = $helpobject->where('is_delete','=',0)->whereBetween('application_date', [$prev4monthstart,$prev4monthend] )->count();

        //     $prev3monthstart = date('Y-m-01',strtotime( $startday. " - 3 months"));
        //     $prev3monthend = date('Y-m-t',strtotime( $startday. " - 3 months"));
        //       $help_cnt_month_3 = $helpobject->where('is_delete','=',0)->whereBetween('application_date', [$prev3monthstart,$prev3monthend] )->count();

        //     $prev2monthstart = date('Y-m-01',strtotime( $startday. " - 2 months"));
        //     $prev2monthend = date('Y-m-t',strtotime( $startday. " - 2 months"));
        //       $help_cnt_month_2 = $helpobject->where('is_delete','=',0)->whereBetween('application_date', [$prev2monthstart,$prev2monthend] )->count();

        //     $prev1monthstart = date('Y-m-01',strtotime( $startday. " - 1 months"));
        //     $prev1monthend = date('Y-m-t',strtotime( $startday. " - 1 months"));
        //       $help_cnt_month_1 = $helpobject->where('is_delete','=',0)->whereBetween('application_date', [$prev1monthstart,$prev1monthend] )->count();
        //       $month5 = date('Y-M',strtotime($prev5monthstart));
        //       $month4 = date('Y-M',strtotime($prev4monthstart));
        //       $month3 = date('Y-M',strtotime($prev3monthstart));
        //       $month2 = date('Y-M',strtotime($prev2monthstart));
        //       $month1 = date('Y-M',strtotime($prev1monthstart));
        //       $monthsname = [$month5,$month4,$month3,$month2,$month1,$month0];
        //     $arr = [$help_cnt_month_5,$help_cnt_month_4,$help_cnt_month_3,$help_cnt_month_2,$help_cnt_month_1,$help_cnt_month_0];

        //     $helpcategorycounts = $helpobject->selectRaw('service_type, COUNT(*) as cnt')
        //                             ->groupBy('service_type')
        //                             ->orderBy('service_type', 'DESC')
        //                             ->get();
        //     $catnames = array();
        //     $catvalues = array();
        //     $indx = 0;
        //     foreach($helpcategorycounts as $helpcategorycount)
        //     {
        //         $catnames[$indx] =$helpcategorycount->service_type;
        //         $catvalues[$indx] = $helpcategorycount->cnt;
        //         $indx++;
        //     }

        return view('dashboard.dashboard');

    }
    public function index()
    {
       return view('welcome');
    }
    public function digital()
    {
        $contents = DigitalContent::all();
        return view('digital_content', compact('contents'));
    }
}
