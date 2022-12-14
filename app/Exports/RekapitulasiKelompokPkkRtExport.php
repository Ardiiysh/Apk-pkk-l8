<?php

namespace App\Exports;

use App\Models\RekapitulasiKelompokPkkRt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class RekapitulasiKelompokPkkRtExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RekapitulasiKelompokPkkRt::all();
    }
    public function headings(): array
    {
        return[ 'ID Rekapitulasi Kelompok Pkk Rt' ,
        'RT' ,
        'RW' ,
        'Kelurahan' ,
        'Tahun' ,
        'Keterangan' ,"Created_at","Updated_at"];
    }
}
