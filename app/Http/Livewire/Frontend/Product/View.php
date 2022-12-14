<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product;

    public function mount($category, $product)
    {

        $this->category =  $category;
        $this->category =  $product;
    }

    public function addToWishList($product_id)
    {
        if (Auth::check()) {
            if (Product::find($product_id)) {
                if(Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->exists())
                {
                    session()->flash('message', 'Item already Added'); 
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Item already Added',
                        'type' => 'warning', 
                        'status' => 401
                    ]);
                    return false; 
                }else{
                   $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->user_id = Auth::id();
                $wishlist->save();
                session()->flash('message', 'Added to Wishlist');  
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist',
                    'type' => 'success', 
                    'status' => 200
                ]);
                }
               
            }
        }else{
            session()->flash('message', 'Please Log in To continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Log in To continue',
                'type' => 'info', 
                'status' => 401
            ]);
            return false;
        }
    }

    public function render()
    {
       
        return view('livewire.frontend.product.view', [

            'category' =>  $this->category ,
            'product' =>  $this->product ,

        ]);
    }
}
