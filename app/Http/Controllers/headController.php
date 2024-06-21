<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ArsipKeluar;
use App\Models\ArsipMasuk;

>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class headController extends Controller
{
    public function index()
    {
        if (Gate::allows('isHead')) {

<<<<<<< HEAD
            return view('head/head_dashboard');
=======
            $inboxCount = ArsipMasuk::count();
            $outboxCount = ArsipKeluar::count();

            return view('head/head_dashboard',  [
                'inboxCount' => $inboxCount,
                'outboxCount' => $outboxCount,
            ]);
>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3

        } else {
            abort(403, 'Unauthorized action.');
        }
    }

<<<<<<< HEAD
    public function profile(){
        return view('head.head_profil');
=======
    public function profile()
    {
        $user = auth()->user();
        return view('head.head_profil', compact('user'));
>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
<<<<<<< HEAD
            'position' => 'required',
=======
>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->nip = $request->nip;
<<<<<<< HEAD
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
=======

        $user->save();

        return redirect()->route('head.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    

>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3
}
