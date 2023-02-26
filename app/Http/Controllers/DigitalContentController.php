<?php

namespace App\Http\Controllers;

use App\Models\DigitalContent;
use Illuminate\Http\Request;

class DigitalContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = DigitalContent::paginate(10);
        return view('dashboard.digital.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.digital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
       $input = $request->validate([
        'name'  =>  'required',
        'applicant_attachment'  =>  'required',
        'description'  =>  'nullable',
       ]);
    //    dd($input);
       $input['video'] = uploadFile($request->file('applicant_attachment'));
       DigitalContent::create($input);
       return redirect()->route('digitalContent.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DigitalContent  $digitalContent
     * @return \Illuminate\Http\Response
     */
    public function show(DigitalContent $digitalContent)
    {
        dd('hello6');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DigitalContent  $digitalContent
     * @return \Illuminate\Http\Response
     */
    public function edit(DigitalContent $digitalContent)
    {
        dd('hello4');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DigitalContent  $digitalContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DigitalContent $digitalContent)
    {
        dd('hello2');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DigitalContent  $digitalContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(DigitalContent $digitalContent)
    {
        deleteFile($digitalContent->video);
        $digitalContent->delete();
        return redirect()->back();
    }
}
