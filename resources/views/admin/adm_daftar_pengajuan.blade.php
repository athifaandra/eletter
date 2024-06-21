@extends('layouts.admin')

@section('page-title')
  <h1>Daftar Pengajuan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Pengajuan</a></div>
    <div class="breadcrumb-item">Daftar Pengajuan</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-header-form">
                <a href="#" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Tambah Pengajuan
                </a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tbody><tr>
                  <th>No.</th>
                  <th>Nama Pemohon</th>
                  <th>Jenis Surat</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Athifa Rifda</td>
                  <td>Surat Cuti</td>
                  <td>12 Maret 2024</td>
                  <td><div class="badge badge-success">Completed</div></td>
                  <td><a href="#" class="btn btn-primary">Detail</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Athifa Rifda</td>
                  <td>Surat Cuti</td>
                  <td>12 Maret 2024</td>
                  <td><div class="badge badge-info">Todo</div></td>
                  <td><a href="#" class="btn btn-primary">Detail</a></td>
                </tr>

              </tbody></table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
