@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        <a href="/settings" class="btn btn-primary">Back</a>
                   </div>
                   <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                         @endif
                        <form action="/settings" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Company Name*</label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="eg. Example" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                                {{ $message }}
                             @enderror
                            <div class="form-group">
                                <label for="address">Address*</label>
                                <input id="address" class="form-control" type="text" name="address" placeholder="eg. Prthvi Path, Dharan" value="{{ old('address') }}" required>
                            </div>
                            @error('address')
                                {{ $message }}
                            @enderror
                            <div class="form-group">
                                <label for="contact">Contact*</label>
                                <input id="contact" class="form-control" type="tel" name="contact" placeholder="eg. 025-56789" value="{{ old('contact') }}" required>
                            </div>
                            @error('contact')
                                {{ $message }}
                            @enderror
                            <div class="form-group">
                                <label for="email">Email(Opt.)</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="eg. example@gmail.com">
                            </div>
                            @error('email')
                                {{ $message }}
                            @enderror
                            <div class="form-group">
                                <label for="regno">Regno(Opt.)</label>
                                <input id="regno" class="form-control" type="text" name="regno" value="{{ old('regno') }}" placeholder="eg. ">
                            </div>
                            @error('regno')
                                {{ $message }}
                            @enderror
                            <div class="form-group">
                                <label for="logo">Logo(Opt.)</label>
                                <input id="logo" class="form-control" type="file" name="logo">
                            </div>
                            @error('logo')
                                {{ $message }}
                            @enderror
                            <button type="submit" class="btn btn-primary">Save Record</button>
                        </form>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection