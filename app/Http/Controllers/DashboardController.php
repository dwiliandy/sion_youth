<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sector;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Schedule;
use App\Models\MemberData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function welcome(){
      $startDate = Carbon::today();
      $endDate = Carbon::today()->addDays(7);
      $start = date('z', strtotime(Carbon::now())) + 1;
      // end range 7 days from now
      $end = date('z', strtotime(Carbon::now())) + 1 + 7;
      // $member_birthday = MemberData::where('is_active',true)->whereRaw("DAYOFYEAR(birth_date) BETWEEN $start AND $end")->get();
      $member_birthday = MemberData::where('is_active',true)->whereMonth('birth_date', '=', Carbon::now()->format('m'))->whereDay('birth_date', '=', Carbon::now()->format('d'))->get();
      $articles = Category::where('name','artikel')->first()->posts->where('published',true)->take(6);
      $khotbahs = Category::where('name','khotbah')->first()->posts->where('published',true)->take(6);
      $schedules = Schedule::whereBetween('date', [$startDate, $endDate])->with('sector')->get();
      $sliders = Slider::query()->orderBy('order','asc')->get();
      return view('welcome',[
        'articles' => $articles,
        'khotbahs' => $khotbahs,
        'schedules' => $schedules,
        'member_birthday' => $member_birthday,
        'sliders' => $sliders,
      ]);
    }
}
