<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::any('funcionario/search','FuncionarioController@search')->name('funcionario.search');
Route::get('funcionario/novo','FuncionarioController@create')->name('funcionario.create');
Route::post('funcionario/novo','FuncionarioController@store')->name('funcionario.store');
Route::get('funcionario','FuncionarioController@index')->name('funcionario.index');
Route::get('funcionario/{id}','FuncionarioController@show')->name('funcionario.show');
Route::get('funcionario/{id}/edit','FuncionarioController@edit')->name('funcionario.edit');
Route::put('funcionario/{id}','FuncionarioController@update')->name('funcionario.update');
Route::delete('funcionario/{id}','FuncionarioController@destroy')->name('funcionario.destroy');


Route::post('balance/deposit','BalanceController@balanceStore')->name('balance.store');
Route::get('balance/deposit','BalanceController@create')->name('balance.deposit');
Route::get('balance/deposit/edit/{id_user}/{id_func}','BalanceController@edit')->name('balance.edit');

Route::any('historic/search','HistoricController@search')->name('historic.search');
Route::get('historic','HistoricController@index')->name('historic.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
