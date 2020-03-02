<?php

namespace App\Http\Controllers;

use App\Tutor;
use App\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TutorRegController extends Controller
{
    
    function reg()
    {
        return view('auth.tutorRegister');
    }

    function regcheck(request $request)
    {
        $Fname=$request->input('Fname');
        $Lname=$request->input('Lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $pass=$request->input('password');
        $sex=$request->input('gender');
        $addr=$request->input('addr');
        $status='wait';
        $education=$request->input('education');
        $work=$request->input('work');
        $about=$request->input('about');
        $partner=$request->input('partner');
        $evidence=$request->input('evidence');
        $image_card=$request->input('image');
        $image_path = substr($image_card, strpos($image_card, ".") + 1);
        $evidence_path=substr($evidence, strpos($evidence, ".") + 1);

        $tId=Tutor::max('idTutor');
        if($tId === null){$tId = 0 ;}
        $TutorId=($tId +2);
// $evidence === null
    $data = DB::select('select email from tutors where email=? ',[$email]);

    if($Fname === null or $Lname === null or $email === null or $phone === null or $pass === null 
    or $sex === null or $addr === null or $evidence === null) {
        return redirect()->back()->with('null','Please fill all required field.');
    }
    elseif(strlen($pass) <8){
        
        return redirect()->back()->with('pass','Please fill all required field.');
    }
     elseif($data != null ){

         return redirect()->back()->with('mail','Please fill all required field.');
     }
    else{
        $tutor = DB::table('tutors')->insert(
           ['idTutor' =>$TutorId,
           'Fname' => $Fname,
           'Lname' => $Lname,
           'email' => $email,
           'phone' => $phone,
           'sex' => $sex,
           'address' => $addr,
           'status' => $status,
           'work_experient' => $work,
           'education' => $education,
           'about_me' => $about,
           'partner' => $partner,
           'password' => Hash::make($pass),]
        );

        $images = DB::table('image')->insert(
            ['idTutor' =>$TutorId,
            'img_path' => $image_path,
            'img_IDcard' => $image_card,
            'evi_path' => $evidence_path,
            'evi' => $evidence,
            
            ]
         );
        
    return  redirect('/')->with('success','The customer has been stored in database');
        }
    }

    
}
