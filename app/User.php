<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN_STATUS = 'admin';
    const TUTOR_STATUS = 'tutor';
    const STUDENT_STATUS = 'student';

    public function isAdmin(){
        return $this->status === self::ADMIN_STATUS;
    }

    public function isTutor(){
        return $this->status === self::TUTOR_STATUS;
    }

    public function isStudent(){
        return $this->status === self::STUDENT_STATUS;
    }
}
