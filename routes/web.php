<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\GroupController;
use App\Http\Controllers\CriticismController;
use App\Http\Controllers\PrayerController;


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
})->name('root');


require __DIR__.'/auth.php';
Route::resource('/posts', 'PostsController');
Route::resource('/prayers', 'PrayerController');
Route::post('/criticism', [CriticismController::class, 'store'])->name('criticism.store');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
  
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard');

  #Group
  Route::resource('/groups', 'Admins\GroupController');
  Route::post('/group/edit', [GroupController::class,'editGroup'])->name('edit-group');
  
  #Post
  Route::resource('/posts', 'Admins\PostController', ['names' => 'admin.posts']);
  Route::post('/posts/approve_data/{post}', [GroupController::class,'approveData'])->name('approve-data');
  #Resource
  Route::resource('/member_data', 'Admins\MemberDataController');


});
