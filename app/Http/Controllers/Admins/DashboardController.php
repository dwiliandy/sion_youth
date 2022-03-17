<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function changePassword(){
      return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
      $request->validate([
        'current_password' => 'required',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required',
      ],
      [
          'current_password.required' => 'Password harus diisi',
          'password.required' => 'Password baru harus diisi',
          'password_confirmation.required' => 'Konfirmasi password baru harus diisi',
          'password.min' => 'Password minimal 6 karakter'
      ]);

      $user = Auth::user();
      if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Password salah!');
      }

      $user->password = Hash::make($request->password);
      $user->save();
      Auth::logout();

      return redirect()->route('root')->with('success', 'Password berhasil diganti');
    
    }
}
