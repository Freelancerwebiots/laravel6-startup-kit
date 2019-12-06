<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Str;

class UserController extends Controller
{
    public function getList(Request $request){
            $users = User::where('role_id',2)->get(); // fetching only user role data
            if($request->wantsJson()){
                return response()->json(['status'=>'success','Data',$users],200);
            }else{
                return view('admin.user.list',compact('users'));
            }
    }

    public function action(Request $request, $id){
    	$user = User::find($id);
        if ($request->action == 'delete') {
    	   $user->deleted_at = date('Y-m-d H:i:s'); // soft delete apply
        } else if ($request->action == 'block') {
            $user->is_active = 0; // set status block
        } else {
            $user->is_active = 1; // set status Active
        }
    	$user->save();
    	return redirect()->back()->with("success","Done successfully.");
    }
}