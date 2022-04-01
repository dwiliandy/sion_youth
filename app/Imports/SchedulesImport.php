<?php

namespace App\Imports;

use App\Models\Schedule;

use Throwable;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SchedulesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
  use Importable, SkipsErrors, SkipsFailures;
  private $sector;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct(int $sector)
    {
        $this->sector = $sector;
        Schedule::where('sector_id', $sector)->delete();
    }

    public function model(array $row)
    {
      $row['tanggal'] = Carbon::createFromFormat('d/m/Y', $row['tanggal']);
      // dd($row['tanggal'], $row['waktu']);
        // $row['waktu'] = Carbon::createFromFormat('H:i', $row['waktu']);
        Schedule::Create([ 
          'date' => $row['tanggal'],
          'time' => $row['waktu'],
          'family_name' => $row['tempat_ibadah'],
          'name' => $row['atas_nama'],
          'group' => $row['kolom'],
          'preacher' => $row['khadim'],
          'description' => $row['deskripsi'],
          'sector_id' => $this->sector
      ]);
    }

    public function onError(Throwable $error){

    }

    public function customValidationMessages()
    {
      
      return [
        'tanggal.required' => 'Tanggal harus diisi',
        'tanggal.date_format' => 'Format tanggal harus DD/MM/YYYY',
        'waktu.required' => 'Jam ibadah harus diisi',
        'waktu.date_format' => 'Format waktu harus HH:MM',
        'tempat_ibadah.required' => 'Tempat ibadah harus diisi',
        'tempat_ibadah.max' => 'Tempat Ibadah maksimal 255 karakter',
        'atas_nama.required' => 'Atas Nama harus diisi',
        'atas_nama.max' => 'Atas Nama maksimal 255 karakter',
        'kolom.required' => 'Kolom harus diisi',
        'khadim.required' => 'Khadim harus diisi',
      ];
    }

    public function rules(): array
    {
  
      return [
        'tanggal' => 'required|date_format:d/m/Y',
        'waktu' => 'required|date_format:H:i',
        'tempat_ibadah' => 'required|max:255',
        'atas_nama' => 'required|max:255',
        'kolom' => 'required',
        'khadim' => 'required',
      ];
    }
}
