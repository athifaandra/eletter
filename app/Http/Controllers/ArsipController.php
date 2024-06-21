<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipMasuk;
use App\Models\ArsipKeluar;

class ArsipController extends Controller
{
    public function inbox()
    {
        $arsipmasuk = ArsipMasuk::all();

        \Carbon\Carbon::setLocale('id');

        return view('admin/adm_inbox', compact('arsipmasuk'));
    }

    public function tambahinbox()
    {
        return view ('admin/adm_tambahinbox');
    }

    public function storeinbox (Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'nomor_agenda' => 'required',
            'tanggal_agenda' => 'required',
            'tanggal_surat' => 'required',
            'ringkasan' => 'required',
            'lampiran' => 'required|mimes:pdf',
        ]);


        $inbox = new ArsipMasuk();
        $inbox -> nomor_surat = $request->nomor_surat;
        $inbox -> pengirim = $request->pengirim;
        $inbox -> nomor_agenda = $request->nomor_agenda;
        $inbox -> tanggal_agenda = $request->tanggal_agenda;
        $inbox -> tanggal_surat = $request->tanggal_surat;
        $inbox -> ringkasan = $request->ringkasan;
        $inbox -> lampiran = $request->lampiran;

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $originalFileName = $file->getClientOriginalName();
            $path = $file->storeAs('public/lampiran', $originalFileName);
            $inbox['lampiran'] = $path;
        }
        $inbox->save();

        return redirect()->route('arsip.inbox')->with('success', 'Arsip Masuk berhasil ditambahkan.');
    }

    public function detailinbox($id) {
        $arsipmasuk = ArsipMasuk::FindOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('admin.detail', compact ('arsipmasuk'));
    }

    public function editinbox($id) {
        $arsipmasuk = ArsipMasuk::FindOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('admin.adm_editinbox', compact ('arsipmasuk'));
    }

    public function updateinbox(Request $request, $id) {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'nomor_agenda' => 'required',
            'tanggal_agenda' => 'required',
            'tanggal_surat' => 'required',
            'ringkasan' => 'required',
            'lampiran' => 'sometimes|nullable|mimes:pdf',
        ]);

        $arsipmasuk = ArsipMasuk::findOrFail($id);
        $arsipmasuk->nomor_surat = $request->input('nomor_surat');
        $arsipmasuk->pengirim = $request->input('pengirim');
        $arsipmasuk->nomor_agenda = $request->input('nomor_agenda');
        $arsipmasuk->tanggal_agenda = $request->input('tanggal_agenda');
        $arsipmasuk->tanggal_surat = $request->input('tanggal_surat');
        $arsipmasuk->ringkasan = $request->input('ringkasan');

        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
            $arsipmasuk->lampiran = $lampiranPath;
        }

        $arsipmasuk->save();

        return redirect()->route('arsip.inbox', $arsipmasuk->id)->with('success', 'Surat berhasil diperbarui');
    }


    public function destroyinbox(ArsipMasuk $arsipmasuk)
    {
        $arsipmasuk->delete();
        return redirect()->route('arsip.inbox')->with('success', 'Arsip berhasil dihapus.');
    }

    public function outbox()
    {
        $arsipkeluar = ArsipKeluar::all();

        \Carbon\Carbon::setLocale('id');

        return view('admin/adm_outbox', compact('arsipkeluar'));
    }

    public function tambahoutbox()
    {
        return view('admin.adm_tambahoutbox');
    }

    public function storeoutbox (Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'nomor_agenda' => 'required',
            'tanggal_agenda' => 'required',
            'tanggal_surat' => 'required',
            'ringkasan' => 'required',
            'lampiran' => 'required|mimes:pdf',
        ]);


        $outbox = new ArsipKeluar();
        $outbox -> nomor_surat = $request->nomor_surat;
        $outbox -> penerima = $request->penerima;
        $outbox -> nomor_agenda = $request->nomor_agenda;
        $outbox -> tanggal_agenda = $request->tanggal_agenda;
        $outbox -> tanggal_surat = $request->tanggal_surat;
        $outbox -> ringkasan = $request->ringkasan;
        $outbox -> lampiran = $request->lampiran;

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $originalFileName = $file->getClientOriginalName();
            $path = $file->storeAs('public/lampiran', $originalFileName);
            $outbox['lampiran'] = $path;
        }
        $outbox->save();

        return redirect()->route('arsip.outbox')->with('success', 'Arsip Keluar berhasil ditambahkan.');
    }
    public function detailoutbox($id) {
        $arsipkeluar =ArsipKeluar::FindOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('admin.detail_outbox', compact ('arsipkeluar'));
    }

    public function editoutbox($id) {
        $arsipkeluar =ArsipKeluar::FindOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('admin.adm_editoutbox', compact ('arsipkeluar'));
    }

    public function updateoutbox(Request $request, $id) {
        $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'nomor_agenda' => 'required',
            'tanggal_agenda' => 'required',
            'tanggal_surat' => 'required',
            'ringkasan' => 'required',
            'lampiran' => 'sometimes|nullable|mimes:pdf', // make lampiran optional
        ]);

        $arsipkeluar = ArsipKeluar::findOrFail($id);
        $arsipkeluar->nomor_surat = $request->input('nomor_surat');
        $arsipkeluar->penerima = $request->input('penerima');
        $arsipkeluar->nomor_agenda = $request->input('nomor_agenda');
        $arsipkeluar->tanggal_agenda = $request->input('tanggal_agenda');
        $arsipkeluar->tanggal_surat = $request->input('tanggal_surat');
        $arsipkeluar->ringkasan = $request->input('ringkasan');

        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
            $arsipkeluar->lampiran = $lampiranPath;
        }

        $arsipkeluar->save();

        return redirect()->route('arsip.outbox')->with('success', 'Surat berhasil diperbarui');
    }

    public function destroyoutbox(ArsipKeluar $arsipkeluar)
    {
        $arsipkeluar->delete();
        return redirect()->route('arsip.outbox')->with('success', 'Arsip berhasil dihapus.');
    }

    public function agenda()
    {
        $suratKeluar = ArsipKeluar::select('nomor_surat', 'penerima as instansi', 'nomor_agenda', 'tanggal_agenda', 'tanggal_surat', 'ringkasan', 'lampiran');

        $suratMasuk = ArsipMasuk::select('nomor_surat', 'pengirim as instansi', 'nomor_agenda', 'tanggal_agenda', 'tanggal_surat', 'ringkasan', 'lampiran');

        // Menggabungkan hasil dari kedua query
        $dataSurat = $suratKeluar->union($suratMasuk)->get();

        return view('admin.agenda', compact('dataSurat'));
    }

    public function staffagenda()
    {
        $suratKeluar = ArsipKeluar::select('nomor_surat', 'penerima as instansi', 'nomor_agenda', 'tanggal_agenda', 'tanggal_surat', 'ringkasan', 'lampiran');

        $suratMasuk = ArsipMasuk::select('nomor_surat', 'pengirim as instansi', 'nomor_agenda', 'tanggal_agenda', 'tanggal_surat', 'ringkasan', 'lampiran');

        // Menggabungkan hasil dari kedua query
        $dataSurat = $suratKeluar->union($suratMasuk)->get();

        return view('staff.staff_agenda', compact('dataSurat'));
    }

    public function headagenda()
    {
        $suratKeluar = ArsipKeluar::select('nomor_surat', 'penerima as instansi', 'nomor_agenda', 'tanggal_agenda', 'tanggal_surat', 'ringkasan', 'lampiran');

        $suratMasuk = ArsipMasuk::select('nomor_surat', 'pengirim as instansi', 'nomor_agenda', 'tanggal_agenda', 'tanggal_surat', 'ringkasan', 'lampiran');

        // Menggabungkan hasil dari kedua query
        $dataSurat = $suratKeluar->union($suratMasuk)->get();

        return view('head.head_agenda', compact('dataSurat'));
    }

    public function headinbox()
    {
        $arsipmasuk = ArsipMasuk::all();

        \Carbon\Carbon::setLocale('id');

        return view('head/head_inbox', compact('arsipmasuk'));
    }

    public function headdetailinbox($id) {
        $arsipmasuk = ArsipMasuk::FindOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('head.head_detail', compact ('arsipmasuk'));
    }

    public function headoutbox()
    {
        $arsipkeluar = ArsipKeluar::all();

        \Carbon\Carbon::setLocale('id');

        return view('head/head_outbox', compact('arsipkeluar'));
    }

    public function headdetailoutbox($id) {
        $arsipkeluar =ArsipKeluar::FindOrFail($id);
        \Carbon\Carbon::setLocale('id');
        return view('head.head_detailoutbox', compact ('arsipkeluar'));
    }


}
