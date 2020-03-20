<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Course;
use Carbon\Carbon;
use strtotime;

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
        $imageTutor = DB::table('image')->where(['idTutor'=>$idTutor])->value('img_path');
        $DOB = Carbon::parse($tutor[0]->DOB);
        $age = $DOB->diff(Carbon::now())->format('%y');
        $startTime =date('g:ia', strtotime($course[0]->start_time));
        $endTime =date('g:ia', strtotime($course[0]->end_time));

        return view('course/courseInfo',['course' => $course, 'tutor' => $tutor, 'imageTutor'=>$imageTutor, 'age'=>$age, 'startTime'=>$startTime, 'endTime'=>$endTime]);
    }

    public function enrolled(request $request){
        $idcourse = $request->input('idcourse');
        $idstudent=Auth::id();
        $idTutor = DB::table('courses')->where(['idcourse'=>$idcourse])->value('idTutor');
        DB::table('enroll')->insert(
            ['idTutor' => $idTutor,
            'idcourse' => $idcourse,
            'idstudent' =>$idstudent]
        );
        return redirect('/');
    }

}

