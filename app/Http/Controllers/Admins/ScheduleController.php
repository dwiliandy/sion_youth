<?php

namespace App\Http\Controllers\Admins;

use App\Models\Group;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

  public function create($sector){
    $groups = Group::all();
    return view('admin.schedule.create', compact(['groups','sector']));
  }

  public function store(Request $request){
    $todayDate = date('Y/m/d');
    $validatedData = $request->validate([
      'date' => 'required|after_or_equal:'.$todayDate,
      'time' => 'required',
      'family_name' => 'required|max:255',
      'name' => 'required|max:255',
      'group' => 'required',
      'preacher' => 'required',
    ],
    [
        'date.required' => 'Tanggal harus diisi',
        'date.after_or_equal' => 'Tanggal tidak boleh kurang dari hari ini',
        'time.required' => 'Jam ibadah harus diisi',
        'family_name.required' => 'Nama Keluarga harus diisi',
        'family_name.max' => 'Nama Keluarga maksimal 255 karakter',
        'name.required' => 'Atas Nama harus diisi',
        'name.max' => 'Atas Nama maksimal 255 karakter',
        'group.required' => 'Kolom harus diisi',
        'preacher.required' => 'Khadim harus diisi',
    ]);

    $validatedData['sector_id'] = $request->sector_id;
    $validatedData['description'] = $request->description;

    $schedule = Schedule::create($validatedData);
    return redirect()->route('get-schedule', ['sector' => $schedule->sector->id])->with(['success' => 'Data berhasil diubah']);
  }

  public function edit(Schedule $schedule){
    $groups = Group::all();
    return view('admin.schedule.edit', compact(['schedule','groups']));
  }

  public function update(Request $request, Schedule $schedule){
    $todayDate = date('Y/m/d');
    $validatedData = $request->validate([
      'date' => 'required|after_or_equal:'.$todayDate,
      'time' => 'required',
      'family_name' => 'required|max:255',
      'name' => 'required|max:255',
      'group' => 'required',
      'preacher' => 'required',
    ],
    [
        'date.required' => 'Tanggal harus diisi',
        'date.after_or_equal' => 'Tanggal tidak boleh kurang dari hari ini',
        'time.required' => 'Jam ibadah harus diisi',
        'family_name.required' => 'Nama Keluarga harus diisi',
        'family_name.max' => 'Nama Keluarga maksimal 255 karakter',
        'name.required' => 'Atas Nama harus diisi',
        'name.max' => 'Atas Nama maksimal 255 karakter',
        'group.required' => 'Kolom harus diisi',
        'preacher.required' => 'Khadim harus diisi',
    ]);
    
    
    $validatedData['description'] = $request->description;
    Schedule::where('id', $schedule->id)->update($validatedData);
    return redirect()->route('get-schedule', ['sector' => $schedule->sector->id])->with(['success' => 'Data berhasil diubah']);
  }

  public function destroy(Schedule $schedule){
    Schedule::destroy($schedule->id);
    return redirect()->route('get-schedule', ['sector' => $schedule->sector->id])->with(['success' => 'Data berhasil dihapus']);
  }
}
