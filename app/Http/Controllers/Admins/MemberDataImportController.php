<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Imports\MemberDatasImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class MemberDataImportController extends Controller
{
    public function index(){
      return view('admin.member_data.import.index');
    }

    public function store(Request $request){

      $validatedData = $request->validate([
        'file' => 'required|mimes:xlsx, csv, xls',
      ],
      [
        'file.mimes' => 'Format tidak sesuai',
      ]);
      $file = $request->file('file')->store('import');

      $import = new MemberDatasImport;
      $import->import($file);

      if($import->failures()->isNotEmpty()){
        return back()->withFailures($import->failures());
      }
             
      return redirect()->route('admin.member_datas.index')->with(['success' => 'Data berhasil dibuat']);
    }
}
