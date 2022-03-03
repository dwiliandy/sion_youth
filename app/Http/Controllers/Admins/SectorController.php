<?php

namespace App\Http\Controllers\Admins;

use App\Models\Sector;
use App\Models\Sectpr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectorController extends Controller
{
    public function index(){
      $sectors = Sector::all();
      return view('admin.sector.index', compact(['sectors']));
    }

    public function store(Request $request){
      Sector::create(['name' => $request->get('name')]);
      return redirect()->route('admin.sectors.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit(Sector $sector){
      
      return response()->json($sector);

    }

    public function updateData(Request $request){
      
      $sector = Sector::find($request->id);
      $sector->update(['name' => $request->name]);
      return redirect()->route('admin.sectors.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function destroy(Sector $sector){
      Sector::destroy($sector->id);
      return redirect()->route('admin.sectors.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function getSchedule($sector){
      $sector_name = Sector::find($sector)->name;
      $schedules =  Sector::find($sector)->schedules;

      return view('admin.schedule.index', compact(['sector_name','schedules','sector']));
    }
}
