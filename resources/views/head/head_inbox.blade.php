@extends('layouts.head')

@section('page-title')
  <h1>Arsip Surat Masuk</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Arsip Surat</a></div>
    <div class="breadcrumb-item">Surat Masuk</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    @foreach($arsipmasuk as $arsipmasuks)
    <div class="card card-primary">
        <div class="list-group">
            <a href="{{ route('arsip.detailinbox', $arsipmasuks->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $arsipmasuks->nomor_surat }}</h5>
                    <small>Senin/ 5 Februari 2024</small>
                </div>
                <p class="mb-1">Dinas Komunikasi & Informatika Padang | Nomor Agenda: 123 | Undangan Rapat</p>
                <h6>Undangan menghadiri rapat untuk Bidang IPDS dalam pembahasan publikasi Padang Dalam Angka</h6>
            </a>
        </div>
    </div>
    <div class="card card-primary">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2024/DISKOMINFO-KP/32</h5>
                    <small>Senin/ 5 Februari 2024</small>
                </div>
                <p class="mb-1">Dinas Komunikasi & Informatika Padang | Nomor Agenda: 123 | Undangan Rapat</p>
                <h6>Undangan menghadiri rapat untuk Bidang IPDS dalam pembahasan publikasi Padang Dalam Angka</h6>
            </a>
        </div>
    </div>
    <div class="card card-primary">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2024/DISKOMINFO-KP/32</h5>
                    <small>Senin/ 5 Februari 2024</small>
                </div>
                <p class="mb-1">Dinas Komunikasi & Informatika Padang | Nomor Agenda: 123 | Undangan Rapat</p>
                <h6>Undangan menghadiri rapat untuk Bidang IPDS dalam pembahasan publikasi Padang Dalam Angka</h6>
            </a>
        </div>
    </div>
</div>
@endsection
