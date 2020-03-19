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

Route::get('/','CourseController@courseShow');

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

Route::get('/course', 'CourseController@fillter');

Auth::routes(['verify' => true]);

Route::get('/studentReg', 'StudentRegisterController@reg');
Route::get('/studentReg/check', 'StudentRegisterController@regcheck');
Route::get('/studentEdit', 'student\StudentController@editProfile');
Route::post('/studentEdit/check', 'student\StudentController@editCheck');

Route::get('/tutorReg', 'TutorRegController@reg');
Route::post('/tutorReg/check', 'TutorRegController@regcheck')->name('upload.flie');
// Route::get('/tutorReg/check', 'TutorRegController@regcheck');

// ต้อง login ก่อน ถึงจะเข้าได้
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/contact', 'LoginController@index')->$this->middleware('auth'); เจาะจง route

Route::get('/addCourse', 'CourseController@add');


Route::get('/course/add/check', 'CourseController@addCheck');


Route::get('/test', function () {
    return view('test');
});
Route::get('/enroll', 'student\StudentController@index');
Route::get('/student/deleteCourse', 'CourseController@deleteCourse');

// Route::get('/contact', 'LoginController@index')->$this->middleware('auth'); เจาะจง route
// Route::get('/home', 'HomeController@index')->name('home');

route::get('/review','student\StudentController@reviewFrom');

