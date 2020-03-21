<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Course;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $idTutor = Auth::id();
        $courses = DB::table('courses')->where('idTutor', $idTutor)->get();
        $students = DB::table('enroll')->where('idTutor', $idTutor)->get();
        $i=0;
        $n=array();
        foreach ($courses as $course){
            $n[$i]=0;
            foreach ($students as $student){
                if($student->idcourse == $course->idcourse){
                    $n[$i]=$n[$i]+1;
                }
            }
            $i=$i+1;
        }
        return view('tutor/course',['idTutor' => $idTutor,'courses' => $courses,'n' => $n]);
    }

    public function studentList(request $request){
        $idTutor = Auth::id();
        $idcourse = $request->input('idcourse');
        $students = DB::table('enroll')
        ->join('students', 'students.idstudent', '=', 'enroll.idstudent')
        ->where(['idcourse'=>$idcourse, 'idTutor'=>$idTutor])->get();
        return view('tutor/studentList',['students' => $students]);
    }

    public function deletedStudent(){
        $idstudent = $_GET['idstudent'];
        DB::table('enroll')->where(['idstudent'=>$idstudent])->delete();
        return redirect()->back();
    }

    public function deleted(){
        $idcourse = $_GET['idcourse'];
        DB::table('enroll')->where(['idcourse'=>$idcourse])->delete();
        DB::table('courses')->where(['idcourse'=>$idcourse])->delete();
        return redirect()->back();
    }

    public function add(){
        return view('/tutor/addCourse');
    }




    public function showProfile(){
        $idTutor = Auth::id();
        $tutor = DB::table('tutors') -> where(['idTutor'=>$idTutor]) -> get();
        $course = DB::table('courses')-> join('tutors','courses.idTutor','=','tutors.idTutor')
        -> where(['courses.idTutor' => $idTutor])->get();
        $img = DB::table('image')->where(['idTutor'=>$idTutor])->value('img_path');

        return view('/tutor/Profile',['tutors' => $tutor,'courses' => $course,'image' => $img]);
    }

}
