<?php

namespace App\Http\Controllers\Admins;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index(){;
      $groups = Group::all();
      return view('admin.group.index', compact(['groups']));
    }
}