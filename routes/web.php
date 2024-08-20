<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\MenuDeptController;

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

Route::get('/', function () {
    return view('welcome');
});
// CRUD các data chính: category, product, lot, procedure, department, process
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('lots', LotController::class);
Route::resource('procedures',ProcedureController::class);
Route::resource('processes',ProcessController::class);
Route::resource('departments', DepartmentController::class);
// Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');

// Input các data chính để bắt đầu theo dõi
Route::get('tracking',[InputController::class,'index'])->name('tracking.index');
// Route::get('tracking/input',[InputController::class,'input'])->name('tracking.input');
Route::post('tracking/store',[InputController::class,'store'])->name('tracking.store');

// Hiển thị các data đã được input
Route::get('fe',[FeController::class,'index'])->name('fe.index');
Route::get('fe/show/{id}',[FeController::class,'show'])->name('fe.show');

// Hiển thị cửa sổ các department để theo dõi và cập nhật tiến độ
Route::get('fe/dept/{id}',[FeController::class,'showDept'])->name('fe.dept');
Route::post('fe/dept/update/{id}', [FeController::class, 'update'])->name('fe.dept.update');