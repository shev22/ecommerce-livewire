<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{
    public function render()
    {  
        
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('livewire.frontend.wishlist-show', compact('wishlist'));
    }
}
