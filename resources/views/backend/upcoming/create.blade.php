@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        <a href="/upcoming" class="btn btn-primary">Back</a>
                   </div>
                   <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                         @endif
                        <form action="/upcoming" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="date">Starting Form*</label>
                                <input id="date" class="form-control" type="date" name="date" placeholder="eg. 2021-05-17 " value="{{ old('date') }}" required>
                            </div>
                            @error('date')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror
                            <div class="form-group">
                                <label for="time">Class Time*</label>
                                <input id="time" class="form-control" type="time" name="time" placeholder="eg. 2021-05-17 " value="{{ old('date') }}" required>
                            </div>
                            @error('time')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-group">
                                <label for="course">Course*</label>
                                <select id="course" class="form-control" name="course">
                                  @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class_type">Class Type*</label>
                                <select id="class_type" class="form-control" name="class_type">
                                  <option value="Physical">Physical</option>
                                  <option value="Online">Online</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Record</button>
                        </form>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection