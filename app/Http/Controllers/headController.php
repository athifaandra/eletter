<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class headController extends Controller
{
    public function index()
    {
        if (Gate::allows('isHead')) {

            return view('head/head_dashboard');

        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function profile(){
        return view('head.head_profil');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'position' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->position = $request->position;
        $user->save();

        return back()->with('status', 'Profil berhasil diubah.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);

        try {
            $user->save();
            return redirect()->route('head.profile')->with('status', 'Password berhasil diubah.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan password baru.']);
        }
    }
}
