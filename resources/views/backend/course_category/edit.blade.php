@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        <a href="/category" class="btn btn-primary">Back</a>
                   </div>
                   <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                         @endif
                        <form action="/category/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="eg. Programming" value="{{ $category->name }}" required>
                            </div>
                            @error('name')
                               <p class="text-danger"> {{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="image">Image(Opt.)</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>
          
                            @error('image')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <button type="submit" class="btn btn-primary">Update Record</button>
                        </form>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection