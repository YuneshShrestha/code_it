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
                        <form action="/about" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input id="title" class="form-control" type="text" name="title" placeholder="eg. About Us" value="{{ old('title') }}" required>
                            </div>
                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror
                            <div class="form-group">
                                <label for="description">Description*</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                            </div>
                            @error('description')
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