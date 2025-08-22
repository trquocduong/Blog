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

//CATEGORY 
Route::get('/category', 'Admin/CategoriesController@index', 'Middleware'); // get tags
Route::get('/create-category', 'Admin/CategoriesController@create', 'Middleware'); // get tags
Route::post('/category-create', 'Admin/CategoriesController@store', 'Middleware'); // get tags
Route::get('/edit-category', 'Admin/CategoriesController@update', 'Middleware'); // get tags
Route::post('/update-category', 'Admin/CategoriesController@edit', 'Middleware'); // get tags
Route::get('/delete-category', 'Admin/CategoriesController@delete', 'Middleware'); // get tags
Route::get('/search-category', 'Admin/CategoriesController@search', 'Middleware'); // get search tags pags
Route::post('/search-category', 'Admin/CategoriesController@search', 'Middleware'); // get search tags pags

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
Route::get('/room', 'Admin/ChatController@room', 'Middleware');
Route::post('/send', 'Admin/ChatController@send', 'Middleware');

//MEDIA

Route::get('/media', 'Admin/MediaController@index', 'Middleware');
Route::get('/upload', 'Admin/MediaController@create', 'Middleware');
Route::post('/upload_file', 'Admin/MediaController@store', 'Middleware');
Route::get('/media_delete', 'Admin/MediaController@delete', 'Middleware');
Route::get('/media-search', 'Admin/MediaController@index', 'Middleware');

//SETTINGS
Route::get('/settings', 'Admin/SettingsController@index', 'Middleware');
Route::get('/settings_web', 'Admin/SettingsController@form', 'Middleware');
Route::post('/save', 'Admin/SettingsController@save', 'Middleware');


//-----------CLINET-----------//
Route::get('/', 'Client/HomeController@index'); // home 
Route::get('/login', 'Client/AuthController@login'); //get_form_login
Route::post('/login_user', 'Client/AuthController@post_login'); //post_form_login
Route::get('/register', 'Client/AuthController@register'); //get_form_register
Route::post('/register_user', 'Client/AuthController@post_register'); //post_form_register
Route::get('/logout', 'Client/AuthController@logout'); //logout
Route::get('/detail', 'Client/PostController@detail'); //get_detail

///Profile
Route::get('/profile', 'Client/ProfileController@profile'); //get_profile
Route::get('/profile_post', 'Client/ProfileController@profile_post'); //get_form_profile_post
Route::get('/profile_update', 'Client/ProfileController@update'); //get_profile
Route::post('/profile_edit', 'Client/ProfileController@edit'); //get_profile
Route::get('/forget_password', 'Client/ProfileController@forgetpw'); //get_profile
Route::post('/forget_password', 'Client/ProfileController@forget_pw_profile'); //get_profile

///POSTS
Route::get('/create_post', 'Client/PostController@create'); //get_profile
Route::post('/post_store', 'Client/PostController@store'); //get_profile

Route::get('/{slug}', 'PagesController@getPageBySlug'); // create pages 
Route::get('/test', 'HomeController@db');//debug database !
