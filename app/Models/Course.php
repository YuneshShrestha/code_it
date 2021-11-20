<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public function coursecategory()
    {
        // You must specify foreign key here
        return $this->belongsTo(CourseCategory::class,'id');
    }
}
