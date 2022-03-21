<?php

namespace App\Imports;

use Throwable;
use Carbon\Carbon;
use App\Models\MemberData;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MemberDatasImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{

  use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct()
    {
        MemberData::truncate();
    }

    public function model(array $row)
    {
        if($row['tempat_lahir'] == NULL){
          $row['tempat_lahir'] = '-';
        }
        if($row['jenis_kelamin'] == 'P'){
          $row['jenis_kelamin'] = 'female';
        }else{
          $row['jenis_kelamin'] = 'male';
        }

        if($row['baptis'] == 'sudah-baptis'){
          $row['baptis'] = 'already';
        }else{
          $row['baptis'] = 'not_yet';
        }

        if($row['sidi'] == 'sudah-sidi'){
          $row['sidi'] = 'already';
        }else{
          $row['sidi'] = 'not_yet';
        }
        $row['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $row['tanggal_lahir']);
        
        MemberData::Create([ 
          'name' => $row['nama_lengkap'],
            'id_number' => $row['nik'],
            'sex' => $row['jenis_kelamin'],
            'birth_place' => $row['tempat_lahir'],
            'birth_date' => $row['tanggal_lahir'],
            'baptize' => $row['baptis'],
            'sidi' => $row['sidi'],
            'family_name' => $row['nama_keluarga'],
            'group' => $row['kolom']
      ]);
    }

    public function onError(Throwable $error){

    }

    public function customValidationMessages()
    {
      return [
          'nama_lengkap.required' => 'Nama harus diisi',
          'tanggal_lahir.date_format:d/m/Y' => 'Format tanggal harus DD/MM/YYYY',
          'tanggal lahir.required' => 'Tanggal lahir harus diisi',
          'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
          'tempat_lahir.required' => 'Tempat lahir harus diisi',
          'nama_keluarga.required' => 'Nama Keluarga harus diisi',
          'baptis.required' => 'Status baptis harus diisi',
          'sidi.required' => 'Status sidi harus diisi',
          'kolom.required' => 'Kolom harus diisi',
      ];
    }

    public function rules(): array
    {
     
      return [
        'nama_lengkap' => 'required',
        'jenis_kelamin' => [
          'required',
          Rule::in(['L','P'])
       ],
        'tanggal_lahir' => 'required',
        'baptis' => [
          'required', 
          Rule::in(['sudah-baptis','belum-baptis'])
       ],
        'sidi' => [
          'required',
          Rule::in(['sudah-sidi','belum-sidi'])
       ],
        'nama_keluarga' => 'required',
        'kolom' => 'required',
      ];
    }


}
