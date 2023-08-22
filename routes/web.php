<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'dashboard']);
Route::get('/category-wise-products/{id}', [FrontendController::class, 'categoryWiseProducts'])->name('category_wise.products');
Route::get('/product-details/{id}', [FrontendController::class, 'productDetails'])->name('product.details');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','mypermission'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'dashboard']);

    Route::prefix('comments')->group(function () {
        Route::post('/store', [CommentController::class, 'store'])->name('comment.store');
    });

    Route::prefix('products')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');

        Route::get('/pdf', [PdfController::class, 'productPDFGenerate'])->name('product.pdf');
        Route::get('/excel', [ExcelController::class, 'productExport'])->name('product.excel');

        Route::get('/trashlist', [ProductController::class, 'trashlist'])->name('product.trashlist');

        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
        Route::get('/restoreall', [ProductController::class, 'restoreall'])->name('product.restoreall');

        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');

        Route::get('/pdf', [PdfController::class, 'categoryPDFGenerate'])->name('category.pdf');
        Route::get('/excel', [ExcelController::class, 'categoryExport'])->name('category.excel');

        Route::get('/trashlist', [CategoryController::class, 'trashlist'])->name('category.trashlist');

        Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('/restoreall', [CategoryController::class, 'restoreall'])->name('category.restoreall');

        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::prefix('colors')->group(function () {
        Route::get('/index', [ColorController::class, 'index'])->name('color.index');
        Route::get('/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/store', [ColorController::class, 'store'])->name('color.store');
        Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('/update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::delete('/destroy/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
        Route::get('/show/{id}', [ColorController::class, 'show'])->name('color.show');

        Route::get('/pdf', [PdfController::class, 'colorPDFGenerate'])->name('color.pdf');
        Route::get('/excel', [ExcelController::class, 'colorExport'])->name('color.excel');

        Route::get('/trashlist', [ColorController::class, 'trashlist'])->name('color.trashlist');

        Route::get('/restore/{id}', [ColorController::class, 'restore'])->name('color.restore');
        Route::get('/restoreall', [ColorController::class, 'restoreall'])->name('color.restoreall');

        Route::delete('/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');
    });

    Route::prefix('sizes')->group(function () {
        Route::get('/index', [SizeController::class, 'index'])->name('size.index');
        Route::get('/create', [SizeController::class, 'create'])->name('size.create');
        Route::post('/store', [SizeController::class, 'store'])->name('size.store');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
        Route::post('/update/{id}', [SizeController::class, 'update'])->name('size.update');
        Route::delete('/destroy/{id}', [SizeController::class, 'destroy'])->name('size.destroy');
        Route::get('/show/{id}', [SizeController::class, 'show'])->name('size.show');

        Route::get('/pdf', [PdfController::class, 'sizePDFGenerate'])->name('size.pdf');
        Route::get('/excel', [ExcelController::class, 'sizeExport'])->name('size.excel');

        Route::get('/trashlist', [SizeController::class, 'trashlist'])->name('size.trashlist');

        Route::get('/restore/{id}', [SizeController::class, 'restore'])->name('size.restore');
        Route::get('/restoreall', [SizeController::class, 'restoreall'])->name('size.restoreall');

        Route::delete('/delete/{id}', [SizeController::class, 'delete'])->name('size.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::post('/contact-update/{id}', [UserController::class, 'contactUpdate'])->name('user.contact.update');
    });

    Route::prefix('carts')->group(function () {
        Route::get('/index', [CartController::class, 'shoppingCart'])->name('cart.index');
        Route::post('/store', [CartController::class, 'store'])->name('cart.store');
    });

    Route::prefix('sliders')->group(function () {
        Route::get('/index', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
        Route::get('/show/{id}', [SliderController::class, 'show'])->name('slider.show');

        Route::get('/trashlist', [SliderController::class, 'trashlist'])->name('slider.trashlist');

        Route::get('/restore/{id}', [SliderController::class, 'restore'])->name('slider.restore');
        Route::get('/restoreall', [SliderController::class, 'restoreall'])->name('slider.restoreall');

        Route::delete('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    });
});


require __DIR__.'/auth.php';
