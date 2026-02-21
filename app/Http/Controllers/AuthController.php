<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('login.index');
    }

    /*
     * Proses Auth login
     */
    public function login(LoginAuthRequest $request)
    {
        # Validasi form input.
        $credentials = $request->validated();
        # Konversi data formValid 'username' dengan huruf kecil.
        $credentials['username'] = strtolower($credentials['username']);

        # Kalau data fromValid cocok autentik dengan model User.
        if (Auth::attempt($credentials)) {
            # Memperbarui session.
            $request->session()->regenerate();
            
            # Kalau data 'is_active' user adalah false.
            if (!$request->user()->is_active) {
                # Melogout akun user.
                Auth::logout();

                # Membatalkan session dan memperbarui token session.
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                # Return fail massage
                return back()->with('fail', 'Status Admin non-Aktif!');
            }
            # Mengalihkan ke halaman Admin Dashboard.
            return redirect()->intended('/dashboard');
        }
        # Return fail massage jika proses login tidak berhasil.
        return back()->with('fail', 'Data login Salah!');
    }

    /**
     * Proses Logout User Admin.
     */
    public function logout(Request $request){
        # logout akun user.
        Auth::logout();

        # Membatalkan session dan memperbarui token session.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        # Mengalihkan ke halaman Login.
        return redirect()->route('auth.login');
    }
}
