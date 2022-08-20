@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                   Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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


                      <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select class="form-select" name = "category_id">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"  {{$category->id == $products->category_id ? 'selected' : ''  }} >  
                                         {{$category->name}}
                                        </option>
                                    @endforeach
                                  </select>        
                            </div>
                        
                        <div class="mb-3">
                            <label for=""> Product Name</label>
                            <input type="text" name='name' value= "{{$products->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for=""> Product Slug</label>
                            <input type="text" name='slug' value= "{{$products->slug}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Select Brand</label>
                            <select class="form-select" name = "brand">
                                <option value="">Select a Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->name}}"  {{$brand->name == $products->brand ? 'selected' : ''  }}>{{$brand->name}}</option>
                                @endforeach
                              </select>        
                        </div>
                        <div class="mb-3">
                            <label for=""> Small Description</label>
                            <input type="text" name='small_description' value= "{{$products->small_description}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for=""> Description</label>
                            <input type="text" name='description' value= "{{$products->description}}"  class="form-control">
                        </div>
                    </div>




                        <div class="tab-pane fade py-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name='meta_title' value= "{{$products->meta_title}}"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" name='meta_description' value= "{{$products->meta_description}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta keyword</label>
                                <input type="text" name='meta_keywords' value= "{{$products->meta_keywords}}"class="form-control">
                            </div>
                        </div>


                        <div class="tab-pane fade py-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="text" name='original_price' value= "{{$products->original_price}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="text" name='selling_price'  value= "{{$products->selling_price}}"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="text" name='quantity' value= "{{$products->quantity}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name='trending' value= "{{$products->trending == '1' ? 'checked' : ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name='status'  value= "{{$products->status == '1' ? 'checked' : ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade py-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <label for="" class="py-3">Upload Product Images</label>
                            <input type="file"name='image[]' multiple class="form-control" >
                            @if($products->productImages)
                            @foreach ($products->Productimages as $image )
                            <img src="{{ asset($image->image) }}" class="me-4 border " style="width: 80px; height: 80px">
                            @endforeach
                            @else
                            <h5>No Images Added</h5>
                            @endif
                        </div>
                       
                      </div>   
                      
                                       
                      <div class="py-2 float-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
