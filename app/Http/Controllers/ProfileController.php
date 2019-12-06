<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
    	$users = User::where('email', Auth::user()->email)->first();
    	return view('profile',compact('users'));
    }

    // Updating User profile data
    public function update(Request $request){
    	Validator::make($request->all(), [
            'name' => 'required|string|min:3',
        ])->validate();
    	$user = User::find(Auth::user()->id);
        $user->name = $request->name;
        if($request->hasFile('profile_pic')){
            $request->validate([
                'profile_pic' => 'image|mimes:jpeg,png,gif,svg,jpg|max:1024'
            ]);
            $imgName = time().'.'.$request->profile_pic->getClientOriginalExtension();
            $request->profile_pic->move(public_path('images/profiles'), $imgName);
            $user->profile_pic = $imgName;
            if(Auth::user()->profile_pic !== null && file_exists(public_path('images/profiles')."/".Auth::user()->profile_pic)){
            	unlink(public_path('images/profiles')."/".Auth::user()->profile_pic);
            }
        }
        $user->save();
        if ($request->wantsJson()){
            return response()->json(['status'=>'success','message' => 'Your profile is updated successfully','Data' => $user], successStatus());
        }else{
            return redirect()->back()->with('success','Your profile is updated successfully.');

        }
    }

    // Change password by verifying old one first
    public function changePassword(Request $request){
    	Validator::make($request->all(), [
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|same:password_confirmation|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[@!$#%]).*$/',
        ])->validate();
        if(Hash::check($request->old_password,Auth::user()->password)){
        	$user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            if ($request->wantsJson()){

                return response()->json(['status'=>'success','message'=>'Your password has been changed successfully.'],successStatus());
            }else{
                return redirect()->back()->with('success','Your password has been changed successfully.');
            }
        }
        else{
            if ($request->wantsJson()){
                return response()->json(['status'=>'error','message','Oops! You entered wrong Old password.'],errorStatus());
            }else{
                return redirect()->back()->with('Error','Oops! You entered wrong Old password.');

            }
        }
    }
} 
