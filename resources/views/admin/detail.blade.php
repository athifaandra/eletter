@extends('layouts.admin')

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
            <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$arsipmasuk->nomor_surat}}</h5>
                    <small>{{ \Carbon\Carbon::parse($arsipmasuk->tanggal_surat)->isoFormat('dddd, D MMMM YYYY') }}</small>
                </div>
                <p class="mb-1">{{ $arsipmasuk->pengirim }} | Nomor Agenda: {{ $arsipmasuk->nomor_agenda }}</p>
            </a>
        </div>
        <div class="card-header">
            {{ $arsipmasuk->ringkasan }}
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Surat Masuk</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">{{ \Carbon\Carbon::parse($arsipmasuk->tanggal_surat)->translatedFormat('l, d F Y') }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Agenda</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">{{ \Carbon\Carbon::parse($arsipmasuk->tanggal_agenda)->translatedFormat('l, d F Y') }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Agenda</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">{{ $arsipmasuk->nomor_agenda }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Pengirim</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-labe">{{ $arsipmasuk->pengirim }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ditambah Pada</label>
                <div class="col-sm-9">
                    <label class="col-sm-9 col-form-label">{{ \Carbon\Carbon::parse($arsipmasuk->created_at)->isoFormat('dddd, D MMMM YYYY') }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Lampiran</label>
                <div class="col-sm-9">
                    @if($arsipmasuk->lampiran)
                        <a href="{{ Storage::url($arsipmasuk->lampiran) }}" class="col-sm-9 col-form-label" target="_blank">
                            <i class="fas fa-file"></i> {{ basename($arsipmasuk->lampiran) }}
                        </a>
                    @else
                        <label class="col-sm-9 col-form-label">Tidak ada lampiran</label>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
