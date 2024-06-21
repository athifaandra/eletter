@extends('layouts.admin')

@section('page-title')
  <h1>Arsip Surat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Surat Keluar</a></div>
    <div class="breadcrumb-item">Edit Surat Keluar</div>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Surat Keluar</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('arsip.updateoutbox', $arsipkeluar->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Nomor Surat</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="text" name="nomor_surat" class="form-control" value="{{ old('nomor_surat', $arsipkeluar->nomor_surat) }}" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Nama Pengirim</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="text" name="penerima" class="form-control" value="{{ old('penerima', $arsipkeluar->penerima) }}" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Nomor Agenda</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="text" name="nomor_agenda" class="form-control" value="{{ old('nomor_agenda', $arsipkeluar->nomor_agenda) }}" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Tanggal Agenda</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="date" name="tanggal_agenda" class="form-control" value="{{ old('tanggal_agenda', $arsipkeluar->tanggal_agenda) }}" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Tanggal Surat Diterima</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <input type="date" name="tanggal_surat" class="form-control" value="{{ old('tanggal_surat', $arsipkeluar->tanggal_surat) }}" required>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-form-label col-12 col-md-3 col-lg-2">Ringkasan</label>
              <div class="col-sm-12 col-md-8 col-lg-9">
                <textarea name="ringkasan" class="form-control" required>{{ old('ringkasan', $arsipkeluar->ringkasan) }}</textarea>
              </div>
            </div>
            <div class="form-group row">
                <label for="lampiran" class="col-form-label col-12 col-md-3 col-lg-2">Lampiran</label>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <p>Current Attachment:
                        @if ($arsipkeluar->lampiran)
                            <a href="{{ Storage::url($arsipkeluar->lampiran) }}" target="_blank">{{ basename($arsipkeluar->lampiran) }}</a>
                        @else
                            Tidak ada lampiran
                        @endif
                    </p>
                    <input type="file" class="form-control" id="lampiran" name="lampiran">
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
