@extends('layouts.admin')

@section('page-title')
  <h1>Agenda</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item">Agenda</div>
  </div>
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <div class="form-group" style="margin-right: 150px;">
                <label>Dari Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group" style="margin-right: 150px;">
                <label>Sampai Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group" style="margin-right: 275px;">
                <label>Jenis Surat</label>
                <select class="form-control">
                  <option>Surat Masuk</option>
                  <option>Surat Keluar</option>
                  <option>Option 3</option>
                </select>
            </div>
          <div class="card-header-action">
            <a href="#" class="btn btn-warning">Saring</a>
            <a href="#" class="btn btn-info">Cetak</a>
          </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Nomor Agenda</th>
                      <th scope="col">Nomor Surat</th>
                      <th scope="col">Instansi</th>
                      <th scope="col">Tanggal Agenda</th>
                      <th scope="col">Jenis Surat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>432</td>
                      <td>2024/DISKOMINFO-KP/032</td>
                      <td>Dinas Komunikasi & Informasi</td>
                      <td>22 Maret 2024</td>
                      <td><div class="badge badge-primary">Permintaan Data</div></td>
                    </tr>
                    <tr>
                        <td>432</td>
                        <td>2024/DISKOMINFO-KP/032</td>
                        <td>Dinas Komunikasi & Informasi</td>
                        <td>22 Maret 2024</td>
                        <td><div class="badge badge-success">Undangan Rapat</div></td>
                    </tr>
                    <tr>
                        <td>432</td>
                        <td>2024/DISKOMINFO-KP/032</td>
                        <td>Dinas Komunikasi & Informasi</td>
                        <td>22 Maret 2024</td>
                        <td><div class="badge badge-danger">Surat Cuti</div></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
