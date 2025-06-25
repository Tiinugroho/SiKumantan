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
        return view('views.partials.login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|digits:16',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:100',
            'jenis_pekerjaan' => 'required|string|max:100',
            'photo_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            // validasi custom lainnya
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cek user dengan nik atau email yang statusnya ditolak
        $existingUser = User::where(function ($query) use ($request) {
            $query->where('nik', $request->nik)
                ->orWhere('email', $request->email);
        })->where('status', 'ditolak')->first();

        // Upload foto KTP dulu
        $photoPath = $request->file('photo_ktp')->store('photos_ktp', 'public');

        if ($existingUser) {
            // Update data user yang ditolak tadi
            $existingUser->name = $request->name;
            $existingUser->email = $request->email;
            $existingUser->password = Hash::make($request->password);
            $existingUser->alamat = $request->alamat;
            $existingUser->jenis_kelamin = $request->jenis_kelamin;
            $existingUser->tempat_lahir = $request->tempat_lahir;
            $existingUser->tanggal_lahir = $request->tanggal_lahir;
            $existingUser->agama = $request->agama;
            $existingUser->pendidikan = $request->pendidikan;
            $existingUser->jenis_pekerjaan = $request->jenis_pekerjaan;
            $existingUser->photo_ktp = $photoPath;
            $existingUser->status = 'pending';
            $existingUser->save();

            return redirect()->route('login')->with('success', 'Akun berhasil diperbarui dan menunggu verifikasi ulang.');
        } else {
            // Cek juga nik/email sudah ada tapi bukan status ditolak
            $duplicateCheck = User::where('nik', $request->nik)
                ->orWhere('email', $request->email)
                ->first();
            if ($duplicateCheck) {
                return redirect()->back()->withErrors(['nik' => 'NIK atau email sudah terdaftar'])->withInput();
            }

            // Buat user baru
            $user = User::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
                'jenis_pekerjaan' => $request->jenis_pekerjaan,
                'photo_ktp' => $photoPath,
                'status' => 'pending',
            ]);

            $user->assignRole('masyarakat');

            return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan tunggu verifikasi dari admin/staff.');
        }
    }


    // Login
    public function login(Request $request)
    {
        $request->validate([
            'credential' => 'required|string',
            'password' => 'required|string',
        ]);

        $credential = $request->input('credential');
        $password = $request->input('password');

        $data = User::where('nip', $credential)
            ->orWhere('nik', $credential)
            ->first();

        if (!$data) {
            return back()->withErrors([
                'credential' => 'NIP/NIK tidak ditemukan.'
            ])->withInput();
        }

        if (!Hash::check($password, $data->password)) {
            return back()->withErrors([
                'credential' => 'Password salah.'
            ])->withInput();
        }

        if ($data->status === 'ditolak') {
            return back()->withErrors([
                'credential' => 'Maaf akun Anda ditolak. Alasan: ' . $data->alasan_tolak . ' Silakan registrasi ulang.'
            ])->withInput();
        }

        if (
            !$data->hasAnyRole(['kades', 'staff-Tu', 'sekretaris'])
            && $data->status !== 'aktif'
        ) {
            return back()->withErrors([
                'credential' => 'Akun Anda belum diverifikasi oleh admin. Mohon untuk menunggu, terima kasih.'
            ])->withInput();
        }

        Auth::login($data);

        if ($data->hasAnyRole(['kades', 'staff-Tu', 'sekretaris'])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('welcome');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
