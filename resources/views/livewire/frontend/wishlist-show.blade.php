<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-10">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($wishlist as $wishlistItem)
                            <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                        <label class="product-name">
                                            <img src=" {{ asset($wishlistItem->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                        {{$wishlistItem->product->name }}
                                        </label>
                                    </a>
                                </div>
                                
                                
                                <div class="col-md-2 my-auto">
                                    <label class="price">    ${{$wishlistItem->product->selling_price }}.00</label>
                                </div>
                              
                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <button class="btn btn-danger" type="button"  wire:click="removeWishlistItem({{ $wishlistItem->id }})"> 
                                       
                                            <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-trash"></i> Remove
                                            </span>
                                            <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">removing...</span>
                                         
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h4>Wishlist Empty</h4>
                        @endforelse 
                             
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
