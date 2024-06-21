@extends('layouts.staff')

@section('page-title')
  <h1>Pengajuan Surat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item">Pengajuan Surat</div>
  </div>
@endsection

@section('content')
<div class="section-body">
  <form>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputName">Nama</label>
        <input type="text" class="form-control" id="inputName" placeholder="Nama Pegawai">
      </div>
      <div class="form-group col-md-4">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" placeholder="NIP">
      </div>
      <div class="form-group col-md-4">
        <label for="jabatan">Jabatan</label>
        <select id="jabatan" class="form-control">
            <option value="Kasubag Umum">Kasubag Umum</option>
            <option value="Statistisi Mahir">Statistisi Mahir</option>
            <option value="Statistisi Terampil">Statistisi Terampil</option>
            <option value="Statistisi Pertama">Statistisi Ahli Pertama</option>
            <option value="Statistisi Madya">Statistisi Ahli Madya</option>
            <option value="Statistisi Muda">Statistisi Ahli Muda</option>
            <option value="Pranata Komputer Pertama">Pranata Komputer Ahli Pertama</option>
            <option value="Pranata Komputer Muda">Pranata Komputer Ahli Muda</option>
            <option value="Penugasan Pranata APBN">Penugasan Pranata Keuangan APBN Terampil</option>
            <option value="Analis Pengelola APBN">Analis Pengelola Keuangan APBN Ahli Muda</option>
            <option value="Pelaksana">Pelaksana</option>
            <option value="Pustakawan Terampil">Pustakawan Terampil</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tanggalMulai">Tanggal Mulai</label>
        <input type="date" class="form-control" id="tanggalMulai">
      </div>
      <div class="form-group col-md-6">
        <label for="tanggalSelesai">Tanggal Selesai</label>
        <input type="date" class="form-control" id="tanggalSelesai">
      </div>
    </div>
    <div class="form-group">
      <label for="ringkasan">Ringkasan</label>
      <textarea class="form-control" id="ringkasan" rows="3" placeholder="Ringkasan"></textarea>
    </div>
    <div class="form-group">
      <label for="jenisSurat">Jenis Surat</label>
      <select id="jenisSurat" class="form-control">
            <option selected>Pilih Jenis Surat...</option>
            <option>Surat Permohonan Cuti</option>
            <option>Surat Permohonan Izin</option>
            <option>Surat Perintah Tugas</option>
            <option>Surat Pengajuan Pembelian Barang</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection
