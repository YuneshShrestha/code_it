<?php

namespace App\Http\Controllers;

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
}
