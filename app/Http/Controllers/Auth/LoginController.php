<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    // Redirect to dashboard or login based on Auth status
    protected function redirectTo()
    {
        if (Auth::user() && Auth::user()->role_id==1) {
            return '/dashboard';
        } else if( Auth::user() && Auth::user()->role_id==2 && Auth::user()->is_active==0){
            Auth::logout();
            return '/login';
        }
        elseif ( Auth::user() && Auth::user()->role_id==2 && Auth::user()->is_active==1) {
            return '/home';
        }
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $remember = $request->has('remember') ? true : false;
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password],$remember)){

            if(auth()->user()->is_active==0){
                Auth::logout();
                return back()->with('error', 'Your account has been blocked, please contact to Admin');
            } else if (Auth::user() && Auth::user()->role_id==1) {
                return redirect()->route('dashboard');
            } else if ( Auth::user() && Auth::user()->role_id==2) {
                return redirect()->route('home');
            }
        }else {
            return back()->with('error', 'Your Email address or password is incorrect.');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
