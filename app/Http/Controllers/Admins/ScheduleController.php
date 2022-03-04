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
    $validatedData = $request->validate([
      'date' => 'required',
      'time' => 'required',
      'family_name' => 'required|max:255',
      'name' => 'required|max:255',
      'group' => 'required',
      'preacher' => 'required',
    ],
    [
        'date.required' => 'Tanggal harus diisi',
        'time.required' => 'Jam ibadah harus diisi',
        'family_name.required' => 'Nama Keluarga harus diisi',
        'family_name.max' => 'Nama Keluarga maksimal 255 karakter',
        'name.required' => 'Atas Nama harus diisi',
        'name.max' => 'Atas Nama maksimal 255 karakter',
        'group.required' => 'Kolom harus diisi',
        'preacher.required' => 'Khadim harus diisi',
    ]);

    $validatedData['sector_id'] = $request->sector_id;

    $schedule = Schedule::create($validatedData);
    return redirect()->route('get-schedule', ['sector' => $schedule->sector->id])->with(['success' => 'Data berhasil diubah']);
  }

  public function edit(Schedule $schedule){
    $groups = Group::all();
    return view('admin.schedule.edit', compact(['schedule','groups']));
  }

  public function update(Request $request, Schedule $schedule){
    
    $validatedData = $request->validate([
      'date' => 'required',
      'time' => 'required',
      'family_name' => 'required|max:255',
      'name' => 'required|max:255',
      'group' => 'required',
      'preacher' => 'required',
    ],
    [
        'date.required' => 'Tanggal harus diisi',
        'time.required' => 'Jam ibadah harus diisi',
        'family_name.required' => 'Nama Keluarga harus diisi',
        'family_name.max' => 'Nama Keluarga maksimal 255 karakter',
        'name.required' => 'Atas Nama harus diisi',
        'name.max' => 'Atas Nama maksimal 255 karakter',
        'group.required' => 'Kolom harus diisi',
        'preacher.required' => 'Khadim harus diisi',
    ]);

    Schedule::where('id', $schedule->id)->update($validatedData);
    return redirect()->route('get-schedule', ['sector' => $schedule->sector->id])->with(['success' => 'Data berhasil diubah']);
  }

  public function destroy(Schedule $schedule){
    Schedule::destroy($schedule->id);
    return redirect()->route('get-schedule', ['sector' => $schedule->sector->id])->with(['success' => 'Data berhasil dihapus']);
  }
}