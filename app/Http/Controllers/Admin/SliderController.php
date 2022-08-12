<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
   public function index()
   {
    $sliders = Slider::all();
      return view('admin.slider.index', compact('sliders'));
   }

   public function create()
   {
      return view('admin.slider.create');
   }

   public function store(Request $request)
   {

        $slider = new Slider();

        $slider->tiltle = $request->input('tiltle');
        $slider->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider', $filename);
            $slider->image = 'uploads/slider/'.$filename;
        }
        $slider->status = $request->input('status') == true ? '1' : '0';

        $slider->save();

        return redirect('admin/sliders')->with(
            'status',
            'product added successfully'
        );

    
   }

   public function edit($slider_id)
   {
    $slider = Slider::findOrFail($slider_id);
       
      return view('admin.slider.edit', compact('slider'));
   }

   public function update(Request $request, $slider_id)
   {
        $slider = Slider::findOrFail($slider_id);


        $slider->tiltle = $request->input('tiltle');
        $slider->description = $request->input('description');

        $destination = $slider->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider', $filename);
            $slider->image = 'uploads/slider/'.$filename;
        }
        $slider->status = $request->input('status') == true ? '1' : '0';

        $slider->save();

        return redirect('admin/sliders')->with(
            'status',
            'product added successfully'
        );
   }

   public function destroy($slider_id)
   {

       $slider = Slider::find($slider_id);
       if ($slider->image) {
           $path = $slider->image;
           if (File::exists($path)) {
               File::delete($path);
           }
       }
       $slider->delete();
       return redirect('admin/sliders');
   }
}
