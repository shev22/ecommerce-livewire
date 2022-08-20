@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                       Add Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                            SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                            Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                              Product Image</button>
                          </li>
                      
                      </ul>


                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select class="form-select" name = "category_id">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                  </select>        
                            </div>
                        
                        <div class="mb-3">
                            <label for=""> Product Name</label>
                            <input type="text" name='name' class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for=""> Product Slug</label>
                            <input type="text" name='slug' class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Select Brand</label>
                            <select class="form-select" name = "brand">
                                <option value="">Select a Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                                @endforeach
                              </select>        
                        </div>
                        <div class="mb-3">
                            <label for=""> Small Description</label>
                            <input type="text" name='small_description' class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for=""> Description</label>
                            <input type="text" name='description' class="form-control">
                        </div>
                    </div>




                        <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name='meta_title' class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" name='meta_description' class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta keyword</label>
                                <input type="text" name='meta_keywords' class="form-control">
                            </div>
                        </div>


                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="text" name='original_price' class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="text" name='selling_price' class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="text" name='quantity' class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name='trending'>
                                </div>
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name='status' >
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <label for="">Upload Product Images</label>
                            <input type="file"name='image[]' multiple class="form-control" >
                        </div>
                     
                      </div>        
                      
                      <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
