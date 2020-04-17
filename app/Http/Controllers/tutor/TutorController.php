<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Course;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['showProfile']]);
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

    public function addCheck(request $request)
    {
        $idTutor=Auth::id();
        $image_course=$request->input('image'); //รูปคอร์สเรียน
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

        if($file = $request->file('image') ){
            $image_course = $file -> getClientOriginalName();
            $file -> move('images',$image_course);
        }

        $cId=Course::max('idcourse');
        if($cId === null){$cId = 0 ;}
        $idcourse=($cId +1);

        if ($subject === null or $day === null or $maxStudent === null or $stime === null or $etime === null
            or $startDate === null or $endDate === null or $location === null or $price === null) {
                return redirect()->back()->with('null', 'Please fill all required field.');
        
        } elseif (strlen($subject) > 45) {
                return redirect()->back()->with('subject', 'Name cannot exceed 45 characters.');
            
        } else 
        
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
            'description' => $message,
            'img' => $image_course]
        );

        return redirect('/addCourse')->with('course','Course created');
    }

    public function showProfile(request $request){
        $idTutor = $request->input('idTutor');
        $tutor = DB::table('tutors') -> where(['idTutor'=>$idTutor]) -> get();
        $course = DB::table('courses')-> join('tutors','courses.idTutor','=','tutors.idTutor')
        -> where(['courses.idTutor' => $idTutor])->get();
        $img = DB::table('image')->where(['idTutor'=>$idTutor])->value('img_path');

        $rate = DB::table('review')->where(['idTutor'=>$idTutor])->avg('review');
        $star1 = DB::table('review')->where(['idTutor'=>$idTutor])->where('review',"=",1)->count();
        $star2 = DB::table('review')->where(['idTutor'=>$idTutor])->where('review',"=",2)->count();
        $star3 = DB::table('review')->where(['idTutor'=>$idTutor])->where('review',"=",3)->count();
        $star4 = DB::table('review')->where(['idTutor'=>$idTutor])->where('review',"=",4)->count();
        $star5 = DB::table('review')->where(['idTutor'=>$idTutor])->where('review',"=",5)->count();

        $reviewList = DB::table('review')->join('students','review.idstudent','=','students.idstudent')
        ->join('Courses','review.idcourse','=','Courses.idcourse')->where(['review.idTutor'=>$idTutor])->get();

        return view('/tutor/Profile',['tutors' => $tutor,'courses' => $course,'image' => $img, 'avgReview'=>$rate,
        'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'reviewList'=>$reviewList]);
    }


}
