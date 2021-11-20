@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                     
                            <a href="/upcoming/create" class="btn btn-primary">Add Upcoming Class</a>
                   </div>
                   <div class="card-body">
                        <table class="table table-striped">
                             <tr>
                                 <th>SN</th>
                                 <th>Course</th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                            
                                 @if ($upcoming->isEmpty())
                                 <tr>
                                    <td colspan="12" class="text-center">No Data</td>
                                </tr>   
                                 @else
                                    @foreach ($upcoming as $count=>$data)
                                    </tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $data->course->name }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ date('h:i A', strtotime($data->time)); }}</td>
                                        <td>
                                            <span class="badge bg-{{ $data->status?'success':'danger' }}">{{ $data->status?'Active':'Inactive' }}</span>
                                        </td>
                                        <td>
                                            <a class="badge bg-info" href="/upcoming/{{ $data->id }}/edit">Edit</a>
                                        </td>
                                    </tr>    
                                    @endforeach
                                 @endif
                             
                            
                        </table>
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection