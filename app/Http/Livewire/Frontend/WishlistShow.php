<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{

    public function removeWishlistItem(INT $wishlist_id)
    {
        if (Auth::check()) {
            if (
                Wishlist::where('id', $wishlist_id)
                ->where('user_id', Auth::id())
                ->exists()
            ) {
                $item = Wishlist::where('id', $wishlist_id)
                    ->where('user_id', Auth::id())
                    ->first();
                $item->delete();
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item deleted',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
    }


    public function render()
    {

        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('livewire.frontend.wishlist-show', compact('wishlist'));
    }
}
