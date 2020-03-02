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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/course', 'CourseController@fillter');


Route::get('/studentReg', 'StudentRegisterController@reg');
Route::get('/studentReg/check', 'StudentRegisterController@regcheck');


Route::get('/tutorReg', 'TutorRegController@reg');
Route::get('/tutorReg/check', 'TutorRegController@regcheck');

