<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login na aplicação
Route::post("/login","LoginController@login");

// Galeria de fotos
Route::get("/galeria","GaleriaController@index");
Route::get('/galeria/{id}','GaleriaController@album');
Route::post("/admin/galeria","GaleriaController@create");
Route::delete('/admin/galeria/{id}',"GaleriaController@destroy");
Route::put('/admin/galeria/{id}','GaleriaController@update');
Route::post('/admin/galeria/foto/{id}','GaleriaController@addAlbumFoto');
Route::delete('/admin/galeria/foto/{id_foto}','GaleriaController@deleteAlbumFoto');


// Carosel
Route::get("/carosel","CaroselController@index");
Route::post("/admin/carosel","CaroselController@create");
Route::delete("/admin/carosel/{id_foto}","CaroselController@deleteFoto");
Route::post("/admin/carosel/{id}","CaroselController@addFoto");

// Estatuto
Route::get("/estatuto","EstatutoController@index");
Route::post("/admin/estatuto","EstatutoController@create");
Route::put("/admin/estatuto","EstatutoController@update");
