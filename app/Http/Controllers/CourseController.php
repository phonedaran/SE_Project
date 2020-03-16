<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['add','addCheck']]);
    }

    function fillter(){

        $min = $_GET['min'];
        $max = $_GET['max'];
        $subject = $_GET['subject'];
        $location = $_GET['province'];

        if($_GET['subject'] != null){
            if($_GET['province'] != null){
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])
                ->where(['subject' => $subject])->where(['location'=>$location])->get();
            }else{
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])
                ->where(['subject' => $subject])->get();
            }
        }else{
            if($_GET['province'] != null){
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])
                ->where(['location'=>$location])->get();
            }else{
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])->get();
            }
        }


        return view('course',['courses' => $courses]);
    }

    public function courseShow(){
        $courses = DB::table('courses')->get();
        return view('home',['courses' => $courses]);
    }

}

