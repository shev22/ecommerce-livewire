<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
       
        return view('admin.category.index');
    }

    public function create()
    {
        
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
      
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('slug'));
        $category->description = $request->input('description');

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $ext;
                    $file->move('uploads/category', $filename);
                    $category->image = 'uploads/category/'.$filename;
                }
            
 
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->save();

        return redirect('admin/category')->with(
            'status',
            'category added successfully'
        );
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $category)
    {
        $category = Category::findOrFail($category);

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('slug'));
        $category->description = $request->input('description');

        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $ext;
                    $file->move('uploads/category', $filename);
                    $category->image = 'uploads/category/'.$filename;
        }
            
 
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->update();
        
        return redirect('admin/category')->with(
            'status',
            'category added successfully'
        );

    }
}
