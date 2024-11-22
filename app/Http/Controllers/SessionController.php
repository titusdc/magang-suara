<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }
    function login(Request $request)
    {
         Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
        ]);

        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('dashboard')->with('success','Berhasil login');
        } else{
            return redirect('sesi')->withErrors('Username dan Password Salah');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil logout');
    }
    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'Nama wajib di isi',
            'email.required'=>'Email wajib di isi',
            'email.email'=>'Silahkan masukkan email dengan benar',
            'email.unique'=>'Email Sudah terdaftar',
            'password.required'=>'Password wajib di isi',
            'password.min'=>'Minimal 6 karakter',
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];
        
        User::create($data);

        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        
            return redirect('sesi')->with('success', 'Berhasil login');
        
    }
}