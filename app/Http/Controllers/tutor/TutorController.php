<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tutor/course');
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

        return redirect('/course/add/check')->with('course','Course created');
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
