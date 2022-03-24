<?php

namespace App\Http\Controllers\Admins;

use File;
use Repsonse;
use Illuminate\Http\Request;
use App\Imports\SchedulesImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ScheduleImportController extends Controller
{
  public function index($sector){
    return view('admin.schedule.import.index', compact('sector'));
  }

  public function store(Request $request){

    $validatedData = $request->validate([
      'file' => 'required|mimes:xlsx, csv, xls',
    ],
    [
      'file.mimes' => 'Format tidak sesuai',
    ]);
    $file = $request->file('file')->store('import');
    $sector = $request->sector;
    $import = new SchedulesImport($sector);
    $import->import($file);

    if($import->failures()->isNotEmpty()){
      return back()->withFailures($import->failures());
    }
           
    return redirect()->route('get-schedule', ['sector' => $sector])->with(['success' => 'Data berhasil diubah']);
  }
}
