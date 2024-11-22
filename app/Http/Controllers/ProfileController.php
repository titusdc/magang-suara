<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    function profile(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            
        ],[
            'name.required'=>'Name wajib di isi',
            'email.required'=>'Email  wajib di isi',
            
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('profile')->with('success','Berhasil Update');
     
    }
    function setting(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'new_password' => 'required|confirmed',
            
            
        ],[
            'password.required'=>'password wajib di isi',
            'new_password.required'=>'new password  wajib di isi',
            
        ]);
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)){ 
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('setting')->with('success','Berhasil Update');
        }
        return redirect('setting')->with('error','password salah');
    }
}