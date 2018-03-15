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

Route::get('/', function () {
    return view('welcome');
});
/**
 * file uplod
 */
Route::get('importcsv','CSVController@importCSV');
/**
 * parse and import csv
 */
Route::get('csvtodb','CSVController@csvToDb');
/**
 * get nearest building
 */
Route::match(['get', 'post'],'nearest','NearestBuildingController@getNearest');
