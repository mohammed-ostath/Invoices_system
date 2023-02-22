<?php
use App\invoices;
use App\Models\invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\AttachmentsController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\InvoicesDetailsController;

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
    return view('auth.login');
});

Auth::routes();
Route::resource('Archive', 'InvoiceArchiveController');
Route::get('Invoice_UnPaid',    [InvoicesController::class, 'Invoice_UnPaid' ] );
Route::get('invoice_paid',    [InvoicesController::class, 'invoice_paid' ] );
Route::get('Invoice_Partial',   [InvoicesController::class, 'Invoice_Partial'] );
Route::get('export_invoices',    [InvoicesController::class, 'export_invoices' ] );


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('invoices', 'InvoicesController');
Route::resource('sections', 'SectionsController');
Route::resource('products', 'ProductsController');

Route::get('/section/{id}', [App\Http\Controllers\HomeController::class, 'getproducts'])->name('section');
Route::get('/InvoicesDetails/{id}', [App\Http\Controllers\InvoicesDetailsController::class,'edit'])->name('InvoicesDetails');
Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');
Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');
Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');
Route::get('/{page}', 'AdminController@index');
Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');// Video 15
Route::get('/edit_invoice/{id}', [InvoicesController::class, 'edit']);// Video 15
// Route::get('/edit_invoice/{id}', 'InvoicesController@edit');
Route::get('/Status_show/{id}','InvoicesController@show')->name('Status_show');// Video 17
Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');// Video 17
// Route::get('archive', [InvoiceArchiveController::class, 'archive']);
// Route::get('Archive', 'InvoiceArchiveController');
Route::get('/Print_invoice/{id}','InvoicesController@Print_invoice');
Route::get('export_invoices', 'InvoicesController@export');





