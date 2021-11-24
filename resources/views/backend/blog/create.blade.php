@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        <a href="/blog" class="btn btn-primary">Back</a>
                   </div>
                   <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                         @endif
                        <form action="/blog" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input id="title" class="form-control" type="text" name="title" placeholder="eg. Programming" value="{{ old('title') }}" required>
                            </div>
                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror
                             <div class="form-group">
                                 <label for="description">Description*</label>
                                 <textarea id="description" class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                             </div>
                             @error('description')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                             @enderror
                            <div class="form-group">
                                <label for="featured">Featured(Opt.)(Max size: 800KB) <a href="https://tinypng.com/" target="img_size">Reduce Image Size</a></label>
                                <input id="featured" class="form-control-file" type="file" name="featured">
                            </div>
                            @error('featured')
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