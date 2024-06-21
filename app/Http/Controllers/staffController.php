<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class staffController extends Controller
{
    public function index()
    {
        if (Gate::allows('isStaff')) {

            return view('staff/staff_dashboard');

        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('staff.staff_profil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->jabatan = $request->jabatan;

        $user->save();

        return redirect()->route('staff.profile')->with('success', 'Profil berhasil diperbarui.');
    }

}
