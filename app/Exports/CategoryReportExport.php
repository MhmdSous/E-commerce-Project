<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Category::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'created_at',
            'updated_at',
        ];
    }
}
