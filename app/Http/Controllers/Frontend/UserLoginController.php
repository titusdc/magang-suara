<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    function index()
    {
        return view('user/index');
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'     => 'required',
            'password'  =>  'required',
        ],[
            'email.required'    =>  'email wajib di isi',
            'password.required' =>  'password wajib di isi'

        ]);

        $infologin  =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($infologin)){
            return redirect('/')->with('succes,berhasil login');
        }else{
            return redirect('user')->withErrors('email dan password salah');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('user')->with('succes,berhasil logout');
    }
    function register(){
        return view('user/register');
    }
    function create(Request $request){
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:6'

        ],[
            'name.required'     =>  'nama wajib di isi',
            'email.required'    =>  'email wajib di isi',
            'email.email'       =>  'silahkan masukan email dengan benar',
            'email.unique'      =>  'email sudah terdaftar',
            'password.required' =>  'password wajib di isi',
            'password.min'      =>  'minimal 6 karakter' 
        ]);

        $data   =[
            'name'     =>$request->name,
            'email'    =>$request->email,
            'password'  =>Hash::make($request->password)
        ];
        
        User::create($data);

        $infologin  =[
            'email' =>$request->email,
            'password'  =>$request->password,
        ];

        return redirect('user')->with('succes,berhasil dibuat');
    }
}