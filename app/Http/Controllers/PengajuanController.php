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

        return view ('staff/staff_pengajuan', compact('pengajuan'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('staff/staff_create', compact('user'));
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

        $lastPengajuan = Pengajuan::whereYear('tanggal_surat', date('Y'))->orderBy('id', 'desc')->first();
        $lastNumber = $lastPengajuan ? intval(explode('.', explode('/', $lastPengajuan->nomor_surat)[2])[0]) : 0;
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $month = getRomawi(date('m'));
        $year = date('Y');

        $statusPengajuan = 'Proses';

        if ($request->jenis_surat == 'Permohonan Cuti') {
            $nomorSurat = "B-1154/1371/PC.$newNumber/$month/$year";
        } else {
            $nomorSurat = "B-1154/1371/PT.$newNumber/$month/$year";
        }

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

        return redirect()->route('staff.pengajuan')->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function cetak($id)
    {
        \Carbon\Carbon::setLocale('id');

        $pengajuan = Pengajuan::findOrFail($id);

        $pdf = new Dompdf();
        $pdf->loadHtml(view('print.cuti', ['pengajuan' => $pengajuan])->render());

        // Render the PDF (not necessary if you want to download directly)
        $pdf->render();

        // Download the generated PDF
        return $pdf->stream('document.pdf');
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
        return view('head.head_tindaklanjut_pengajuan', compact ('pengajuan'));
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

}
