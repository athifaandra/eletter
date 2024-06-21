<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

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

    public function profile()
    {
        $user = auth()->user();
        return view('head.head_profil', compact('user'));
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

        return redirect()->route('head.profile')->with('success', 'Profil berhasil diperbarui.');
    }

}
