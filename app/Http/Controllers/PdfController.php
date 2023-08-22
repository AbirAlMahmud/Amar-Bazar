<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use Mpdf\Mpdf;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function productPDFGenerate()
    {
        $products = Product::all();

        $fileName = 'products.pdf';

        $html = view('backend.products.product_pdf', compact('products'))->render();

        $mpdf = new Mpdf();

        $mpdf->SetWatermarkText('SEIP PONDIT');
        $mpdf->showWatermarkText = true;

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
    }

    public function categoryPDFGenerate()
    {
        $categories = Category::all();

        $fileName = 'categories.pdf';

        $html = view('backend.categories.category_pdf', compact('categories'))->render();

        $mpdf = new Mpdf();

        $mpdf->SetWatermarkText('SEIP PONDIT');
        $mpdf->showWatermarkText = true;

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
    }

    public function colorPDFGenerate()
    {
        $colors = Color::all();

        $fileName = 'colors.pdf';

        $html = view('backend.colors.color_pdf', compact('colors'))->render();

        $mpdf = new Mpdf();

        $mpdf->SetWatermarkText('SEIP PONDIT');
        $mpdf->showWatermarkText = true;

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
    }

    public function sizePDFGenerate()
    {
        $sizes = Size::all();

        $fileName = 'sizes.pdf';

        $html = view('backend.sizes.size_pdf', compact('sizes'))->render();

        $mpdf = new Mpdf();

        $mpdf->SetWatermarkText('SEIP PONDIT');
        $mpdf->showWatermarkText = true;

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
    }
}
