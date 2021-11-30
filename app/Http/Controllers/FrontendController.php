<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Setting;
use App\Models\Upcoming;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $company = Setting::first();
        $categories = CourseCategory::all();
        $upcoming = Upcoming::where('status',1)->get();
        $about = About::first();
        return view('frontend.pages.home',compact('categories','company','upcoming','about'));
    }
    public function courses($category, $id)
    {
        $company = Setting::first();
        $categories = CourseCategory::all();
        $courses = Course::where('id',$id)->get();
      
        return view('frontend.pages.course',compact('courses','categories','company'));
        // return $category . $id;
    }
}
