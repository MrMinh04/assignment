<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Đăng nhập 
    public function showFormLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $user = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8', 
        ]);
        // dd($user);
        if(Auth::attempt($user)){
            return redirect()->intended('home');
        }else{
            return redirect()->back()->withErrors([
                'email'=>'Thông tin người dùng không đúng',
                'password'=>'Thông tin mật khẩu không đúng'
            ]);
        }
        
    }
    // Đăng ký
    public function showFormRegister(){
        return view('auth.register');
    }
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'ngay_sinh' => 'required|date',
            'so_dien_thoai' => 'required|string|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/|max:15',
            'dia_chi' => 'required|string|max:255',
            'role' => 'required',
        ]);
        $user = User::query()->create($data);
        Auth::login($user);
        return redirect()->intended('home');
        // dd($data);
    }
    // Đăng xuất
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
