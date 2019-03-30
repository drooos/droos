<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\parents;
use App\teachers;
use App\students;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'userFname' => ['required', 'string', 'max:255'],
            'userLname' => ['required', 'string', 'max:255'],
            'userNumber' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $usr = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'userFname' => $data['userFname'],
            'userLname' => $data['userLname'],
            'userNumber' => $data['userNumber'],
            'userRule' => $data['userRole']
        ]);

        switch ( $data['userRole'] ){
            case 'teacher' : {
                teachers::create([
                    'teacherId' => $usr->id ,
                    'teacherDetails' => $data['userNumber'],
                    'teacherRate' => 0.0
                ]);
            }
            break;

            case 'parent' : {
                parents::create([
                    'parentId' => $usr->id ,
                    'parentPhone' => $data['userNumber'],
                ]);
            }
            break;

            case 'student' : {
                students::create([
                    'studentId' => $usr->id ,
                    'parentId' => null,
                ]);
            }
            break;
        }

        return $usr;
        
    }
}
