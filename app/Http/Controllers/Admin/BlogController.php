<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::all();
        return view('backend.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
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
            'title'=>'required',
            'description'=>'required',
            'featured'=>'mimes:jpg,jpeg,png|max:800'
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        if($request->hasFile('featured'))
        {
            $file = $request->featured;
            $name = time() . $file->getClientOriginalName();
            $file->move('images/',$name);
            $blog->featured = 'images/'.$name;
        }
        else
        {
            $blog->featured = 'default/default.png';
        }
        $blog->save();
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
        $blog = Blog::find($id);
        return view('backend.blog.edit',compact('blog'));
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
            'title'=>'required',
            'description'=>'required',
            'featured'=>'mimes:jpg,jpeg,png|max:800'
        ]);
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        if($request->hasFile('featured'))
        {
            $file = $request->featured;
            $name = time() . $file->getClientOriginalName();
            $file->move('images/',$name);
            $blog->featured = 'images/'.$name;
        }
        else
        {
            $blog->featured = 'default/default.png';
        }
        $blog->save();
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
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back();
    }
}
