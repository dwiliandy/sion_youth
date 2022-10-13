<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Sector;
use App\Models\Sectpr;
use Illuminate\Http\Request;
use Torann\Hashids\Facade\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class SectorController extends Controller
{
 

    public function index(){
      $sectors = Sector::all();
      return view('admin.sector.index', compact(['sectors']));
    }

    public function store(Request $request){
      Sector::create(['name' => $request->get('name')]);
      Permission::create(['name' => $request->name]);
      return redirect()->route('admin.sectors.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit($id){
      
      $sector = array();
      array_push($sector, ['id' => $id, 'name' => Sector::find($id)->name]);
      return response()->json($sector);

    }

    public function update(Request $request){
      $sector = Sector::find($request->id);
      Permission::where(['name' => $sector->name])->first()->update(['name' => $request->name]);
      $sector->update(['name' => $request->name]);
      return redirect()->route('admin.sectors.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id){
      $sector = Sector::find($id);
      Permission::where(['name' => $sector->name])->first()->delete();
      Sector::destroy($sector->id);
      return redirect()->route('admin.sectors.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function getSchedule($sector){
      $sector_name = Sector::find($sector)->name;
      if(Gate::check($sector_name) || Gate::check('super admin')){
        $schedules =  Sector::find($sector)->schedules->where('date','>=',Carbon::now());
        
        return view('admin.schedule.index', compact(['sector_name','schedules','sector']));
      }else{
        abort(403);
      }
    }
}
