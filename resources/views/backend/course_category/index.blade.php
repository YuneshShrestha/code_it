@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                            <a href="/category/create" class="btn btn-primary">Add Category</a>
                   </div>
                   <div class="card-body">
                        <table class="table table-striped">
                             <tr>
                                 <th style="width: 100px">Name</th>
                                 <th>Image</th>
                                 <th>Action</th>
                             </tr>
                             
                                 @if (!isset($category))
                                    <tr>
                                        <td colspan="12" class="text-center">No Data</td>
                                    </tr>   
                                 @else
                                    @foreach ($category as $data)
                                    <tr>
                                        <td width="30%">{{ $data->name }}</td>
                                        <td width="40%">
                                           <img src="{{ asset($data->image) }}" class="img-thumbnail" width="100px" height="100px" style="object-fit: cover;">
                                        </td>
                                        <td width="30%">
                                            <a class="badge bg-info" href="/category/{{ $data->id }}/edit">Edit</a>
                                        </td>
                                    <tr>
                                    @endforeach
                                 @endif
                             
                            
                        </table>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection