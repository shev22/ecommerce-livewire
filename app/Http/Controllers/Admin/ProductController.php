<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->brand = $request->input('brand');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == true ? '1' : '0';
        $products->trending = $request->input('trending') == true ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->save();

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/Products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $productImage = new ProductImage();
                $productImage->product_id = $products->id;
                $productImage->image = $finalImagePathName;
                $productImage->save();
            }
        }
        return redirect('admin/products')->with(
            'status',
            'product added successfully'
        );
    }

    public function edit($product_id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::findOrFail($product_id);
        return view(
            'admin.products.edit',
            compact('products', 'brands', 'categories')
        );
    }

    public function update(Request $request, $product_id)
    {

    
        $products = Product::findOrFail($product_id);
        if ($products) {
            $products->category_id = $request->input('category_id');
            $products->name = $request->input('name');
            $products->slug = $request->input('slug');
            $products->brand = $request->input('brand');
            $products->small_description = $request->input('small_description');
            $products->description = $request->input('description');
            $products->original_price = $request->input('original_price');
            $products->selling_price = $request->input('selling_price');
            $products->quantity = $request->input('quantity');
            $products->status = $request->input('status') == true ? '1' : '0';
            $products->trending =
            $request->input('trending') == true ? '1' : '0';
            $products->meta_title = $request->input('meta_title');
            $products->meta_description = $request->input('meta_description');
            $products->meta_keywords = $request->input('meta_keywords');
            $products->meta_description = $request->input('meta_description');
            $products->update();

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/Products/';

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $productImage = ProductImage::where(
                        'product_id',
                        $product_id
                    )->first();
                    $productImage->product_id = $products->id;
                    $productImage->image = $finalImagePathName;
                    $productImage->update();
                }
            }
        } else {
            return;
        }
        return redirect('admin/products')->with(
            'status',
            'product updated successfully'
        );
    }

    public function destroy($product_id)
    {
        $productimage = ProductImage::where('product_id', $product_id)->get();
        if ($productimage) {
            foreach ($productimage as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $productimage->each->delete();
        Product::findOrFail($product_id)->delete();
        return redirect()->back();
    }
}
