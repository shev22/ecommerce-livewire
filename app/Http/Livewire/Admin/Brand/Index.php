<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id, $category_id;

    // public function rules()
    // {
    //     return[
    //         'name' =>'required|string',
    //         'slug'  =>'required|string',
    //         'status'  =>'required|string'
    //     ];
    // }

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->brand_id = null;
        $this -> category_id = null;
    }

    public function storeBrand()
    {

    
        //$validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this -> category_id
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand($brand_id)
    {
        $this->brand_id = $brand_id;

        $brand = Brand::findOrfail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand -> category_id;
    }

    public function updateBrand()
    {
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this -> category_id
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brand::find($this->brand_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.brand.index', [
            'brands' => $brands,
            'categories' => $categories
            
            ])
            ->extends('layouts.admin')
            ->section('content');
    }
}
