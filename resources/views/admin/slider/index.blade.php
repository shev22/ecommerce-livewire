@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                           Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $sliders  as $item)
                                <tr>
                                    <td>{{ $item ->id}}</td>
                                    <td>{{ $item ->tiltle}}</td>
                                    <td>{{ $item ->description}}</td>
                                    <td>
                                        <img src="{{ asset( "$item->image") }}" style="width:70px; height:70px">
                                    </td>
                                  
                                    <td>{{ $item ->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                  
                                  
                                    <td>
                                        <a href="{{url('admin/sliders/'. $item ->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{url('admin/sliders/'. $item ->id.'/delete')}}" onclick="return confirm('Are you sure you wanty to delete')" class="btn btn-danger btn-sm">Delete</a>
                                      
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
@endsection
