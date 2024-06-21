@extends('layouts.admin')

@section('page-title')
  <h1>Arsip Surat Masuk</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Arsip Surat</a></div>
    <div class="breadcrumb-item">Surat Masuk</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    <div class="section-title">
        <a href="{{ route('arsip.tambahinbox') }}" class="btn btn-icon icon-left btn-primary" style="margin-bottom: 20px;">
            <i class="fas fa-plus"></i> Tambah Surat
        </a>
    </div>
    @if($arsipmasuk->isEmpty())
        <p>Tidak ada arsip surat masuk yang tersedia.</p>
    @else
        @foreach($arsipmasuk as $arsipmasuks)
            <div class="card card-primary mb-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <a href="{{ route('arsip.detailinbox', $arsipmasuks->id) }}" class="w-100 text-dark" style="text-decoration: none;">
                                <h5 class="mb-1">{{ $arsipmasuks->nomor_surat }}</h5>
                                <div class="text-muted mb-2">{{ \Carbon\Carbon::parse($arsipmasuks->tanggal_surat)->isoFormat('dddd, D MMMM YYYY') }}</div>
                                <p class="mb-1">{{ $arsipmasuks->pengirim }} | Nomor Agenda: {{ $arsipmasuks->nomor_agenda }}</p>
                                <h6>{{ $arsipmasuks->ringkasan }}</h6>
                            </a>
                            <div class="dropdown" style="align-self: flex-start;">
                                <a class="btn btn-sm btn-icon" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('arsip.editinbox', $arsipmasuks->id) }}">Edit</a>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $arsipmasuks->id }}').submit(); }">Delete</a>
                                    <form id="delete-form-{{ $arsipmasuks->id }}" action="{{ route('arsip.destroyinbox', $arsipmasuks->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
