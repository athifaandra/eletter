<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return view('staff/staff_profil', compact('user'));
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

        return redirect()->route('staff.dashboard')->with('success', 'Profil berhasil diperbarui.');
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
    $user->save();

    return redirect()->route('staff.profile')->with('success', 'Password berhasil diubah.');
}

}
