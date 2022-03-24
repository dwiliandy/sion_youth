<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\CriticismController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admins\GroupController;
use App\Http\Controllers\Admins\NewsController  as AdminsNewsController;
use App\Http\Controllers\Admins\DownloadController  as AdminsDownloadController;
use App\Http\Controllers\Admins\MemberDataImportController  as AdminsMemberDataImportController;
use App\Http\Controllers\Admins\MemberDataExportController  as AdminsMemberDataExportController;
use App\Http\Controllers\Admins\ScheduleImportController  as AdminsScheduleImportController;
use App\Http\Controllers\Admins\DashboardController  as AdminsDashboardController;
use App\Http\Controllers\Admins\PostController  as AdminsPostController;
use App\Http\Controllers\Admins\SectorController  as AdminsSectorController;
use App\Http\Controllers\Admins\SliderController  as AdminsSliderController;
use App\Http\Controllers\Admins\ScheduleController  as AdminsScheduleController;
use App\Http\Controllers\Admins\CriticismController  as AdminsCriticismController;
use App\Http\Controllers\Admins\MemberDataController  as AdminsMemberDataController;



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

// For Hostinger, run the route for symbolic link
Route::get('/store-data', function () {
   Artisan::call('storage:link');
})->name('storage');

// For Hostinger, run the route for migrate data
Route::get('/migration', function () {
  \Artisan::call('migrate');
})->name('migrate');

#Guest Route
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/organization', function () {
    return view('organization');
  })->name('organization');


  require __DIR__.'/auth.php';

  Route::get('/', [DashboardController::class, 'welcome'])->name('root');

  #Post
  Route::resource('/posts', 'PostController');
  Route::get('articles', [PostController::class, 'getArticles'])->name('article');
  Route::get('sermons', [PostController::class, 'getKhotbah'])->name('khotbah');

  #Prayer
  Route::resource('/prayers', 'PrayerController');

  #Criticism
  Route::post('/criticism', [CriticismController::class, 'store'])->name('criticism.store');
  
  #News
  Route::get('/news', [NewsController::class, 'index'])->name('news.index');
  Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

#End Guest Route

#Admin Route
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
  
  #Importing Route
  Route::get('import_member_data', [AdminsMemberDataImportController::class, 'index'])->name('import_member_data.index');
  Route::post('import_member_data', [AdminsMemberDataImportController::class, 'store'])->name('import_member_data');
  
  Route::get('/sectors/{sector}/schedule/import_schedule', [AdminsScheduleImportController::class, 'index'])->name('import_schedule.index');
  Route::post('import_schedule', [AdminsScheduleImportController::class, 'store'])->name('import_schedule');

  #Exporting Route
  Route::get('/admin/member_datas/import_member_data/export_excel', [AdminsMemberDataExportController::class, 'export'])->name('export_member_data.export');

  #Download Template
  Route::get('download-member-data', [AdminsDownloadController::class, 'downloadMemberData'])->name('download-member-data');
  Route::get('download-schedule', [AdminsDownloadController::class, 'downloadSchedule'])->name('download-schedule');

  Route::get('/changePassword',[AdminsDashboardController::class,'changePassword'])->name('change-password');
  Route::get('/changePassword/update/{id}',[AdminsDashboardController::class,'updatePassword'])->name('updatePassword');
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard');

  #Group
  Route::resource('/groups', 'Admins\GroupController');
  Route::post('/group/edit', [GroupController::class,'editGroup'])->name('edit-group');
  
  #User
  Route::resource('/users', 'Admins\UserController', ['names' => 'admin.users']);

  #Post
  Route::resource('/posts', 'Admins\PostController', ['names' => 'admin.posts']);
  Route::post('/posts/publish_data/{post}', [AdminsPostController::class,'publishData'])->name('publish-data');
  Route::post('/posts/unpublish_data/{post}', [AdminsPostController::class,'unpublishData'])->name('unpublish-data');

  #Sector
  Route::resource('/sectors', 'Admins\SectorController', ['names' => 'admin.sectors']);
  Route::get('/sectors/{sector}/schedule', [AdminsSectorController::class,'getSchedule'])->name('get-schedule');
  Route::post('/sectors/update-data', [AdminsSectorController::class,'updateDataSector'])->name('admin.sector.update-data');
  
  #Schedule
  Route::resource('/schedules', 'Admins\ScheduleController', ['names' => 'admin.schedules']);
  Route::get('/schedules/create/{sector}', [AdminsScheduleController::class,'create'])->name('admin.schedules.create');

  #Member Data
  Route::resource('/member_datas', 'Admins\MemberDataController', ['names' => 'admin.member_datas']);
  Route::post('/member_datas/is_active/{member_data}', [AdminsMemberDataController::class,'isActive'])->name('admin.member_datas.is-active');

  #Criticsm
  Route::get('/criticisms', [AdminsCriticismController::class,'index'])->name('admin.criticism.index');

  #News
  Route::resource('/news', 'Admins\NewsController', ['names' => 'admin.news']);
  
  #Slider
  Route::resource('/sliders', 'Admins\SliderController', ['names' => 'admin.sliders']);
  Route::post('/sliders/update-data', [AdminsSliderController::class,'updateData'])->name('admin.sliders.update-data');

});

#End Admin Route