<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController as home;
use App\Http\Controllers\CompanyController as company;
use App\Http\Controllers\ExpenseController as exp;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'status'])->name('status');

// Companies
Route::get('/companies', [company::class, 'company'])->name('companies');
Route::post('/companies', [company::class, 'addcom'])->name('addcom');

Route::get('/companies/{company}/delete', [company::class, 'delete'])->name('com.delete');
Route::get('/companies/{company}/status', [company::class, 'status'])->name('com.status');

// Expenses
Route::post('/addexp', [exp::class, 'addexp'])->name('addexp');
Route::get('/{company}', [exp::class,'show_expenses'])->name('com.exp');
Route::post('/filter', [exp::class, 'filter'])->name('filter.expense');
Route::get('/{expense}/delete', [exp::class, 'delete'])->name('expense.delete');






