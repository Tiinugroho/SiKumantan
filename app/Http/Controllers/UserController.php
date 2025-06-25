<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $query = User::role('masyarakat')
            ->whereIn('status', ['aktif', 'pending', 'ditolak']);

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nik', 'like', "%{$keyword}%")
                    ->orWhere('name', 'like', "%{$keyword}%");
            });
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        return view('admin.data-user.index', compact('users'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $users = User::role('masyarakat')
            ->where('status', 'aktif')
            ->where(function ($q) use ($keyword) {
                $q->where('nik', 'like', "%{$keyword}%")
                    ->orWhere('name', 'like', "%{$keyword}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($users);
    }


    public function create()
    {
        return view('admin.data-user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'nullable|digits:16|unique:users,nik',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:50',
            'pendidikan' => 'nullable|string|max:100',
            'jenis_pekerjaan' => 'nullable|string|max:100',
            'photo_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['password', 'password_confirmation', 'photo_ktp']);

        if ($request->hasFile('photo_ktp')) {
            $data['photo_ktp'] = $request->file('photo_ktp')->store('photos_ktp', 'public');
        }

        $data['password'] = bcrypt($request->password);
        $data['status'] = 'aktif';

        $user = User::create($data);
        $user->assignRole('masyarakat');

        return redirect()->route('users.index')->with('success', 'Data user berhasil ditambahkan!');
    }

    public function verifikasi($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'aktif';
        $user->alasan_tolak = null;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diverifikasi.');
    }

    public function tolak(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'ditolak';
        $user->alasan_tolak = $request->alasan_tolak;
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil ditolak.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.data-user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nik' => 'nullable|digits:16|unique:users,nik,' . $user->id,
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:50',
            'pendidikan' => 'nullable|string|max:100',
            'jenis_pekerjaan' => 'nullable|string|max:100',
            'photo_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = $request->except(['password', 'password_confirmation', 'photo_ktp']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('photo_ktp')) {
            if ($user->photo_ktp && Storage::disk('public')->exists($user->photo_ktp)) {
                Storage::disk('public')->delete($user->photo_ktp);
            }
            $data['photo_ktp'] = $request->file('photo_ktp')->store('photos_ktp', 'public');
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->photo_ktp && Storage::disk('public')->exists($user->photo_ktp)) {
            Storage::disk('public')->delete($user->photo_ktp);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
