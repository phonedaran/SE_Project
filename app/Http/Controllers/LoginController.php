<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
        //  only function ต้อง login ก่อนนน
        // $this->middleware('auth', ['only' => ['index','form'] ])

        // Except function ตัวไหนที่ไม่ต้อง login นอกนั้นต้อง login
        // $this->middleware('auth', ['except' => ['index','form'] ])
    }

    public function index()
    {
        return view('login');
    }
}

