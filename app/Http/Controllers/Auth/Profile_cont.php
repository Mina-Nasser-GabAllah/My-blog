<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile_cont extends Controller
{
    public function update(Request $request){
        $user=Auth::user();
        if($request->isMethod('post')){
            if($this->check($request->input('c_password'))){
                $user->update([
                    'name'=>$request->input('name'),
                    'phone'=>$request->input('phone')
                ]);
                if(!is_null($request->input('password')) and ($request->input('password')==$request->input('confirm_password'))){
                    $user->password=Hash::make($request->input('password'));
                    $user->update();
                }
                return redirect()->back();
            }else{
                dd('Error');
            }
        }else{
            $arr['user']=$user;
            return view('Web.Auth.Profile_view',$arr);
        }
    }

    public function check($password){
        if(Hash::check($password,Auth::user()->getAuthPassword())){
            return true;
        }
        return false;
    }
}
