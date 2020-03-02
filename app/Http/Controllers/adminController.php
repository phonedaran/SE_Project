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
        $tutors = DB::table('tutor')->where(['status' => 'waiting'])->get();
        $idCards = DB::table('image')->get();
        return view('admin/admin',['tutors' => $tutors ,'idCards' => $idCards]);
    }

    public function accepted(request $request){
        $idTutor = $request->input('idTutor');
        DB::table('tutor')->where(['idTutor'=>$idTutor])->update(['status'=>'accepted']);
        $Fname = DB::table('tutor')->where(['idTutor'=>$idTutor])->value('Fname');
        $email = DB::table('tutor')->where(['idTutor'=>$idTutor])->value('email');
        $password = DB::table('tutor')->where(['idTutor'=>$idTutor])->value('password');
        print_r($Fname);
        DB::table('users')->insert([
            'id' => $idTutor,
            'name' => $Fname,
            'email' => $email,
            'status' => 'status',
            'password' => $password
        ]);
        return redirect()->back();
    }

    public function rejected(request $request){
        $idTutor = $request->input('idTutor');
        DB::table('image')->where(['idTutor'=>$idTutor])->delete();
        DB::table('course')->where(['idTutor'=>$idTutor])->delete();
        DB::table('tutor')->where(['idTutor'=>$idTutor])->delete();
        return redirect()->back(); 
    }

    public function image(request $request){
        $idCard = $_GET['image'];
        return view('admin/IDcard',['idCard' => $idCard]);
    }

    public function tutorList(){
        $tutors = DB::table('tutor')->where(['status'=>'accepted'])->get();
        $idCards = DB::table('image')->get();
        return view('admin/tutorList',['tutors' => $tutors,'idCards' => $idCards]);
    }
}
