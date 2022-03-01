<?php

namespace App\Http\Controllers;

use App\Models\Criticism;
use Illuminate\Http\Request;

class CriticismController extends Controller
{
    public function store(Request $request)
    {
      Criticism::create($request->all());
      return redirect()->route('root')->with('success', 'Data berhasil ditambahkan!');
    }

}
