<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(){
        $tutors = DB::table('tutors')->where(['status' => 'waiting'])->get();
        $idCards = DB::table('image')->get();
        return view('admin/admin',['tutors' => $tutors ,'idCards' => $idCards]);
    }

    public function accepted(request $request){
        $idTutor = $request->input('idTutor');
        DB::table('tutors')->where(['idTutor'=>$idTutor])->update(['status'=>'accepted']);
        $Fname = DB::table('tutors')->where(['idTutor'=>$idTutor])->value('Fname');
        $email = DB::table('tutors')->where(['idTutor'=>$idTutor])->value('email');
        $password = DB::table('tutors')->where(['idTutor'=>$idTutor])->value('password');
        DB::table('users')->insert([
            'id' => $idTutor,
            'name' => $Fname,
            'email' => $email,
            'status' => 'tutor',
            'password' => $password
        ]);
        return redirect()->back();
    }

    public function rejected(request $request){
        $idTutor = $request->input('idTutor');
        DB::table('image')->where(['idTutor'=>$idTutor])->delete();
        DB::table('tutors')->where(['idTutor'=>$idTutor])->delete();
        return redirect()->back();
    }

    public function fired(request $request){
        $idTutor = $_GET['idTutor'];
        DB::table('image')->where(['idTutor'=>$idTutor])->delete();
        DB::table('enroll')->where(['idTutor'=>$idTutor])->delete();
        DB::table('courses')->where(['idTutor'=>$idTutor])->delete();
        DB::table('users')->where(['id'=>$idTutor])->delete();
        DB::table('tutors')->where(['idTutor'=>$idTutor])->delete();
        return redirect()->back();
    }

    public function imageAdmin(request $request){
        $idTutor = $_GET['idTutor'];
        $idCard = DB::table('image')->where(['idTutor'=>$idTutor])->value('img_IDcard');
        return view('admin/IDcard',['idCard' => $idCard]);
    }

    public function imageTutorList(request $request){
        $idTutor = $_GET['idTutor'];
        $idCard = DB::table('image')->where(['idTutor'=>$idTutor])->value('img_IDcard');
        return view('admin/IDcardTutorList',['idCard' => $idCard]);
    }

    public function tutorList(){
        $tutors = DB::table('tutors')->where(['status'=>'accepted'])->get();
        return view('admin/tutorList',['tutors' => $tutors]);
    }
}
