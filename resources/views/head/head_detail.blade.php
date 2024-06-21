@extends('layouts.head')

@section('page-title')
  <h1>Detail Surat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Arsip Surat</a></div>
    <div class="breadcrumb-item active"><a href="#">Surat Masuk</a></div>
    <div class="breadcrumb-item">Detail Surat</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    <div class="card card-primary">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">B-326/13711/UR.630/2024</h5>
                    <small>Senin/ 5 Februari 2024</small>
                </div>
                <p class="mb-1">Dinas Komunikasi & Informatika Padang | Nomor Agenda: 123 | Undangan Rapat</p>
            </a>
        </div>
        <div class="card-header">
            Permohonan permintaan data pada Dinas Komunikasi & Informatika Padang
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Surat Dibuat</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">Senin / 8 Januari 2024</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Surat Keluar</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">Senin / 8 Januari 2024</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">B-326/13711/UR.630/2024</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Agenda</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">432</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kode Klasifikasi</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">Permintaan Data</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Penerima</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-labe">Dinas Komunikasi dan Informatika Padang</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ditambah Pada</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">Senin / 8 Januari 2024</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Dibuat Pada</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">Senin / 8 Januari 2024</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">File</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">
                        <i class="fas fa-file"></i>
                           Permintaan Data PDA Kominfo-326.pdf</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection