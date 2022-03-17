<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('can:super admin');
  }
    public function index(){
      $users = User::where('id', '!=', User::first()->id)->get();
      return view('admin.user.index',compact(['users']));
    }

    public function create(){
      $permissions = Permission::where('id', '!=', Permission::first()->id)->get();
      return view('admin.user.create',compact(['permissions']));
    }

    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required',
      ],
      [
          'name.required' => 'Nama harus diisi',
          'email.required' => 'Email harus diisi',
          'email.unique' => 'Email tidak boleh sama',
          'password.required' => 'Password baru harus diisi',
          'password_confirmation.required' => 'Konfirmasi password baru harus diisi',
          'password.min' => 'Password minimal 6 karakter'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
      ]);
      $user->givepermissionTo($request->permission);
      return redirect()->route('admin.users.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit(User $user){
      $permissions = Permission::where('id', '!=', Permission::first()->id)->get();
      return view('admin.user.edit',compact(['permissions', 'user']));
    }

    public function update(Request $request, User $user){
      $request->validate([
        'name' => 'required',
        'email' => 'required|string|max:255'
      ],
      [
          'name.required' => 'Nama harus diisi',
          'email.required' => 'Email harus diisi',
      ]);

      if($user->email != $request->email){
        $request->validate([
          'name' => 'required',
          'email' => 'unique:users'
        ],
        [
            'email.unique' => 'Email tidak boleh sama'
        ]);
      }

      $user->update([
        'name' => $request->name,
        'email' => $request->email
      ]);
      if($user->permissions->count() != 0){
        if(($request->permission != $user->permissions->first()->name)){
          $user->revokepermissionTo($user->permissions->first()->name);
        }
      }
      $user->givepermissionTo($request->permission);
      return redirect()->route('admin.users.index')->with(['success' => 'Data berhasil diubah']);
    }


}
