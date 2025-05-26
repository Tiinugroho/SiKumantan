<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            // Cek jika user bukan role khusus (kades, sekda, staff)
            if (!$user->hasAnyRole(['kades', 'staff-Tu', 'sekretaris']) && $user->status !== 'aktif') {
                return back()->withErrors(['email' => 'Akun Anda sudah di buat tetapi belum diverifikasi oleh Admin Mohon Menunggu.'])->withInput();
            }

            // Kalau lolos cek di atas, login user
            Auth::login($user);

            // Redirect sesuai role
            if ($user->hasAnyRole(['kades', 'staff-Tu', 'sekretaris'])) {
                return redirect('/admin/dashboard');
            }

            return redirect('/'); // user biasa ke halaman utama
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
