<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductReportExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        // Fetch the products with their associated category name
        $products = Product::with('category')->get();

        // Prepare the data for export
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'Product ID' => $product->id,
                'Name' => $product->name,
                'Category Name' => $product->category->name,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,

            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Product ID', 'Name', 'Category Name', 'created_at',
            'updated_at',
        ]; // Add more column headings here as needed
    }
}
