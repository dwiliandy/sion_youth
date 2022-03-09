<?php

namespace App\Http\Controllers\Admins;

use App\Models\Criticism;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CriticismController extends Controller
{
    public function index(){
      $criticisms = Criticism::all();
      return view('admin.criticism.index', compact(['criticisms']));
    }
}
