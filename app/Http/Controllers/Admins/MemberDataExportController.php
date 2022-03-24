<?php

namespace App\Http\Controllers\Admins;

use App\Models\MemberData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\MemberDatasExport;
use Maatwebsite\Excel\Facades\Excel;

class MemberDataExportController extends Controller
{
  
	public function export()
	{
    return (new MemberDatasExport)->download('Data_Anggota.xlsx');
	}
}
