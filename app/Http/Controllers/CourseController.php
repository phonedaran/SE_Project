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
                ->where(['subject' => $subject])->where(['location'=>$location])
                ->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
            }else{
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])
                ->where(['subject' => $subject])->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
            }
        }else{
            if($_GET['province'] != null){
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])
                ->where(['location'=>$location])->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
            }else{
                $courses = DB::table('courses')->whereBetween('price',[$min,$max])
                ->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
            }
        }
        return view('/course/home',['courses' => $courses]);
    }

    public function courseShow(){
        $courses = DB::table('courses')->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
        return view('/course/home',['courses' => $courses]);
    }

    public function info(request $request){
        $idcourse = $request->input('idcourse');
        $course = DB::table('courses')->where(['idcourse'=>$idcourse])->get();
        $idTutor = DB::table('courses')->where(['idcourse'=>$idcourse])->value('idTutor');
        $tutor = DB::table('tutors')->where(['idTutor'=>$idTutor])->get();
        return view('course/courseInfo',['course' => $course,['tutor' => $tutor]]);
    }

}

