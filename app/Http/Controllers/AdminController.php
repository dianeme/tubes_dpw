<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function masuk(){
        if(session()->has('admin')){
            return redirect()->route('admindashboard');
        }
        $data['title'] = "Login Admin";
        return view('administrator/masuk', $data);
    }
    public function adminlogin_action(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if($admin) {
            if(Hash::check($request->password, $admin->password)) {
                session()->put('admin_id', $admin->admin_id);
                return redirect()->route('admindashboard');
            } else {
                return redirect()->route('adminlogin')->with('wrong', 'Email atau password anda salah!');
            }
        } else {
            return redirect()->route('adminlogin')->with('wrong', 'Email atau password anda salah!');
        }
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('administrator/masuk');
    }

}
?>