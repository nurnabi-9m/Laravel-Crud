<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RoleController,HomeController,CategoryController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/role', function () {
//     return view('resources\views\role\add.blade.php');
// });
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// all user role routes start here;
Route::get('/role', [RoleController::class, 'addform']);
Route::post('/role/add', [RoleController::class, 'storerole']);
// all user role routes end here;

//Category Routes start here;
Route::get('/category/create',[CategoryController::class, 'create']);
Route::get('/category/index',[CategoryController::class, 'index']);
Route::post('/category/store',[CategoryController::class, 'store']);
Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('destroy');
Route::get('/category/trashed',[CategoryController::class, 'deletedcategory'])->name('category.trashed');
Route::get('/category/restore/{id}',[CategoryController::class, 'restore'])->name('category.restore');
//Category Routes end here;
