<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login ()
    {
        return view('login');
    }

    public function prosesLogin (Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                Session::flash('status', 'failed');
                Session::flash('message', 'Akun anda tidak aktif. Tolong kontak admin!');
                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1){
                return redirect()->route('admin.dashboard');
            };

            if (Auth::user()->role_id == 2){
                return redirect()->route('user.home');
            };
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function register ()
    {
        return view('register');
    }

    public function prosesRegist(Request $request)
    {
        // Validasi data input
        $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required|string|max:500',
        ]);

        // Buat instance baru dari model User
        $user = new User([
            'username' => $request->username,
            'password' => Hash::make($request->password), 
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'status' => 'inactive', 
        ]);

        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Registrasi berhasil! Tunggu admin mengaktifkan akun anda.');
        return redirect('register')->with('success', 'Registrasi berhasil! Tunggu admin mengaktifkan akun anda.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect('/');
    }
}
