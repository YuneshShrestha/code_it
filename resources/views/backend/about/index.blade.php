@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                        @if (empty($about))
                            <a href="/about/create" class="btn btn-primary">Add about</a>
                            
                        @else
                            <h3>About Us</h3>
                        @endif
                   </div>
                   <div class="card-body">
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
                                    <td>{{ Str::limit($about->description, 200) }}</td>
                                    <td>
                                        <a class="badge bg-info" href="/about/{{ $about->id }}/edit">Edit</a>
                                    </td>
                                 @endif
                             </tr>
                            
                        </table>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection