<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['add','addCheck']]);
    }

    function fillter(){

        $min = $_GET['min'];
        $max = $_GET['max'];
        $subject = $_GET['subject'];
        $location = $_GET['province'];

        if($_GET['subject'] != null){
            if($_GET['province'] != null){
                $courses = DB::table('course')->whereBetween('price',[$min,$max])
                ->where(['subject' => $subject])->where(['location'=>$location])->get();
            }else{
                $courses = DB::table('course')->whereBetween('price',[$min,$max])
                ->where(['subject' => $subject])->get();
            }
        }else{
            if($_GET['province'] != null){
                $courses = DB::table('course')->whereBetween('price',[$min,$max])
                ->where(['location'=>$location])->get();
            }else{
                $courses = DB::table('course')->whereBetween('price',[$min,$max])->get();
            }
        }


        return view('course',['courses' => $courses]);
    }

    public function courseShow(){
        $courses = DB::table('course')->get();
        return view('home',['courses' => $courses]);
    }

    public function add(){
        return view('/addCourse');
    }

    public function addCheck(request $request)
    {
            //define
            $idTutor = $request->input('idTutor');
            $idcourse = $request->input('idcourse');
            $Ncourse = $request->input('Ncourse');
            //ถ้าชื่อซ้ำ
            $haveName = DB::table('course')->where(['Ncourse' => $Ncourse])->exists();
            if ($haveName) {
                return redirect()->back()->with('haveName', 'The course name has already in use.');
            }
            $subject = $request->input('subject');
            $day = $request->input('day');
            $maxStudent = $request->input('maxStudent');
            $stime = $request->input('stime');
            $etime = $request->input('etime');
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $location = $request->input('location');
            $price = $request->input('price');
            $message = $request->input('description');
            DB::table('course')->insert(
                ['idTutor' => $idTutor,
                'idcourse' => $idcourse,
                'Ncourse' =>$Ncourse,
                'subject'=> $subject,
                'day' => $day,
                'max_student' => $maxStudent,
                'start_time' => $stime,
                'end_time' => $etime,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'location' => $location,
                'price' => $price,
                'description' => $message]

            );
            return redirect('/home')->with('course','Course created');
    }

}

