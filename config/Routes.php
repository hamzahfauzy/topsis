<?php
use vendor\zframework\Route;

Route::get("/","IndexController@index");
Route::get("/topsis","IndexController@tampilTopsis");
Route::get("/tentang","IndexController@tentang");
Route::get("/login","IndexController@login");
Route::get("/register","IndexController@register");
Route::get("/logout","IndexController@logout");
Route::post("/login","IndexController@doLogin");
Route::post("/register","IndexController@doregister");

Route::get("/detail/{id}","IndexController@detail");
Route::get("/beli/{id}","IndexController@beli");

Route::middleware('Pembeli')->prefix('/pembeli')->namespaces("pembeli")->group(function(){
	Route::get('/','IndexController@index');
	Route::get('/transaksi','IndexController@index');
	Route::get('/transaksi/invoice/{id}','IndexController@invoice');
	Route::post('/upload','IndexController@upload');
});

Route::middleware('Admin')->prefix("/admin")->namespaces("admin")->group(function(){
	Route::get("/","IndexController@index");
	Route::get("/hasil","IndexController@hasil");

	Route::get("/transaksi","IndexController@transaksi");
	Route::get("/transaksi/terima/{id}","IndexController@terima");
	Route::get("/transaksi/tolak/{id}","IndexController@tolak");
	Route::get('/transaksi/invoice/{id}','IndexController@invoice');

	Route::get("/kriteria","KriteriaController@index");
	Route::get("/kriteria/create","KriteriaController@create");
	Route::get("/kriteria/edit/{kriteria}","KriteriaController@edit");
	Route::post("/kriteria/insert","KriteriaController@insert");
	Route::post("/kriteria/update","KriteriaController@update");
	Route::get("/kriteria/delete/{kriteria}","KriteriaController@delete");

	Route::get("/kriteria/list/{kriteria}","KriteriaController@show");
	Route::get("/kriteria/list/{kriteria}/create","KriteriaController@listCreate");
	Route::get("/kriteria/list/{kriteria}/edit/{list}","KriteriaController@listEdit");
	Route::get("/kriteria/list/{kriteria}/delete/{list}","KriteriaController@listdelete");
	Route::post("/kriteria/list/save","KriteriaController@listSave");
	Route::post("/kriteria/list/update","KriteriaController@listUpdate");

	Route::get("/products","ProductController@index");
	Route::get("/products/create","ProductController@create");
	Route::get("/products/edit/{product}","ProductController@edit");
	Route::post("/products/insert","ProductController@insert");
	Route::post("/products/update","ProductController@update");
	Route::get("/products/delete/{product}","ProductController@delete");
});