<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
<<<<<<< HEAD
        return view('home');
=======
        if(auth()->user()->isAdmin()){
            return view('admin/admin');
        }
        // elseif(auth()->user()->isTutor()){
        //     return view('/tutor/course');
        // }
        else{
            return view('home');
        }
>>>>>>> f667a242bb7bea18a1fb88209ff60801a7fd3d30
    }
}
