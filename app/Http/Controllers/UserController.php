<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'staff')->get();
        return view('admin/adm_kelola_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/adm_tambah_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:users',
            'jabatan' => 'required',
        ], [
            'name.required' => 'Field Nama harus diisi.',
            'nip.required' => 'Field NIP harus diisi.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'jabatan.required' => 'Field Jabatan harus diisi.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->jabatan = $request->jabatan;
        $user->password = Hash::make('12345');
        $user->role = 'staff';
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
