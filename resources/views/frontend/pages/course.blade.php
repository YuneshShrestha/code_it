@extends('frontend.app')
@section('title')
   @foreach ($courses as $course)
       {{ $course->name }}
   @endforeach
@endsection

@section('content')
  <div class="container pt-2">
    @foreach ($courses as $course)
        <div>
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-gray">Name: {{ $course->name }}</p>
                    <p class="text-gray">Duration: {{ $course->duration }}</p>
                    <p class="text-gray">Category: {{ $course->coursecategory->name }}</p>
                   
                </div>
    
                <img src="{{ asset($course->image) }}" class="img-thumbnail d-lg-block d-none" alt="" width="200px" height="200px">
            </div>
            <p>
                {!! $course->syllabus !!}
            </p>
        </div>
    @endforeach
  </div>
@endsection