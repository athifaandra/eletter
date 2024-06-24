<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use Dompdf\Dompdf;

class PengajuanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pengajuan = $user->pengajuan()->get();

        return view('staff.staff_pengajuan', compact('pengajuan'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('staff.staff_create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'ringkasan' => 'required',
            'alamat' => 'required',
            'jenis_surat' => 'required',
        ]);

        // Fungsi untuk mendapatkan bulan Romawi dari tanggal
        function getRomawi($month)
        {
            $romawi = [
                1 => 'I',
                2 => 'II',
                3 => 'III',
                4 => 'IV',
                5 => 'V',
                6 => 'VI',
                7 => 'VII',
                8 => 'VIII',
                9 => 'IX',
                10 => 'X',
                11 => 'XI',
                12 => 'XII'
            ];

            return $romawi[intval($month)];
        }

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Tentukan jenis surat (Permohonan Cuti atau Permohonan Tugas)
        $jenisSurat = $request->jenis_surat == 'Permohonan Cuti' ? 'PC' : 'PT';

        // Ambil pengajuan terakhir dalam tahun ini untuk jenis surat yang sama
        $lastPengajuan = Pengajuan::whereYear('tanggal_surat', now()->year)
                            ->where('perihal', $request->jenis_surat)
                            ->orderBy('id', 'desc')
                            ->first();

        // Hitung nomor surat yang baru
        $newNumber = $lastPengajuan ? intval(explode('.', explode('/', $lastPengajuan->nomor_surat)[2])[1]) + 1 : 1;
        $newNumberPadded = str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // Dapatkan bulan dalam format Romawi
        $monthRoman = getRomawi(date('m'));

        // Buat nomor surat baru dengan format yang diharapkan
        $nomorSurat = "B-1154/1371/$jenisSurat.$newNumberPadded/$monthRoman/" . now()->format('Y');

        // Status default pengajuan
        $statusPengajuan = 'Proses';

        // Simpan pengajuan ke dalam database
        $pengajuan = new Pengajuan();
        $pengajuan->nip = $request->nip;
        $pengajuan->nomor_surat = $nomorSurat;
        $pengajuan->tanggal_surat = now();
        $pengajuan->perihal = $request->jenis_surat;
        $pengajuan->tanggal_mulai = $request->tanggal_mulai;
        $pengajuan->tanggal_selesai = $request->tanggal_selesai;
        $pengajuan->ringkasan = $request->ringkasan;
        $pengajuan->alamat = $request->alamat;
        $pengajuan->status = $statusPengajuan;
        $pengajuan->save();

        // Redirect ke halaman pengajuan dengan pesan sukses
        return redirect()->route('staff.pengajuan')->with('success', 'Pengajuan berhasil dikirim.');
    }


    public function cetak($id)
    {
        \Carbon\Carbon::setLocale('id');

        $pengajuan = Pengajuan::findOrFail($id);

        $pdf = new Dompdf();
        $pdf->loadHtml(view('print.cetak-pengajuan', ['pengajuan' => $pengajuan])->render());

        // Render the PDF (not necessary if you want to download directly)
        $pdf->render();

        // Download the generated PDF
        return $pdf->stream('document.pdf');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();
        return redirect()->route('staff.pengajuan')->with('success', 'Pengajuan berhasil dihapus.');
    }

    public function head()
    {
        $pengajuan = Pengajuan::with('user')->get();

        \Carbon\Carbon::setLocale('id');

        return view('head.head_daftar_pengajuan', compact('pengajuan'));
    }

    public function detail($id)
    {
        $pengajuan = Pengajuan::with('user')->findOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('head.head_tindaklanjut_pengajuan', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string',
        ]);

        // Cari pengajuan berdasarkan ID
        $pengajuan = Pengajuan::findOrFail($id);

        // Update status
        $pengajuan->status = $request->status;
        $pengajuan->save();

        // Redirect atau berikan response
        return redirect()->route('head.pengajuan')->with('success', 'Status berhasil diperbarui');
    }

    public function admin()
    {
        $pengajuan = Pengajuan::with('user')->get();

        \Carbon\Carbon::setLocale('id');

        return view('admin.adm_daftar_pengajuan', compact('pengajuan'));
    }

    
}
