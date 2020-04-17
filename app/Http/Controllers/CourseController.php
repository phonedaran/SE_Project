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
        $this->middleware('auth', ['only' => ['add','addCheck','my','edit','editCheck']]);
    }

    public function welcome(){
        $tutors = DB::table('tutors')->orderBy('rating','desc')->take(3)->get();
        $courses = DB::table('courses')->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
        $idCards = DB::table('image')->get();
        $rate = DB::table('tutors')
            ->update(['rating' => DB::raw("(SELECT AVG(review.review) FROM review
                WHERE review.idTutor = tutors.idTutor)")
            ]);
        $rate = DB::table('tutors')
            ->where('rating', null)
            ->update(['rating' => 0]);

        $students=DB::select('  SELECT courses.idcourse, COUNT(idstudent) AS "nStudent"
        FROM courses
        LEFT JOIN enroll ON courses.idcourse = enroll.idcourse
        GROUP BY courses.idcourse');
    
        return view('/course/welcome',['courses' => $courses,'tutors' => $tutors,
        'idCards' => $idCards,'students'=>$students]);
    }

    function filter(){

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

        $students=DB::select('  SELECT courses.idcourse, COUNT(idstudent) AS "nStudent"
                                FROM courses
                                LEFT JOIN enroll ON courses.idcourse = enroll.idcourse
                                GROUP BY courses.idcourse');

        return view('/course/home',['courses' => $courses,'students'=>$students]);
    }

    public function courseShow(){
        $id = Auth::id();
        if(Auth:: user()->status == 'student'){
            $courses = DB::select("SELECT * FROM courses
                                    LEFT JOIN tutors ON courses.idTutor = tutors.idTutor
                                    WHERE idcourse NOT IN (SELECT idcourse FROM enroll WHERE idstudent = '$id')");
        }else{
            $courses = DB::table('courses')->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
        }

        $students=DB::select('  SELECT courses.idcourse, COUNT(idstudent) AS "nStudent"
                                FROM courses
                                LEFT JOIN enroll ON courses.idcourse = enroll.idcourse
                                GROUP BY courses.idcourse');


        return view('/course/home',['courses' => $courses,'students'=>$students]);
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
        $avgReview = DB::table('review')->where(['idTutor'=>$idTutor])->avg('review');
        $nReview = DB::table('review')->where(['idTutor'=>$idTutor])->count();
        if($avgReview==null){
            $avgReview=0;
        }
        $students = DB::table('courses')
        ->join('enroll', 'courses.idcourse', '=', 'enroll.idcourse')
        ->where('courses.idcourse', '=',$idcourse)
        ->select('enroll.idstudent')
        ->get();
        $enrolled=0;
        if ( Auth:: user()->status == 'student'){
            $id = Auth::id();
            foreach ($students as $student){
                if ($student->idstudent == $id){
                    $enrolled=1;
                }
            } 
        }
        return view('course/courseInfo',['avgReview' => $avgReview,'nReview' => $nReview,'course' => $course, 'tutor' => $tutor,
        'imageTutor'=>$imageTutor, 'age'=>$age, 'startTime'=>$startTime, 'endTime'=>$endTime,'students'=>$students,'enrolled'=>$enrolled]);
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

    public function deleteCourse(request $request){
        $id = Auth::id();
        $idcourse = $request->input('idcourse');

        DB:: table('enroll')
        ->where(['idcourse' => $idcourse])
        ->where(['idstudent' => $id])
        ->delete();
        return redirect()->back()->with('success','success');
    }

    public function edit()
    {
        $id=Auth::id();
        $courses = DB::table('courses')->where(['idTutor' => $id])->get();
        return view('course.editCourse', ['courses' => $courses]);
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

            return redirect('/course')->with('success','Course created');

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

            return redirect('/course')->with('success','Course created');
            }



    }


}

