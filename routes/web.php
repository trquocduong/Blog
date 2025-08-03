<?php
require_once 'core/Route.php';

// Định nghĩa route
//-----------ADMIN-----------//
Route::get('/login-admin', 'Admin/AdminController@login_admin');         // get form login admin 
Route::post('/admin-login', 'Admin/AdminController@loginSubmit');         //post form login admin 
Route::get('/admin', 'Admin/AdminController@admin');         // admin pages

//COLOR
Route::post('/save-theme', 'Admin/AdminController@save_theme'); // save color
Route::get('/color', 'Admin/AdminController@color'); // form_save_color
Route::get('/media', 'Admin/AdminController@media'); // save color


//TAGS
Route::get('/tags', 'Admin/TagsController@index', 'Middleware'); // get tags
Route::get('/create-tags', 'Admin/TagsController@get_create', 'Middleware'); // get tags create pages
Route::post('/tags-create', 'Admin/TagsController@create', 'Middleware'); // post tags create 
Route::get('/search', 'Admin/TagsController@search', 'Middleware'); // get search tags pags
Route::post('/search', 'Admin/TagsController@search', 'Middleware'); // post form tags pages
Route::get('/edit-tags', 'Admin/TagsController@get_update', 'Middleware'); // get form update pages 
Route::get('/detail-tags', 'Admin/TagsController@detail', 'Middleware'); // get form update pages 
Route::post('/update-tags', 'Admin/TagsController@update', 'Middleware'); // post form update pages 
Route::get('/delete-tags', 'Admin/TagsController@delete', 'Middleware'); // delete tags 

//PAGES
Route::get('/pages', 'Admin/PagesController@index', 'Middleware'); // get tags
Route::get('/create-page', 'Admin/PagesController@create', 'Middleware'); // get tags
Route::post('/pages-store', 'Admin/PagesController@store', 'Middleware'); // get tags
Route::get('/pages-detail', 'Admin/PagesController@detail', 'Middleware'); // get tags
Route::get('/pages-edit', 'Admin/PagesController@edit', 'Middleware');
Route::post('/pages-update', 'Admin/PagesController@update', 'Middleware');
Route::get('/pages-delete', 'Admin/PagesController@delete', 'Middleware');
Route::get('/pages-search', 'Admin/PagesController@search', 'Middleware'); // get search tags pags
Route::post('/pages-search', 'Admin/PagesController@search', 'Middleware'); // get search tags pags

//PERMISSIONS
Route::get('/permissions', 'Admin/PermissionController@index');
Route::get('/permissions_index', 'Admin/PermissionController@manage');
Route::get('/permissions_create', 'Admin/PermissionController@create');
Route::post('/permissions_create', 'Admin/PermissionController@store');
Route::post('/permissions_update', 'Admin/PermissionController@update');
Route::get('/permissions_hide', 'Admin/PermissionController@hide');

//USERS
Route::get('/users', 'Admin/UsersController@index', 'Middleware');
Route::get('/user_detail', 'Admin/UsersController@detail', 'Middleware');
Route::get('/user_create', 'Admin/UsersController@create', 'Middleware');
Route::post('/user_store', 'Admin/UsersController@store', 'Middleware');
Route::get('/user_edit', 'Admin/UsersController@edit', 'Middleware');
Route::post('/user_update', 'Admin/UsersController@update', 'Middleware');
Route::get('/user_delete', 'Admin/UsersController@delete', 'Middleware');
Route::get('/search_user', 'Admin/UsersController@search', 'Middleware');
Route::post('/search_user', 'Admin/UsersController@search', 'Middleware');

//CHAT

Route::get('/chat', 'Admin/ChatController@index', 'Middleware');
Route::get('/messages', 'Admin/ChatController@index', 'Middleware');
Route::post('/send-message', 'Admin/ChatController@send', 'Middleware');


//-----------CLINET-----------//
Route::get('/', 'HomeController@index'); // home 
Route::get('/login', 'Client/AuthController@login'); //get_form_login
Route::post('/login_user', 'Client/AuthController@post_login'); //post_form_login
Route::get('/register', 'Client/AuthController@register'); //get_form_register
Route::post('/register_user', 'Client/AuthController@post_register'); //post_form_register
Route::get('/logout', 'Client/AuthController@logout'); //logout
Route::get('/detail', 'Client/PostController@detail'); //get_detail
Route::get('/profile', 'Client/PostController@profile'); //get_profile
Route::get('/profile_post', 'Client/PostController@profile_post'); //get_form_profile_post





Route::get('/{slug}', 'PagesController@getPageBySlug'); // create pages 
Route::get('/test', 'HomeController@db');//debug database !
