<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_index;

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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/',[C_index::class,'index']);
Route::get('/home',[C_index::class,'index']);

Route::get('/all',[C_index::class,'indexAll']);
Route::get('/customer-{cust}',[C_index::class,'indexCustomer']);
Route::post('/customer',[C_index::class,'indexSearch']);

Route::post('/keterangan/{imei}',[C_index::class,'keterangan']);






// Route::get('/export_excel', [C_index::class,'export_excel']);

