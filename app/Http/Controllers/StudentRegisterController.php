<?php

namespace App\Http\Controllers;

// use Illuminate\Http\RedirectResponse::alert();
use App\student;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Authenticatable
// use RealRashid\SweetAlert\Facades\Alert;



class StudentRegisterController extends Controller
{

    function reg()
    {

        // if(session('success_message')){
        //
        // }

        return view('auth.studentRegister');
    }

    function regcheck(request $request)
    {

        $Fname=$request->input('Fname');
        $Lname=$request->input('Lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $pass=$request->input('password');

        $sId=student::max('idstudent');
    if($sId === null){$sId = 0 ;}
        $studentId=$sId +1;

    //     $Id=user::max('id');
    // if($Id === null){$Id = 0 ;}
    //     $uId=$Id +1;

    $data = DB::select('select email from students where email=? ',[$email]);


    if($Fname === null or $Lname === null or $email === null or $phone === null or $pass === null ) {

        return redirect()->back()->with('null','Please fill all required field.');
    }
    elseif(strlen($pass) <8){

        return redirect()->back()->with('pass','Please fill all required field.');
    }
    elseif($data != null ){

        return redirect()->back()->with('mail','Please fill all required field.');
    }
    else{
        $student = DB::table('students')->insert(
           ['idstudent' =>$studentId,
           'Fname' => $Fname,
           'Lname' => $Lname,
           'email' => $email,
           'phone' => $phone,]
        );

        $student = DB::table('users')->insert(
            ['id' =>$studentId,
            'name' =>$Fname,
            'email' => $email,
            'status' => "student",
            'password' => Hash::make($pass),]
         );    return  redirect('/')->with('success','Please fill all required field.');



    return  redirect('/')->with('success','Please fill all required field.');

        }
    }
}
