<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id;

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
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }

    public function storeBrand()
    {
       
        //$validatedData = $this->validate();
        Brand::create([

            'name'  => $this->name,
            'slug'  => Str::slug($this->slug),
            'status'=> $this->status  == true ? '1': '0'

        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand($brand_id)
    {

        $this->brand_id = $brand_id;

        $brand = Brand::findOrfail($brand_id);
        $this->name =   $brand->name;
        $this->slug =   $brand->slug;
        $this->status =   $brand->status;
    }

    public function updateBrand()
    {

        Brand::findOrFail($this->brand_id)->update([

            'name'  => $this->name,
            'slug'  => Str::slug($this->slug),
            'status'=> $this->status  == true ? '1': '0'

        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id =$brand_id;
    }

    public function destroyBrand()
    {
       Brand::find($this->brand_id)->delete();
       $this->dispatchBrowserEvent('close-modal');
       $this->resetInput();
    }

    public function render()
    {

        $brands = Brand::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.brand.index', ['brands' => $brands])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
