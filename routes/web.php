<?php

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

Route::get('/', 'PagesController@login');

Route::get('/dashboard', 'PagesController@dashboard');

Route::get('/login', 'PagesController@login');

Route::get('/edit_order', 'PagesController@editOrder');
Route::get('/view_order', 'PagesController@viewOrder');

Route::get('/edit_sales', 'PagesController@editSale');
Route::get('/view_sales', 'SalesRecordsController@show');

Route::get('/edit_expense', 'PagesController@editExpense');
Route::get('/view_expense', 'PagesController@viewExpense');

Route::get('/seedplant', 'PagesController@viewSeedPlant');
Route::get('/seedlingplant', 'PagesController@editSeedlingsPlant');


Route::get('/about', 'PagesController@about');
Route::get('/trial', 'PagesController@trial');


Auth::routes();

Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard');

Route::resource('sales','SalesRecordsController');
Route::resource('expenses','ExpensesRecordsController');



