<?php

namespace App\Http\Controllers\Admins;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(){
      $sliders = Slider::all();
      return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
      // $differenceArray = array_diff($b, $a);
    }

    public function store(Request $request){
      $validatedData = $request->validate([
        'image' => 'required|image'
      ],
      [
        'image.required' => 'Gambar harus diisi',
        'image.image' => 'File harus berbentuk gambar'
      ]);

      $validatedData['image'] = $request->file('image')->store('post');
      Slider::create($validatedData);
      return redirect()->route('admin.sliders.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit(Slider $slider){

    }

    public function update(Request $request, Slider $slider){
      $validatedData = $request->validate([
        'image' => 'required|image'
      ],
      [
        'image.required' => 'Gambar harus diisi',
        'image.image' => 'File harus berbentuk gambar'
      ]);

      Storage::delete($slider->image);
      $validatedData['image'] = $request->file('image')->store('post');
      Slider::where('id', $slider->id)->update($validatedData);
      return redirect()->route('admin.sliders.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy(Slider $slider){
        Storage::delete($slider->image);
        Slider::destroy($slider->id);
      return redirect()->route('admin.sliders.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
