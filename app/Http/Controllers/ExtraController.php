<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Classes\PropClass;
use DB;
use File;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
       public function schoollist()
    {
        $users = DB::table('users')->where('usertype','=',1)->where('status', '=', 1)->get();
        $propclass = new PropClass();
        $user_prop_array = $propclass->getUsersInfo();
        date_default_timezone_set('Asia/Dhaka');
        $daydate = date('Y-m-d');
        return view('user.userlist',[
            'users'=>$users,
            'daydate'=>$daydate,
            'user_prop_array'=>$user_prop_array,
        ]);
    }
}
