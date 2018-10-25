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

Route::get('/page1', 'PageController@page_1');
Route::get('/page2', 'PageController@page2');
Route::get('/page3', 'PageController@page3');
Route::get('/page4', 'PageController@page4');
Route::get('/page5', 'PageController@page5');
Route::get('/page6', 'PageController@page6');
Route::get('/page7', 'PageController@page7');
Route::get('/page8', 'PageController@page8');
Route::get('/page9', 'PageController@page9');
Route::get('/page10', 'PageController@page10');
Route::get('/page11', 'PageController@page11');
Route::get('/page12', 'PageController@page12');
Route::get('/page13', 'PageController@page13');
Route::get('/page14', 'PageController@page14');

Route::post('/canvas1', 'ConvertController@canvas1');
Route::post('/canvas2', 'ConvertController@canvas2');
Route::post('/canvas3', 'ConvertController@canvas3');
Route::post('/canvas4', 'ConvertController@canvas4');
Route::post('/canvas5', 'ConvertController@canvas5');
Route::post('/canvas6', 'ConvertController@canvas6');
Route::post('/canvas7', 'ConvertController@canvas7');
Route::post('/canvas8', 'ConvertController@canvas8');
Route::post('/canvas9', 'ConvertController@canvas9');
Route::post('/canvas10', 'ConvertController@canvas10');
Route::post('/canvas11', 'ConvertController@canvas11');
//pdf
Route::get('/pdf/pdf2', 'ExportController@pdf2');
Route::get('/pdf/pdf1', 'ExportController@pdf1');
Route::get('/pdf/pdf3', 'ExportController@pdf3');
Route::get('/pdf/pdf4', 'ExportController@pdf4');
Route::get('/pdf/pdf5', 'ExportController@pdf5');
Route::get('/pdf/pdf6', 'ExportController@pdf6');
Route::get('/pdf/pdf7', 'ExportController@pdf7');
Route::get('/pdf/pdf8', 'ExportController@pdf8');
Route::get('/pdf/pdf9', 'ExportController@pdf9');
Route::get('/pdf/pdf10', 'ExportController@pdf10');
Route::get('/pdf/pdf11', 'ExportController@pdf11');

Route::get('/print', 'PdfController@index');
Route::get('/pdf', 'PageController@all');

Route::get('/print_all', 'PageController@print');
Route::get('/report_print', 'PageController@report');
Route::get('/chart/data', 'PageController@data');
Route::get('image', 'NewController@index');
Route::get('/doc', 'ReportController@report_doc');
Route::get('/doc1', 'DocController@print');

Route::get('/chart_render', 'PageController@chartjs1');
Route::get('/print_new', 'PrintController@index');
