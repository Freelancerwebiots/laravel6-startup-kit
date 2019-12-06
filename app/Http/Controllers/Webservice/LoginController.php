<?php

namespace App\Http\Controllers\Webservice;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use session;
use Helpers;
use App\User;
use Str;

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
    protected $redirectTo = '/home';
    
     //....User Login ....
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->email_verified_at != null){                     // Check user is Verified or not...
                if(Auth::user()->is_active==0){
                    Auth::logout();
                    return response()->json(['status'=>'error','message'=> 'Your account has not yet been activated. Please check Your email'],errorStatus());
                }else if (Auth::user() && Auth::user()->role_id==2) {       // User Login...
                    if(Auth::user()->api_token == null){                    // If token is empty then generate token...
                        $user=User::find(Auth::user()->id);
                        $user->api_token = Str::random(60);
                        $user->save();
                        return response()->json(['status'=>'success','message'=> 'Login Success','Data'=> $user],successStatus());
                    }else{
                        return response()->json(['status'=>'success','message'=> 'Login Success','Data'=> Auth::user()],successStatus());
                    }
                }else if (Auth::user() && Auth::user()->role_id==1) {
                    if(Auth::user()->api_token == null){                    // If token is empty then generate token...
                        $userAdmin=User::find(Auth::user()->id);
                        $userAdmin->api_token = Str::random(60);
                        $userAdmin->save();
                        return response()->json(['status'=>'success','message'=> 'Login Success','Data'=> $userAdmin],successStatus());
                    }
                }
            }else{
                return response()->json(['status'=>'error','message'=> 'Please Verify Your Email-address'],errorStatus());
            }
        }else {
            return response()->json(['status'=>'error','message'=> 'Email Address or/and password are incorrect.'], errorStatus() );
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

    public function logout(Request $request)
    {
        return  $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return response()->json(['status'=>'success','message' => 'User logged out.'], successStatus());
    }
}
