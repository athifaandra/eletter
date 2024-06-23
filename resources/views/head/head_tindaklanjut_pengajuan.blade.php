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
                    <h5 class="mb-1">{{ $pengajuan->nomor_surat }}</h5>
                    <small>{{ \Carbon\Carbon::parse($pengajuan->tanggal_surat)->isoFormat('dddd, D MMMM YYYY') }}</small>
                </div>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                        <label class="col-form-label">{{ $pengajuan->perihal }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <label class="col-form-label">{{ $pengajuan->user->name }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <label class="col-form-label">{{ $pengajuan->user->nip }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <label class="col-form-label">{{ $pengajuan->user->jabatan }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-9">
                        <label class="col-form-label">{{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->format('d-m-Y') }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-9">
                        <label class="col-form-label">{{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->format('d-m-Y') }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status Surat</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="status" name="status" required>
                            <option value="Diterima" {{ $pengajuan->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ $pengajuan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="Proses" {{ $pengajuan->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
