<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // add table => day , time แล้วลบ schedule
        $id = Auth::id();
        // $courses = DB::table('enroll')
        //     ->where(['idstudent' => $id])->get();

        // foreach ($courses as $course){

        //     $enrolls=DB::table('enroll')->join('course','enroll.idcourse', '=', 'course.idcourse')
        //     ->join('tutor', 'tutor.idtutor', '=', 'enroll.idtutor')
        //     ->where(['enroll.idcourse' => [$course->idcourse]])
        //     ->where(['tutor.idtutor' => [$course->idTutor]])
        //     ->get();
        // }

        $enrolls=DB::table('enroll')->join('courses','enroll.idcourse', '=', 'courses.idcourse')
            ->join('tutors', 'tutors.idtutor', '=', 'enroll.idtutor')
            ->where(['enroll.idstudent' => $id])
            ->get();

        if($enrolls != null){
           return view('student/enrollment',['enrolls' => $enrolls]);
        }else{
            return redirect('/enroll')->with('error','no course that enrollment');
        }

    }

    public function reviewFrom(){
        $id = Auth::id();
        $list = DB::table('enroll')->join('tutors','enroll.idTutor','=','tutors.idTutor')
        ->join('courses','enroll.idcourse','=','courses.idcourse')
        ->where(['idStudent' => $id])->distinct('enroll.idTutor')->get();

        return view('student.review', ['list' => $list]);
    }

    public function addReview(request $request){
        $id - Auth::id();
        $idTutor = $request->input('tutor');
        $rate = $request->input('rating');
        $comment = $request->input('review-comment');

        DB::table('review');
    }
}
