@extends('layouts.admin')

@section('page-title')
  <h1>Arsip Surat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Surat Keluar</a></div>
    <div class="breadcrumb-item">Tambah Surat Keluar</div>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Surat Keluar</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('arsip.storeoutbox')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Nomor Surat</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="text" name="nomor_surat" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Nama Penerima</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="text" name="penerima" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Nomor Agenda</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="text" name="nomor_agenda" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Tanggal Agenda</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="date" name="tanggal_agenda" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Tanggal Surat Dikirim</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="date" name="tanggal_surat" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Ringkasan</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <textarea name="ringkasan" class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Lampiran</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="file" name="lampiran" class="form-control">
              </div>
            </div>
            <div class="form-group row mb-2">
              <div class="col-sm-12 col-md-8 col-lg-9 offset-md-2 offset-lg-2">
                  <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
