<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sector;
use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function welcome(){
      $startDate = Carbon::today();
      $endDate = Carbon::today()->addDays(7);
      $articles = Category::where('name','artikel')->first()->posts->where('published',true)->take(6);
      $khotbahs = Category::where('name','khotbah')->first()->posts->where('published',true)->take(6);
      $schedules = Schedule::whereBetween('date', [$startDate, $endDate])->with('sector')->get();
      return view('welcome',[
        'articles' => $articles,
        'khotbahs' => $khotbahs,
        'schedules' => $schedules
      ]);
    }
}
