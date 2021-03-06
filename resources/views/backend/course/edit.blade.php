@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        <a href="/course" class="btn btn-primary">Back</a>
                   </div>
                   <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                         @endif
                        <form action="/course/{{ $course->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="eg. Flutter" value="{{ $course->name }}" required>
                            </div>
                            @error('name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror
                             <div class="form-group">
                                <label for="duration">Duration*</label>
                                <input id="duration" class="form-control" type="text" name="duration" placeholder="eg. 12 days" value="{{ $course->duration }}" required>
                            </div>
                            @error('duration')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror
                             <div class="form-group">
                                 <label for="syllabus">Syllabus</label>
                                 <textarea id="description" class="form-control" name="syllabus" rows="3" cols="30">{{  $course->syllabus  }}</textarea>
                             </div>
                            {{-- @error('syllabus')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror --}}
                             <div class="form-group">
                                <label for="fee">Fee(In Rs.)(Opt.)</label>
                                <input id="fee" class="form-control" type="text" name="fee" placeholder="eg. 12000" value="{{ $course->fee }}" required>
                            </div>
                             {{-- @error('fee')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror --}}
                             <div class="form-group">
                                <label for="category">Category*</label>
                                <select name="category" id="" class="form-control">
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image(Opt.)</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>
                            @error('image')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        
                            <button type="submit" class="btn btn-primary">Save Record</button>
                        </form>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection