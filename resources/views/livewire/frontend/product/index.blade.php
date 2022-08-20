 <div>
     <div class="row">
    <div class="col-md-3">
        @if ($category->brands)

        <div class="card">
            <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                        <label for="" class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"/>{{ $brandItem->name }}
                        </label>
                    @endforeach
            </div>
        </div>
    

      <div class="card mt-3">
            <div class="card-header"><h4>Price</h4></div>
                <div class="card-body">
                
                        <label for="" class="d-block">
                            <input type="radio"  name="priceSort" wire:model="priceInputs"  value="high-to-low"/>High to Low
                        </label>

                        <label for="" class="d-block">
                            <input type="radio"  name="priceSort" wire:model="priceInputs"  value="low-to-high"/>Low to High
                        </label>
            </div>
        </div>  
    </div>     
        @endif


    <div class="col-md-9">
     <div class="row">
         @forelse ($products as $productItem)
             <div class="col-md-3">
                 <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                     <div class="product-card">
                         <div class="product-card-img">

                             @if ($productItem->quantity > 0)
                                 <label class="stock bg-success">In Stock</label>
                             @else
                                 <label class="stock bg-danger">Out of Stock</label>
                             @endif

                             @if ($productItem->productImages->count() > 0)
                                 <img src="{{ asset($productItem->productImages[0]->image) }}"
                                     alt="{{ $productItem->name }}">
                             @endif

                         </div>
                         <div class="product-card-body">
                             <p class="product-brand">{{ $productItem->brand }}</p>
                             <h6 class="product-name">

                                 {{ $productItem->name }}
                         </a>
                         </h6>
                       <div>
                     <span class="selling-price"> {{ $productItem->selling_price }}</span>
                     <span class="original-price"> {{ $productItem->original_price }}</span>
                 </div>
            </div>
        </div>
 </div>
@empty
 <div class="col-md-12">
     <div class="col-md-3">
         <h4>
             No Products Found for {{ $category->name }}
         </h4>
     </div>
 </div>
 @endforelse
 </div>
 </div>
</div>
</div>