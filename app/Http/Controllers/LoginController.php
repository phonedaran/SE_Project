<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
<<<<<<< HEAD
        // $this->middleware('auth');
=======
         $this->middleware('auth');
        //  only function ต้อง login ก่อนนน
        // $this->middleware('auth', ['only' => ['index','form'] ])

        // Except function ตัวไหนที่ไม่ต้อง login นอกนั้นต้อง login
        // $this->middleware('auth', ['except' => ['index','form'] ])
>>>>>>> f667a242bb7bea18a1fb88209ff60801a7fd3d30
    }

    public function index()
    {
<<<<<<< HEAD
        return view('loginNew/login');
=======
        return view('login');
>>>>>>> f667a242bb7bea18a1fb88209ff60801a7fd3d30
    }
}

