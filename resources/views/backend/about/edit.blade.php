@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        <a href="/about" class="btn btn-primary">Back</a>
                   </div>
                   <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                         @endif
                        <form action="/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input id="title" class="form-control" type="text" name="title" placeholder="eg. About Us" value="{{ $about->title }}" required>
                            </div>
                            @error('title')
                               <p class="text-danger"> {{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="description">Description*</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Long Text..." required>{{ $about->description }}</textarea>
                            </div>
                            @error('description')
                                {{ $message }}
                            @enderror
                            <button type="submit" class="btn btn-primary">Update Record</button>
                        </form>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection