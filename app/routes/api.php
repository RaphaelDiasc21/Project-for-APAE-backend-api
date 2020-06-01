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

// Evento
Route::get('/eventos',"EventoController@index");
Route::post('/admin/eventos',"EventoController@create");
Route::get('/admin/eventos/{id}',"EventoController@getEvento");
Route::delete('/admin/eventos/{id}',"EventoController@delete");
Route::put('/admin/eventos/{id}',"EventoController@update");
Route::post('/admin/eventos/foto/{id}',"EventoController@addFoto");
Route::delete('/admin/eventos/foto/{id}',"EventoController@deleteFoto");

// Noticia
Route::get('/noticias',"NoticiaController@index");
Route::post('/admin/noticias',"NoticiaController@create");
Route::get('/admin/noticias/{id}',"NoticiaController@getNoticia");
Route::delete('/admin/noticias/{id}',"NoticiaController@delete");
Route::put('/admin/noticias/{id}',"NoticiaController@update");
Route::post('/admin/noticias/foto/{id}',"NoticiaController@addFoto");

// Parceiro
Route::get('/parceiros',"ParceiroController@index");
Route::post('/admin/parceiros',"ParceiroController@create");
Route::get('/parceiros/{id}',"ParceiroController@getParceiro");
Route::delete('/admin/parceiros/{id}',"ParceiroController@delete");
Route::put('/admin/parceiros/{id}',"ParceiroController@update");

// Diretoria
Route::get('/diretoria',"DiretoriaController@index");
Route::post('/admin/diretoria',"DiretoriaController@create");
Route::put('/admin/diretoria/{id}',"DiretoriaController@update");