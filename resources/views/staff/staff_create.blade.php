@extends('layouts.staff')

@section('page-title')
  <h1>Pengajuan Surat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item">Pengajuan Surat</div>
  </div>
@endsection

@section('content')
<div class="section-body">
  <form method="POST" action="{{ route('pengajuan.store') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputName">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
      </div>
      <div class="form-group col-md-4">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" value="{{ $user->nip }}" required>
      </div>
      <div class="form-group col-md-4">
        <label for="jabatan">Jabatan</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tanggalMulai">Tanggal Mulai</label>
        <input type="date" class="form-control" id="tanggalMulai" name="tanggal_mulai" required>
      </div>
      <div class="form-group col-md-6">
        <label for="tanggalSelesai">Tanggal Selesai</label>
        <input type="date" class="form-control" id="tanggalSelesai" name="tanggal_selesai" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="ringkasan">Ringkasan</label>
        <textarea class="form-control" id="ringkasan" name="ringkasan" rows="3" placeholder="Ringkasan" required></textarea>
      </div>
      <div class="form-group col-md-6">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="jenisSurat">Jenis Surat</label>
      <select id="jenisSurat" name="jenis_surat" class="form-control" required>
        <option selected disabled>Pilih Jenis Surat...</option>
        <option value="Permohonan Cuti">Permohonan Cuti</option>
        <option value="Permohonan Tugas">Permohonan Tugas</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection
