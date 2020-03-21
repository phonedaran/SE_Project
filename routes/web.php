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

Auth::routes();
Auth::routes(['verify' => true]);
// ต้อง login ก่อน ถึงจะเข้าได้


//admin system
Route::get('/admin','adminController@admin');
Route::get('/admin/image','adminController@imageAdmin');
Route::get('/admin/accepted','adminController@accepted');
Route::get('/admin/rejected','adminController@rejected');
Route::get('/admin/tutorList','adminController@tutorList');
Route::get('/admin/tutorList/image','adminController@imageTutorList');
Route::get('/admin/tutorList/fired','adminController@fired');


Route::get('/courseInformation', 'CourseController@info');
Route::get('/courseInformation/enrolled', 'CourseController@enrolled');
Route::get('/myCourse', 'CourseController@my');
Route::get('/courseEdit', 'CourseController@edit');
Route::post('/courseEdit/check', 'CourseController@editCheck');


Auth::routes(['verify' => true]);

Route::get('/studentEdit', 'student\StudentController@editProfile');
Route::post('/studentEdit/check', 'student\StudentController@editCheck');
Route::get('/student/deleteCourse', 'CourseController@deleteCourse');

Route::get('/studentReg', 'StudentRegisterController@reg');
Route::get('/studentReg/check', 'StudentRegisterController@regcheck');
Route::get('/tutorReg', 'TutorRegController@reg');
Route::post('/tutorReg/check', 'TutorRegController@regcheck')->name('upload.flie');
Route::get('/tutorEdit', 'TutorRegController@edit');
Route::post('/tutorEdit/check', 'TutorRegController@editCheck');

// ต้อง login ก่อน ถึงจะเข้าได้
Auth::routes();


//home
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myCourse', 'CourseController@my');
Route::get('/courseEdit', 'CourseController@edit');
Route::post('/courseEdit/check', 'CourseController@editCheck');

Route::get('/addCourse', 'CourseController@add');
Route::get('/course', 'CourseController@fillter');
// Route::get('/contact', 'LoginController@index')->$this->middleware('auth'); เจาะจง route

//tutor
Route::get('/course', 'tutor\TutorController@index');
Route::get('/course/studentList', 'tutor\TutorController@studentList');
Route::get('/course/studentList/deleted', 'tutor\TutorController@deletedStudent');
Route::get('/course/deleted', 'tutor\TutorController@deleted');
Route::get('/addCourse', 'tutor\TutorController@add');
Route::post('/course/add/check', 'tutor\TutorController@addCheck');
Route::get('/Profile', 'tutor\TutorController@showProfile');


Route::get('/test', function () {
    return view('test');
});
Route::get('/enroll', 'student\StudentController@index');
// Route::get('/contact', 'LoginController@index')->$this->middleware('auth'); เจาะจง route
// Route::get('/home', 'HomeController@index')->name('home');


route::get('/review','student\StudentController@reviewFrom');
route::get('/review/add','student\StudentController@addReview');


