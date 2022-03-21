<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use File;
use Repsonse;

class DownloadController extends Controller
{
  public function downloadMemberData()
  {
      $filepath = public_path('excel_template/data_anggota.xlsx');
      return Response::download($filepath); 
  }
}
