<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('backend.settings.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.create');
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
            'address'=>'required',
            'contact'=>'required',
            'email'=>'email',
            'logo'=>'file|mimes:png,jpg,jpeg|max:5048',
        ]);
        $setting = new Setting();
        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->contact = $request->contact;
        $setting->email = $request->email;
        $setting->regno = $request->regno;   
        // Logo
        if($request->hasFile('logo')){
            $file = $request->logo;
            $newname = time().$file->getClientOriginalName();
            $file->move('images',$newname);
            $setting->logo = 'images/'.$newname;
        }
        $setting->save();
        $request->session()->flash('message','Record Saved');
        return redirect('/settings');
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
        $setting = Setting::find($id)->first();
        return view('backend.settings.edit',compact('setting'));
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
            'address'=>'required',
            'contact'=>'required',
            'email'=>'email',
            'logo'=>'file|mimes:png,jpg,jpeg|max:5048',
        ]);
        $setting = Setting::find($id);
        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->contact = $request->contact;
        $setting->email = $request->email;
        $setting->regno = $request->regno;   
        // Logo
        if($request->hasFile('logo')){
            $file = $request->logo;
            $newname = time().$file->getClientOriginalName();
            $file->move('images',$newname);
            $setting->logo = 'images/'.$newname;
        }
        $setting->update();
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
