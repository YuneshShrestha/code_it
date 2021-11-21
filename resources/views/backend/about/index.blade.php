@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-lg-12 d-lg-block d-none">
               <div class="card">
                   <div class="card-header">
                        @if (empty($about))
                            <a href="/about/create" class="btn btn-primary">Add about</a>
                            
                        @else
                            <h3>About Us</h3>
                        @endif
                   </div>
                   <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                     @endif
                        <table class="table table-striped">
                             <tr>
                                 <th style="width: 100px">Title</th>
                                 <th>Description</th>
                                 <th>Action</th>
                             </tr>
                             <tr>
                                 @if (!isset($about))
                                    <td colspan="12" class="text-center">No Data</td>
                                 @else
                                    <td>{{ $about->title }}</td>
                                    <td>{!! Str::limit($about->description, 200) !!}</td>
                                    <td>
                                        <a class="badge bg-info" href="/about/{{ $about->id }}/edit">Edit</a>
                                    </td>
                                 @endif
                             </tr>
                            
                        </table>
                   </div>
               </div>
           </div> 

           {{-- middle screen --}}
           <div class="col-12 d-lg-none d-block ">
               <div class="card">
                    <div class="card-header">
                            @if (empty($about))
                                <a href="/about/create" class="btn btn-primary">Add about</a>
                                
                            @else
                                <h3>About Us</h3>
                            @endif
                    </div>
                   <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                       <table class="table table-responsive">
                           @if (!isset($about))
                               <tr colspan = "12" class="text-center">
                                   <td>No Data</td>
                               </tr>
                           @else
                            <tr>
                                <th>Title</th>
                                <td>{{ $about->title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! Str::limit($about->description, 200) !!}</td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <td>
                                    <a class="badge bg-info" href="/about/{{ $about->id }}/edit">Edit</a>
                                </td>
                            </tr>
                           @endif
                            
                       </table>
                   </div>
               </div>
           </div>
        </div>
    </div>
@endsection