<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function daftar() {
        return view('auth/daftar', [
            'title' => 'Daftar',
        ]);
    }

    public function masuk() {
        return view('auth/masuk', [
            'title' => 'Masuk',
        ]);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:6|unique:users',
            'nama' => 'required',
            'telepon' => 'required|min:11',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['level'] = 'masyarakat';

        if(User::create($validated)) {
            return redirect('masuk')->with('berhasil', 'Berhasil mendaftarkan akun!');
        }else{
            return redirect()->back()->with('gagal', 'Gagal mendaftarkan akun!');
        }
    }

    public function username() {
        return 'username';
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        ]);

        $data = $request->only(['username', 'password']);

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('gagal', 'Gagal masuk!');
    }

    public function keluar(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('masuk');
    }
}
