<?php

namespace App\Exports;

use App\Models\Repairment;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings};

class RepairmentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Nama Kendaraan',
            'Status',
            'Created At',
            'Updated At' 
        ];
    } 
    
    public function collection()
    {
        return Repairment::select('id', 'vehicle_name', 'status', 'created_at', 'updated_at')->get();
    }
}
