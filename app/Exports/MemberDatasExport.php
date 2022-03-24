<?php

namespace App\Exports;

use App\Models\MemberData;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class MemberDatasExport implements FromView
{

  use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        return view('admin.member_data.export.index', [
          'member_datas' => MemberData::where('is_active',1)->get()
        ]);
    }
    
}
