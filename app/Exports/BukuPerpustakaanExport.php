<?php

namespace App\Exports;

use App\Models\BukuPerpustakaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuPerpustakaanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BukuPerpustakaan::all();
    }

    public function headings(): array
    {
        return [
            'ID Buku Perpustakaan',
            'ID Perpustakaan',
            'ID Buku',
            'Jumlah',
            'Created_at',
            'Updated_at'
        ];
    }
}
