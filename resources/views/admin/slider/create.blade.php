@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Slider
                    <a href="{{url('admin/sliders')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <div class="row">
                        <div class="md-3">
                            <label for="">Tile</label>
                            <input type="text" class="form-control" name="tiltle">
                        </div>
                        <div class=" mb-3">
                            <label for="">Description</label>
                            <textarea name="description"  rows="3" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class=" mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class=" mb-3">
                            <button class="btn btn-primary
                            " type="submit">Save</button>
                        </div>
                   
                    </div>              
                </form>
            </div>
        </div>
    </div>
</div>
@endsection