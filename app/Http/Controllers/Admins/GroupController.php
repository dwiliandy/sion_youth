<?php

namespace App\Http\Controllers\Admins;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class GroupController extends Controller
{
  public function index(){;
    $groups = Group::all();
    return view('admin.group.index', compact(['groups']));
  }

    public function editGroup(Request $request){
      if($request->action == 'Add'){
        $total_group = Group::all()->count();
        for($i = 1;$i<=$request->total; $i++)
          {
              Group::create(['name' => $total_group+$i]);
          } 
      }else{        
        Group::orderBy('id','desc')->limit($request->total1)->delete(); 
      }
      return redirect()->route('groups.index')->with(['success' => 'Data berhasil diperbarui']);
    }
}
