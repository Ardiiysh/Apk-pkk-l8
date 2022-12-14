<?php

namespace App\Exports;

use App\Models\DataHatinya;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataHatinyaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DataHatinya::all();
    }

    public function headings(): array
    {
        return [
            'ID Data Hatinya',
            'RT',
            'RW',
            'Kelurahan',
            'Kecamatan',
            'Kabupaten/Kota',
            'Provinsi',
            'Keterangan'
            ,"Created_at","Updated_at"
        ];
    }
}
