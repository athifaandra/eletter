<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adminController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {

            return view('admin/dashboard');

        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.adm_profil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->nip = $request->nip;

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
    }


}
