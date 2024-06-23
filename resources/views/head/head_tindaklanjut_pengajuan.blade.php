@extends('layouts.head')

@section('page-title')
  <h1>Detail Pengajuan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Arsip Surat</a></div>
    <div class="breadcrumb-item active"><a href="#">Surat Masuk</a></div>
    <div class="breadcrumb-item">Detail Pengajuan</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    <div class="card card-primary">
        <div class="list-group">
            <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2024/DISKOMINFO-KP/32</h5>
                    <small>{{ \Carbon\Carbon::parse('2024-02-05')->isoFormat('dddd, D MMMM YYYY') }}</small>
                </div>
                <p class="mb-1">Athifa Rifda | Nomor Surat: 123 | Surat Pengajuan Cuti</p>
            </a>
        </div>
        <div class="card-header">
            Melalui surat ini, saya bermaksud mengajukan permohonan cuti selama tiga hari dikarenakan ada acara keluarga
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-9">
                    <label class="col-form-label">123</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <label class="col-form-label">Athifa Rifda</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                    <label class="col-form-label">200210010230624</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                    <label class="col-form-label">Staf Pranata Komputer Ahli Muda</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Lampiran</label>
                <div class="col-sm-9">
                    @if(true) {{-- Replace with actual condition for checking if there is an attachment --}}
                        <a href="#" class="col-form-label" target="_blank">
                            <i class="fas fa-file"></i> example_file.pdf {{-- Replace with actual file name --}}
                        </a>
                    @else
                        <label class="col-form-label">Tidak ada lampiran</label>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="status_surat" class="col-sm-3 col-form-label">Status Surat</label>
                <div class="col-sm-4">
                    <select class="form-control" id="status_surat" name="status_surat" required>
                        <option value="">Pilih Status Surat</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                        <option value="processed">Processed</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
