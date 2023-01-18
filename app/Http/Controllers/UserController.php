<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        $data['title'] = "Registrasi";
        return view('auth/daftar', $data);
    }
    public function register_action(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:tb_user',
            'password' => 'required',
            'alamat' => 'required',
            'nohp' => 'required'
        ]);
        $user = new User([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);
        $user->save();
        return redirect()->route('masuk')->with('success', 'Pendaftaran berhasil. Silahkan login!');
    }
    
    public function masuk(){
        $data['title'] = "Login Member";
        return view('auth/masuk', $data);
    }
    public function login_action(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->route('akun');
            } else {
                return redirect()->route('masuk')->with('wrong', 'Email atau password anda salah!');
            }
        } else {
            return redirect()->route('masuk')->with('wrong', 'Email atau password anda salah!');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk');
    }
}
