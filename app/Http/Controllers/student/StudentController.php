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

    public function editProfile(){
        $id = Auth::id();
        $students = DB::table('students')
        ->where(['idstudent' => $id])->get();
        return view('student.editProfileStudent', ['students' => $students]);
    }

    public function editCheck(request $request){
        $Fname=$request->input('Fname');
        $Lname=$request->input('Lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $address=$request->input('address');
        // $pass=$request->input('password');
        $id = Auth::id();
        

        // $data = DB::select('select email from students where email=? ',[$email]);


        if($Fname === null or $Lname === null or $email === null or $phone === null ) {
            
            return redirect()->back()->with('null','Please fill all required field.');
        }
        
        // elseif($data != null ){

        //     return redirect()->back()->with('mail','Please fill all required field.');
        // }
        else{
            DB::table('students')
            ->where(['idstudent' => $id])
            ->update(
            [ 'Fname' => $Fname,
            'Lname' => $Lname,
            'email' => $email,
            'phone' => $phone,
            'address' => $address]
            );

            DB::table('users')
            ->where(['id' => $id])
            ->update(
                ['name' =>$Fname,
                'email' => $email,]
            );
            // return redirect()->back()->with('success','success update');
            return redirect('/studentEdit')->with('success','success update');
        }
    }

}
