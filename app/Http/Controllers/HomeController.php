<<<<<<< HEAD
<<<<<<< HEAD
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
        return view('home');
    }
}
=======
=======
>>>>>>> body
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
        return view('home');
    }


    public function updateTeacher (){ 
        

        $data = [
            'userFname' => request('fname'),
            'userLname' => request('lname'),
            'email' => request('email'),
            'prevpass' => request('prevpass'),
            'password' => request('newpass'),
            'teacherDetails' => request('myinfo'),
        ];
        
        if($data['prevpass'] == null && $data['password'] == null){
            DB::table('users')->where( 'id', Auth::user()->id )->update(
                [
                    'userFname' => $data['userFname'],
                    'userLname' => $data['userLname'],
                    'email' => $data['email'],
                ]);
            DB::table('teachers')->where( 'teacherId', Auth::user()->id )->update(
                [
                    'teacherDetails' => $data['teacherDetails'],
                ]);

        }
        else{
            $current_password = Auth::User()->password; 
            if(Hash::check($data['prevpass'], $current_password)){
                DB::table('users')->where( 'id', Auth::user()->id )->update(
                    [
                        'userFname' => $data['userFname'],
                        'userLname' => $data['userLname'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                    ]);
                DB::table('teachers')->where( 'teacherId', Auth::user()->id )->update(
                    [
                        'teacherDetails' => $data['teacherDetails'],
                    ]);
            }
            else
            {           
              $error = array('prevpass' => 'كلمه المرور خاطيئه'); 
            }

        }
        return redirect('home');
        
    }


}
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> body
