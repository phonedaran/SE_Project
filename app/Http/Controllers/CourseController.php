<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    function fillter(){
        //$price

        //$subject = $_GET['subject'];
        //$province = $_GET['province'];

        return view('course');//,['subject' => $subject, 'province' => $province]);
    }
}
