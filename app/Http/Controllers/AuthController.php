<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('userid') && !Session::has('email')&& !Session::has('type')) {
            return view('login');
        } else {
            return redirect()->to('/');
        }

    }

    public function checkLogin(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|min:4|',
            'password' => 'required|string|min:4|',
        ]);
        
        $user = DB::table('users')->where('username', '=', $request->username)
            ->where('password', '=', md5($request->password))
            ->where('status', '=', '1')
            ->first();
        if ($user) {
            Session::put('userid', $user->id);
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            Session::put('type', $user->usertype);

            return redirect()->to('/');
        } else {
            return redirect()->back()->with('msg', 'Wrong Email or Password');
        }
        return view('login');
    }


    public function logout()
    {
        session()->flush();
        return redirect()->to('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
