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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*this baisc route*/
Route::get('/home', 'HomeController@index')->name('home');
/*Company route */
Route::get('companies', 'CompanyController@index')->name('companies.index');
Route::get('companies/create', 'CompanyController@create')->name('companies.create');
Route::post('companies/store', 'CompanyController@store')->name('companies.store');
Route::get('companies/edit/{id}', 'CompanyController@edit')->name('companies.edit');
Route::put('companies/update/{id}', 'CompanyController@update')->name('companies.update');
Route::delete('companies/destroy/{id}', 'CompanyController@destroy')->name('companies.destroy');

/*empoyee routes*/ 

Route::get('employees', 'EmployeeController@index')->name('employees.index');
Route::get('employees/create', 'EmployeeController@create')->name('employees.create');
Route::post('employees/store', 'EmployeeController@store')->name('employees.store');
Route::get('employees/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
Route::put('employees/update/{id}', 'EmployeeController@update')->name('employees.update');
Route::delete('employees/destroy/{id}', 'EmployeeController@destroy')->name('employees.destroy');

