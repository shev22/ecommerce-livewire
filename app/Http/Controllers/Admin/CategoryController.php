<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                    $category->image = $filename;
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
        return view('admin.category.edit', compact($category));
    }
}
