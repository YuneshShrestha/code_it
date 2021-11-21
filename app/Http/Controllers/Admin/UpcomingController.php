<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Upcoming;
use Illuminate\Http\Request;

class UpcomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming = Upcoming::all();
        return view('backend.upcoming.index',compact('upcoming'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('backend.upcoming.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'time'=>'required',
            'course'=>'required',
            'class_type'=>'required'
        ]);
        $upcoming = new Upcoming();
        $upcoming->date = $request->date;
        $upcoming->time = $request->time;
        $upcoming->course_id = $request->course;
        $upcoming->class_type = $request->class_type;
       
        $upcoming->save();
        $request->session()->flash('message','Record Saved');
        return redirect()->back();
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
        $upcoming = Upcoming::find($id);
        $courses = Course::all();
        return view('backend.upcoming.edit',compact('upcoming','courses'));
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
        $request->validate([
            'date'=>'required',
            'time'=>'required',
            'course'=>'required',
            'class_type'=>'required',
            'status'=>'required'
        ]);
        $upcoming = Upcoming::find($id);
        $upcoming->date = $request->date;
        $upcoming->time = $request->time;
        $upcoming->course_id = $request->course;
        $upcoming->class_type = $request->class_type;
        $upcoming->status = $request->status;
        $upcoming->update();
        $request->session()->flash('message','Record Updated');
        return redirect()->back();
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
