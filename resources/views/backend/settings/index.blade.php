@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-lg-12 d-lg-block d-none">
               <div class="card">
                   <div class="card-header">
                        @if (empty($setting))
                            <a href="/settings/create" class="btn btn-primary">Add Settings</a>
                            
                        @else
                            <h3>Company</h3>
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
                                 <th>Logo</th>
                                 <th>Company Name</th>
                                 <th>Address</th>
                                 <th>Contact</th>
                                 <th>Email</th>
                                 <th>Reg No.</th>
                                 <th>Action</th>
                             </tr>
                             <tr>
                                 @if (!isset($setting))
                                    <td colspan="12" class="text-center">No Data</td>
                                 @else
                                    <td><img src="{{ asset($setting->logo) }}" alt="company logo" class="img-thumbnail" width="50px" height="50px" style="object-fit: cover;"></td>
                                    <td>{{ $setting->name }}</td>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->contact }}</td>
                                    <td>{{ $setting->email }}</td>
                                    <td>{{ $setting->regno }}</td>
                                    <td>
                                        <a class="badge bg-info" href="/settings/{{ $setting->id }}/edit">Edit</a>
                                    </td>
                                 @endif
                             </tr>
                            
                        </table>
                   </div>
               </div>
           </div> 


           {{-- Middle Screen --}}
           <div class="col-12 d-block d-lg-none">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            @if (!isset($setting))
                                <tr colspan="12" class="text-center">No Data</tr>
                            @else
                                <tr>
                                    <th>Logo</th>
                                    <td><img src="{{ asset($setting->logo) }}" alt="company logo" class="img-thumbnail" width="50px" height="50px" style="object-fit: cover;"></td>
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td>{{ $setting->name }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $setting->address }}</td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td>{{ $setting->contact }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $setting->email }}</td>
                                </tr>
                                <tr>
                                    <th>Reg No. </th>
                                    <td>{{ $setting->regno }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
           </div>

        </div>
    </div>
@endsection