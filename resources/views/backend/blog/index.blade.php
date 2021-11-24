@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            {{-- Large Screen --}}
           <div class="col-12 d-block">
               <div class="card">
                   <div class="card-header">
                            <a href="/blog/create" class="btn btn-primary">Add Blog</a>
                   </div>
                   <div class="card-body table-responsive">
                           <table class="table table-lg-striped">
                               <tr>
                                   <th>SN</th>
                                   <th>Featured</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Posted On</th>
                                   <th>Action</th>
                               </tr>
                             
                                   @foreach ($blog as $count=>$data)
                                   <tr>
                                       <td>{{ ++$count }}</td>
                                       <td><img src="{{ asset($data->featured) }}" alt="blog image" class="img-thumbnail" width="80px" height="80px"></td>
                                       <td>{{ $data->title }}</td>
                                       <td>{!! Str::limit($data->description,100) !!}</td>
                                       <td>{{ $data->created_at->diffForHumans() }}</td>
                                       <td>
                                            <a class="badge bg-info" href="/blog/{{ $data->id }}/edit">Edit</a>
                                            <form action="/blog/{{ $data->id }}" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button class="btn badge bg-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>   
                                   @endforeach
                               
                           </table>
                       
                   </div>
               </div>
           </div> 
        </div>
    </div>
@endsection