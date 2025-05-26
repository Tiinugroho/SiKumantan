<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('views.partials.login'); // Sesuaikan dengan nama view login yang kamu buat
    }

    public function showRegisterForm()
    {
        return view('Auth.register');
    }

    public function showLoginForm()
    {
        return view('Auth.login');
    }

    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|digits:16|unique:users,nik',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'photo_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|min:6|confirmed',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik.unique' => 'NIK ini sudah terdaftar.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Upload foto KTP
        $photoPath = $request->file('photo_ktp')->store('photos_ktp', 'public');

        // Simpan user dengan status pending
        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'photo_ktp' => $photoPath,
            'password' => Hash::make($request->password),
            'status' => 'pending',
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan tunggu verifikasi dari admin/staff.');
    }



    // Login JSON Response (kalau dipakai)
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Cek status langsung di kolom user
            if ($user->status !== 'aktif') {
                Auth::logout();
                return response()->json(['error' => 'Akun Anda masih dalam proses verifikasi.']);
            }

            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['error' => 'Email atau Password salah.']);
    }

    // Login form biasa
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->status !== 'aktif') {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Akun Anda belum diverifikasi oleh admin/staff.',
                ])->withInput();
            }

            return redirect()->route('home.index');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Email atau Password salah.',
        ])->withInput();
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
