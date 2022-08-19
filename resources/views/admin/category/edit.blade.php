@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    <div class="row">
                        <div class="col-md-6 md-3">
                            <label for="">Name</label>
                            <input type="text"  name="name" value="{{$category->name}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" value = "{{$category->slug}}" class="form-control" name="slug">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description"  rows="3" class="form-control">{{$category->description}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <img src="{{asset($category->image)}}"  width="80px" height="80px">
                            <input type="file" name="image" class="form-control">
                        </div>
                     
                           
                      
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked': ''}}>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta_title</label>
                            <input type="text" value = "{{$category->meta_title}}"  class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta_keyword</label>
                            <textarea name="meta_keyword" rows="3"   class="form-control">{{$category->meta_keyword}}</textarea>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label for="">Meta_description</label>
                            <textarea name="meta_description"   rows="3" class="form-control">{{$category->meta_description}}</textarea>
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 

