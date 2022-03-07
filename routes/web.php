<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\DashboardController;

Route::get('/Dashboard', [DashboardController::class, 'index']);

use App\Http\Controllers\ExpenseReportController;

Route::resource('/expense_reports', ExpenseReportController::class);

Route::get('/expense_reports/{id}/confirmDelete', [ExpenseReportController::class, 'confirmDelete']);

use App\Http\Controllers\ExpenseController;

Route::get('/expense_reports/{expense_report}/expenses/create', [ExpenseController::class, 'create']);
Route::post('/expense_reports/{expense_report}/expenses', [ExpenseController::class, 'store']);

Route::get('/expense_reports/{id}/confirmSendEmail', [ExpenseReportController::class, 'confirmSendEmail']);
Route::post('/expense_reports/{id}/sendEmail', [ExpenseReportController::class, 'sendEmail']);

/*
Route:: get('/test',function(){
    return view('test', [
        'title'=> 'Curso laravel Platzi!!!'
    ]);
});

Route::post('/sss',function(){
return view('sss');
});
Route::any('/ssss',function(){
    return view('ssss');
    });
    */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
