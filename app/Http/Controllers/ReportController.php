<?php

namespace App\Http\Controllers;

use App\Exports\ProductReportExport;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ProductReportExport(), 'product_report.xlsx');
    }

    public function exportPDF()
    {
        $products = Product::all(); // Retrieve all products from the database

        $data = [
            'products' => $products,

        ];


        $pdf = app('dompdf.wrapper')->loadView('backend.pdf.product_view', $data);

        return $pdf->download('report.pdf');
    }
    public function exportCategoryPdf()
{
    $categories=Category::all();
    $pdf = app('dompdf.wrapper')->loadView('backend.pdf.category_view',compact('categories'));
    return $pdf->download('categories.pdf');
}
}
