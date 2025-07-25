<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'owner') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username atau password salah!');
        }
        return redirect()->route('login')->with('error', 'Username atau password salah!');
    }
    public function postRegister(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('register')->with('error', 'Email sudah pernah didaftarkan');
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->with('error', $validator->errors()->first());
        }

        $data = new User;

        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = Hash::make($request->input('password'));
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->role = 'user';

        $post = $data->save();

        if ($post) {
            return redirect()->route('login')->with('success', 'Berhasil Melakukan Pendaftaran');
        } else {
            return redirect()->route('login')->with('error', 'Gagal Melakukan Pendaftaran');
        }
    }

    public function login()
    {
        if (auth()->user() != null) {
            return redirect('dashboard');
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
