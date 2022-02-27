<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\GroupController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
  
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard');

  #Single Route
  Route::post('/group/edit', [GroupController::class,'editGroup'])->name('edit-group');

  
  #Resource
  Route::resource('/groups', 'Admins\GroupController');
  Route::resource('/member_data', 'Admins\MemberDataController');

});
