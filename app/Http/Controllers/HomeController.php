<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            return view('admin/admin');
        }
        // elseif(auth()->user()->isTutor()){
        //     return view('/tutor/course');
        // }
        else{
            $courses = DB::table('courses')->join('tutors','courses.idTutor','=','tutors.idTutor')->get();
            return view('home',['courses'=>$courses]);
        }
    }

    // public function home()
    // {
    //     return view('homepublic');
    // }
}
