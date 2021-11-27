<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $company = Setting::first();
        $categories = CourseCategory::all();
        return view('frontend.pages.home',compact('categories','company'));
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
