<?php

namespace App\Http\Controllers\Admins;

use App\Models\Group;
use App\Models\Schedule;
use App\Models\MemberData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberDataController extends Controller
{
  public function __construct()
  {
      $this->middleware('can:super admin');
  }
  
    public function index(){
      $member_datas = MemberData::all();
      return view('admin.member_data.index', compact(['member_datas']));
    }

    public function create(){
      $groups = Group::all();
      return view('admin.member_data.create', compact(['groups']));
    }

    public function store(Request $request){
      
      $validatedData = $request->validate([
        'name' => 'required',
        'birth_date' => 'required',
        'birth_place' => 'required|max:255',
        'baptize' => 'required|max:255',
        'sidi' => 'required',
        'group' => 'required',
        'family_name' => 'required',
        'sex' => 'required',
        'id_number' => 'required|unique:member_data|numeric|digits:16',
      ],
      [
          'name.required' => 'Nama harus diisi',
          'birth_date.required' => 'Tanggal lahir harus diisi',
          'birth_place.required' => 'Tempat lahir harus diisi',
          'family_name.required' => 'Nama Keluarga harus diisi',
          'baptize.required' => 'Status baptis harus diisi',
          'sidi.required' => 'Status sidi harus diisi',
          'group.required' => 'Kolom harus diisi',
          'sex.required' => 'Jenis Kelamin harus diisi',
          'id_number.required' => 'NIK harus diisi',
          'id_number.unique' => 'NIK sudah ada',
          'id_number.numeric' => 'NIK harus angka',
          'id_number.digits' => 'NIK harus 16 angka',
      ]);
  
      MemberData::create($validatedData);
      return redirect()->route('admin.member_datas.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit(MemberData $member_data){
      $groups = Group::all();
      return view('admin.member_data.edit', compact(['member_data','groups']));
    }
  
    public function update(Request $request, MemberData $member_data){
      
      $validatedData = $request->validate([
        'name' => 'required',
        'birth_date' => 'required',
        'birth_place' => 'required|max:255',
        'baptize' => 'required|max:255',
        'sidi' => 'required',
        'group' => 'required',
        'family_name' => 'required',
        'sex' => 'required',
      ],
      [
          'name.required' => 'Nama harus diisi',
          'birth_date.required' => 'Tanggal lahir harus diisi',
          'birth_place.required' => 'Tempat lahir harus diisi',
          'family_name.required' => 'Nama Keluarga harus diisi',
          'baptize.required' => 'Status baptis harus diisi',
          'sidi.required' => 'Status sidi harus diisi',
          'group.required' => 'Kolom harus diisi',
          'sex.required' => 'Jenis Kelamin harus diisi',
      ]);

      if($request->id_number != $member_data->id_number){
        $validatedData = $request->validate([
          'id_number' => 'required|unique:member_data|numeric|digits:16',
        ],
        [
          'id_number.required' => 'NIK harus diisi',
          'id_number.unique' => 'NIK sudah ada',
          'id_number.numeric' => 'NIK harus angka',
          'id_number.digits' => 'NIK harus 16 angka',
        ]);
      }
  
      MemberData::where('id', $member_data->id)->update($validatedData);
      return redirect()->route('admin.member_datas.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy(MemberData $member_data){
      MemberData::destroy($member_data->id);
      return redirect()->route('admin.member_datas.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function isActive(MemberData $member_data){
      if($member_data->is_active){
        $member_data->update(['is_active' => false]);
      }
      else{
        $member_data->update(['is_active' => true]);
      }
      return redirect()->route('admin.member_datas.index')->with(['success' => 'Data berhasil diubah']);
    }
}
