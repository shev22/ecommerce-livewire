@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                            Products</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $products  as $item)
                                <tr>
                                    <td>{{ $item ->id}}</td>
                                    <td>{{ $item ->category->name}}</td>
                                    <td>{{ $item ->name}}</td>
                                    <td>{{ $item ->selling_price}}</td>
                                    <td>{{ $item ->quantity}}</td>
                                    <td>{{ $item ->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                  
                                  
                                    <td>
                                        <a href="{{url('admin/products/'. $item ->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{url('admin/product/'. $item ->id.'/delete')}}" onclick="return confirm('Are you sure you wanty to delete')" class="btn btn-danger btn-sm">Delete</a>
                                      
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
