<?php

namespace App\Http\Controllers\Admins;

use App\Models\Slider;
use Illuminate\Http\Request;
use Torann\Hashids\Facade\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
  public function __construct()
  {
      $this->middleware('can:super admin');
  }
    public function index(){
      $sliders = Slider::orderBy('order','asc')->get();
      $slider_order = Slider::pluck('order')->toArray();
      $differenceArray = array_diff([1,2,3,4,5,6], $slider_order);
      return view('admin.slider.index', compact('sliders','differenceArray'));
    }

    public function create(){
    }

    public function store(Request $request){
      
      $validatedData = $request->validate([
        'image' => 'image',
        'order' => 'required'
      ],
      [
        'order.required' => 'Urutan harus diisi',
        'image.image' => 'File harus berbentuk gambar'
      ]);
      $validatedData['image'] = $request->file('image')->store('slider');
      
      $slider = Slider::create($validatedData);
      return redirect()->route('admin.sliders.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit($id){
      $slider = array();
      array_push($slider, ['id' => $id, 'order' => Slider::find($id)->order]);
      return response()->json($slider);
    }

    public function updateData(Request $request){
      $slider = Slider::find($request->id);
      $order_slider = Slider::where('order', $request->order);

      if ($order_slider){
        $order_slider->update(['order' => $slider->order]);
      }
      Slider::where('id', $slider->id)->update(['order' => $request->order]);
      return redirect()->route('admin.sliders.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id){
      $slider = Slider::find($id);
        Storage::delete($slider->image);
        Slider::destroy($slider->id);
      return redirect()->route('admin.sliders.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
