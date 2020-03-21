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
        $this->middleware('auth', ['only' => ['add','addCheck','my','edit','editCheck']]);
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

    public function add(){
        return view('/addCourse');
    }

    public function addCheck(request $request)
    {
            $idTutor=Auth::id();
            //define
            // $idTutor = $request->input('idTutor');
            // $idcourse = $request->input('idcourse');
            $Ncourse = $request->input('Ncourse');
            //ถ้าชื่อซ้ำ
            $haveName = DB::table('courses')->where(['Ncourse' => $Ncourse])->exists();
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

            $cId=Course::max('idcourse');
            if($cId === null){$cId = 0 ;}
            $idcourse=($cId +1);

            DB::table('courses')->insert(
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

    public function my()
    {
        $id=Auth::id();
        $courses = DB::table('courses')->where(['idTutor' => $id])->get();
        return view('myCourse', ['courses' => $courses]);
    }

    public function edit()
    {
        $id=Auth::id();
        $courses = DB::table('courses')->where(['idTutor' => $id])->get();
        return view('editCourse', ['courses' => $courses]);
    }
    public function editCheck(request $request)
    {
            $idTutor=Auth::id();
            $Ncourse = $request->input('Ncourse');
            //ถ้าชื่อซ้ำ
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
            $cId = $request->input('cId');
            $img = $request->input('image');
             
            $haveName = DB::table('courses')->where(['Ncourse' => $Ncourse])->exists();
             
             $cName = DB::table('courses')
         ->select('Ncourse')
         ->where([
             ['idTutor','=', $idTutor],
            ['idcourse', '=', $cId],
            ['Ncourse', '=', $Ncourse]
         ])->get();
             
         if ($haveName) {
             if($cName == "[]"){
                    return redirect()->back()->with('haveName', 'The course name has already in use.');
             }
                 
             }
           
            
            if($img === null){
                $tutor = DB::table('courses')
        ->where(['idTutor' => $idTutor,'idcourse'=>$cId])
            ->update([
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
                'description' => $message
            ]);

            return redirect('/home')->with('success','Course created');

            }elseif($img != null){
                $tutor = DB::table('courses')
        ->where(['idTutor' => $idTutor,'idcourse'=>$cId])
            ->update([
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
                'description' => $message,
                'img' => $img]);

                if($file = $request->file('image') ){
                    $img = $file -> getClientOriginalName();
                    $file -> move('images/imageCourse',$img);
                }

            return redirect('/home')->with('success','Course created');
            }
            

            
    }



}

