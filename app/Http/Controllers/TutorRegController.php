<?php

namespace App\Http\Controllers;

use App\Tutor;
use Auth;
// use App\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TutorRegController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit','editCheck']]);
    }

    function reg()
    {
        return view('auth.tutorRegister');
    }

    public function regcheck(request $request)
    {
        $Fname=$request->input('Fname');
        $Lname=$request->input('Lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $pass=$request->input('password');
        $sex=$request->input('gender');
        $addr=$request->input('addr');
        $status='waiting';
        $education=$request->input('education');
        $work=$request->input('work');
        $partner=$request->input('partner');
        $evidence=$request->input('evidence');
        $image_card=$request->input('image'); //profile
        $DOB=$request->input('DOB');

        if($file = $request->file('image') ){
            $image_card = $file -> getClientOriginalName();
            $file -> move('images/imageProfile',$image_card);
        }

        if($Efile = $request->file('evidence') ){

            $evidence = $Efile -> getClientOriginalName();
            $Efile -> move('images/idCard',$evidence);
        }



        $tId=Tutor::max('idTutor');
        if($tId === null){$tId = 0 ;}
        $TutorId=($tId +2);

    $data = DB::select('select email from tutors where email=? ',[$email]);

    if($Fname === null or $Lname === null or $email === null or $phone === null or $pass === null
 or $sex === null or $addr === null or $evidence === null or $education === null or $DOB === null ) {
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
           'DOB' => $DOB,
           'email' => $email,
           'phone' => $phone,
           'sex' => $sex,
           'address' => $addr,
           'status' => $status,
           'work_experient' => $work,
           'education' => $education,
           'partner' => $partner,
           'password' => Hash::make($pass),
           'passReal' => $pass]
        );

        $images = DB::table('image')->insert(
            ['idTutor' =>$TutorId,
            'img_path' => $image_card,
            'img_IDcard' => $evidence
            ]
         );

    return  redirect('/')->with('success','The customer has been stored in database');
        }
    }

    public function edit()
    {
        $id=Auth::id();
        $tutors = DB::table('tutors')->where(['idTutor' => $id])->get();
        $images = DB::table('image')->where(['idTutor' => $id])->get();
        return view('tutor.tutorEdit', ['tutors' => $tutors,'image' => $images]);
    }

    public function editCheck(request $request)
    {
        $idTutor=Auth::id();

        $Fname=$request->input('Fname');
        $Lname=$request->input('Lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $pass=$request->input('pass');
        $sex=$request->input('gender');
        $addr=$request->input('addr');
        $education=$request->input('education');
        $work=$request->input('work');
        $about=$request->input('about');
        $partner=$request->input('partner'); 
        $DOB=$request->input('DOB');
        $image_card=$request->input('image');
        $passNew = $request->input('passNew');
        $passH = Hash::make($passNew);

        if($file = $request->file('image') ){
            $image_card = $file -> getClientOriginalName();
            $file -> move('images/imageProfile',$image_card);
        }

        $data = DB::select('select email from tutors where email=? ',[$email]);
        
        if($Fname === null or $Lname === null or $email === null or $phone === null 
        or $sex === null or $addr === null or $education === null or $DOB === null ) 
       {
        return redirect()->back()->with('null','Please fill all required field.');
    }
    elseif($pass === null and $passNew === null ){
        if($image_card === null){
            $tutor = DB::table('tutors')
            ->where(['idTutor' => $idTutor])
                ->update([
                'Fname' => $Fname,
                'Lname' => $Lname,
                'DOB' => $DOB,
                'email' => $email,
                'phone' => $phone,
                'sex' => $sex,
                'address' => $addr,
                'work_experient' => $work,
                'education' => $education,
                'about_me' => $about,
                'partner' => $partner,]);
            
             $user = DB::table('users')
            ->where(['id' => $idTutor])
            ->update(['email' => $email
                ]
             );
             return  redirect('/home')->with('success','The customer has been stored in database');
        
        }elseif($image_card != null){
            $tutor = DB::table('tutors')
            ->where(['idTutor' => $idTutor])
                ->update([
                'Fname' => $Fname,
                'Lname' => $Lname,
                'DOB' => $DOB,
                'email' => $email,
                'phone' => $phone,
                'sex' => $sex,
                'address' => $addr,
                'work_experient' => $work,
                'education' => $education,
                'about_me' => $about,
                'partner' => $partner,]);
            
             $images = DB::table('image')
             ->where(['idTutor' => $idTutor])
             ->update(['img_path' => $image_card
                ]
             );
    
             $user = DB::table('users')
            ->where(['id' => $idTutor])
            ->update(['email' => $email
                ]
             );
             return  redirect('/home')->with('success','The customer has been stored in database');
        }
    }elseif($pass === null or $passNew === null){
        
        return redirect()->back()->with('pass2','Please fill all required field.');
    }
    else{
         $pR = DB::table('tutors')
         ->select('passReal')
         ->where([
             ['idTutor','=', $idTutor],
            ['passReal', '=', $pass]
         ])->get();
        
          if($pR == "[]"){
                return redirect()->back()->with('wrong','Please fill all required field.');
          }
        elseif(strlen($passNew) <8){
        return redirect()->back()->with('pass','Please fill all required field.');
     }else{
        if($image_card === null){
            $tutor = DB::table('tutors')
        ->where(['idTutor' => $idTutor])
            ->update([
            'Fname' => $Fname,
            'Lname' => $Lname,
            'DOB' => $DOB,
            'email' => $email,
            'phone' => $phone,
            'sex' => $sex,
            'address' => $addr,
            'work_experient' => $work,
            'education' => $education,
            'about_me' => $about,
            'partner' => $partner,
            'password' => $pR,
            'passReal' => $passNew ,
            ]);
    
         $user = DB::table('users')
        ->where(['id' => $idTutor])
        ->update(['email' => $email,
        'password' => $passH
            ]
         );
         
         return  redirect('/home')->with('success','The customer has been stored in database');
    
        }
        elseif($image_card != null){
            $tutor = DB::table('tutors')
        ->where(['idTutor' => $idTutor])
            ->update([
            'Fname' => $Fname,
            'Lname' => $Lname,
            'DOB' => $DOB,
            'email' => $email,
            'phone' => $phone,
            'sex' => $sex,
            'address' => $addr,
            'work_experient' => $work,
            'education' => $education,
            'about_me' => $about,
            'partner' => $partner,
            'password' => $passH,
            'passReal' => $passNew,]);
        
        $images = DB::table('image')
        ->where(['idTutor' => $idTutor])
        ->update(['img_path' => $image_card
            ]
         );

         $user = DB::table('users')
        ->where(['id' => $idTutor])
        ->update(['email' => $email,
       'password' => $passH
            ]
         );
         
         return  redirect('/home')->with('success','The customer has been stored in database');
    }
         }
        
        }

    }
 
}
