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
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/contact', function () {
    return view('contact');
});

// หน้าแรกของ student
Route::group(['middleware' => ['auth']],function(){ Route::get('/home','HomeController@index');});
// หน้าแรกของ admin
Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin', 'adminController@admin');
    });
});

Route::get('/admin','adminController@admin');
Route::get('/admin/image','adminController@image');
Route::get('/admin/accepted','adminController@accepted');
Route::get('/admin/rejected','adminController@rejected');
Route::get('/admin/tutorList','adminController@tutorList');

Route::get('/course', 'CourseController@fillter');


Auth::routes(['verify' => true]);

// ต้อง login ก่อน ถึงจะเข้าได้
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/enroll', 'student\StudentController@index');
// Route::get('/contact', 'LoginController@index')->$this->middleware('auth'); เจาะจง route