<?php

namespace App\Http\Controllers;

use App\Exports\SizesExport;
use Illuminate\Http\Request;
use App\Exports\ColorsExport;
use App\Exports\ProductsExport;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function productExport()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function categoryExport()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
    public function colorExport()
    {
        return Excel::download(new ColorsExport, 'colors.xlsx');
    }

    public function sizeExport()
    {
        return Excel::download(new SizesExport, 'sizes.xlsx');
    }
}
