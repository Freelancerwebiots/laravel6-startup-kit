<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class SettingController extends Controller
{
    public function getList() {
    	$setting = Setting::get(); // fetching data of setting module
    	return view('admin.setting.list',compact('setting'));
    }

    public function edit($id) {
        $setting = Setting::find($id); // redirect to edit setting data 
        return view('admin.setting.edit',compact('setting'));
    }

    //updating setting data
    public function update(Request $request, $id){
        Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required',
        ])->validate();
        $setting = Setting::find($id);
        $setting->name = $request->name;
        $setting->value = $request->value;
        $setting->save();
        return redirect()->route('setting.list');
    }
}