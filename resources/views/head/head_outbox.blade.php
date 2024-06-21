@extends('layouts.head')

@section('page-title')
  <h1>Arsip Surat Keluar</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Arsip Surat</a></div>
    <div class="breadcrumb-item">Surat Keluar</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    @foreach($arsipkeluar as $arsipkeluars)
    <div class="card card-primary">
        <div class="list-group">
            <a href="{{ route('head.detailoutbox', $arsipkeluars->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $arsipkeluars->nomor_surat }}</h5>
                    <small>{{ \Carbon\Carbon::parse($arsipkeluars->tanggal_surat)->isoFormat('dddd, D MMMM YYYY') }}</small>
                </div>
                <p class="mb-1">{{ $arsipkeluars->penerima }} | Nomor Agenda: {{ $arsipkeluars->nomor_agenda }}</p>
                <h6>{{ $arsipkeluars->ringkasan }}</h6>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
