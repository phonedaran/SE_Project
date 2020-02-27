<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function admin(){
        $tutor = DB::table('tutor')->where(['status' => 'waiting'])->get();
        echo $tutor;
    }
}
