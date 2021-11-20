<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('backend.course.index')->with('course',$course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CourseCategory::all();
        return view('backend.course.create',compact('category'));
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
            'name'=>'required|unique:courses',
            'duration'=>'required',
            'syllabus'=>'required',
            'image'=>'file|mimes:png,jpg,jpeg|max:5048',
        ]);
        $course = new Course();
        $course->name = $request->name;
        $course->duration = $request->duration;
        $course->syllabus = $request->syllabus;
        $course->fee = $request->fee;
        $course->category_id = $request->category;

        // image
        if($request->hasFile('image')){
            $file = $request->image;
            $newname = time().$file->getClientOriginalName();
            $file->move('images',$newname);
            $course->image = 'images/'.$newname;
        }
        else
        {
            $course->image = 'default/default.png';
        }
        $course->save();
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
        $course = Course::find($id);
        $category = CourseCategory::all();
        return view('backend.course.edit',compact('course','category'));
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
            'name'=>"required|unique:courses,name,".$id,
            'duration'=>'required',
            'syllabus'=>'required',
            'image'=>'file|mimes:png,jpg,jpeg|max:5048',
        ]);
        $course = Course::find($id);
        $course->name = $request->name;
        $course->duration = $request->duration;
        $course->syllabus = $request->syllabus;
        $course->fee = $request->fee;
        $course->category_id = $request->category;

        // image
        if($request->hasFile('image')){
            $file = $request->image;
            $newname = time().$file->getClientOriginalName();
            $file->move('images',$newname);
            $course->image = 'images/'.$newname;
        }
        else
        {
            $course->image = 'default/default.png';
        }
        $course->save();
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
