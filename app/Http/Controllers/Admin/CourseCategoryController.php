<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CourseCategory::all();
        return view('backend.course_category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course_category.create');
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
            'name'=>'required',
            'image'=>'file|mimes:png,jpg,jpeg|max:5048',
        ]);
        $category = new CourseCategory();
        $category->name = $request->name;

        // image
        if($request->hasFile('image')){
            $file = $request->image;
            $newname = time().$file->getClientOriginalName();
            $file->move('images',$newname);
            $category->image = 'images/'.$newname;
        }
        else
        {
            $category->image = 'default/default.png';
        }
        $category->save();
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
        $category = CourseCategory::first();
        return view('backend.course_category.edit',compact('category'));
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
            'name'=>'required',
            'image'=>'file|mimes:png,jpg,jpeg|max:5048',
        ]);
        $category = CourseCategory::find($id);
        $category->name = $request->name;

        // image
        if($request->hasFile('image')){
            $file = $request->image;
            $newname = time().$file->getClientOriginalName();
            $file->move('images',$newname);
            $category->image = 'images/'.$newname;
        }
        $category->save();
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
