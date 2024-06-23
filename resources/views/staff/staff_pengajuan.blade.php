@extends('layouts.staff')

@section('page-title')
    <h1>Pengajuan</h1>
@endsection

@section('content')
<div class="section-body">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header-form">
                    <a href="/stafcreate" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah Pengajuan
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Nomor</th>
                                <th style="width: 30%;">Jenis Pengajuan</th>
                                <th style="width: 30%;">Status Pengajuan</th>
                                <th style="width: 30%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan as $pengajuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengajuan->perihal }}</td>
                                <td>{{ $pengajuan->status }}</td>
                                <td>
                                    <a href="{{ route('cetak', ['id' => $pengajuan->id]) }}" class="btn btn-icon icon-left btn-info">
                                        <i class="fas fa-download"></i> Cetak
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
