<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
       
        $category = Category::where('slug', $category_slug)->first();
       

        if($category)
        {
           

          // $products =  $category->products()->get();
        
        }else{
            return redirect()->back();
        }
        return view('frontend.collections.products.index', compact( 'category'));
    }
}
