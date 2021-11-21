@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                            <a href="/course/create" class="btn btn-primary">Add Course</a>
                   </div>
                   <div class="card-body">
                       
                        <table class="table table-striped">
                             <tr>
                                 <th>Image</th>
                                 <th>Name</th>
                                 <th>Duration</th>
                                 <th>Syllabus</th>
                                 <th>Fee</th>
                                 <th>Category</th>
                                 <th>Action</th>
                             </tr>
                            
                                 @if ($course->isEmpty())
                                    <tr>
                                        <td colspan="12" class="text-center">No Data</td>
                                    </tr>   
                                 @else
                                    @foreach ($course as $data)
                                    <tr>
                                        <td width="10%">
                                           <img src="{{ asset($data->image) }}" class="img-thumbnail" width="100px" height="100px" style="object-fit: cover;">
                                        </td>
                                        <td width="15%">{{ $data->name }}</td>
                                        <td width="10%">{{ $data->duration }}</td>
                                        <td width="35%">{!! Str::limit($data->syllabus, 200)  !!}</td>
                                        <td width="10%">{{ $data->fee }}</td>
                                        <td width="10%">{{ $data->coursecategory->name }}</td>
                                        <td width="10%">
                                            <a class="badge bg-info" href="/course/{{ $data->id }}/edit">Edit</a>
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