<?php
require_once 'core/Route.php';

// Định nghĩa route

Route::get('/admin', 'Admin/AdminController@admin');         // hiển thị form chọn màu
Route::post('/save-theme', 'Admin/AdminController@save_theme'); // xử lý lưu màu
Route::get('/color', 'Admin/AdminController@color'); // xử lý lưu màu
Route::get('/media', 'Admin/AdminController@media'); // xử lý lưu màu


// Client 
Route::get('/', 'HomeController@index'); // home 
Route::get('/login','Client/AuthController@login');//login
Route::get('/register','Client/AuthController@register');//register


Route::get('/detail','Client/PostController@detail');//register


