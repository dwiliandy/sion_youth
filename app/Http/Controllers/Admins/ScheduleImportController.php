<?php

namespace App\Http\Controllers\Admins;

use File;
use Repsonse;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Imports\SchedulesImport;
use Torann\Hashids\Facade\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ScheduleImportController extends Controller
{
  public function index($sector){
    $sector_name = Sector::find(Hashids::decode($sector)[0])->name;
    return view('admin.schedule.import.index', compact('sector','sector_name'));
  }

  public function store(Request $request){

    $validatedData = $request->validate([
      'file' => 'required|mimes:xlsx, csv, xls',
    ],
    [
      'file.mimes' => 'Format tidak sesuai',
    ]);
    $file = $request->file('file')->store('import');
    $sector = Hashids::decode($request->sector)[0];
    $import = new SchedulesImport($sector);
    $import->import($file);

    if($import->failures()->isNotEmpty()){
      return back()->withFailures($import->failures());
    }

    return redirect()->route('get-schedule', ['sector' => Hashids::encode($sector)])->with(['success' => 'Data berhasil diubah']);
  }
}
