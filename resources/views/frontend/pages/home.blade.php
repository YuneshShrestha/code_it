@extends('frontend.app')
@section('title')
    Home
@endsection
@section('content')
{{-- About Us --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="https://images.pexels.com/photos/3862142/pexels-photo-3862142.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
            </div>
            <div class="col-md-6">
                <p>
                    {!! Str::limit($about->description,600) !!}
                </p>
            </div>
        </div>
    </div>

{{-- Upcoming (Slick)--}}
    <div class="container">
        <h2 class="text-center text-uppercase py-4">Upcoming</h2>
        <div class="row responsive">
            @foreach ($upcoming as $item)
                <div class="col-md-6 col-12 gx-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($item->course->image) }}" class="card-img-top img-fluid" alt="course image">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->course->name }} </h5>
                          <p class="card-text"> Duration: {{ $item->course->duration }}</p>
                          <p class="card-text"> Fee(In Rs.): {{ $item->course->fee }}</p>
                          <a href="#" class="btn btn-primary">Syllabus</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection