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
                    @foreach($dataSurat as $surat)
                    <tr>
                        <td>{{ $surat->nomor_agenda }}</td>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->instansi }}</td>
                        <td>{{ $surat->tanggal_agenda }}</td>
                        <td>
                            <div class="badge badge-{{ Arr::random(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']) }}">
                                {{ $surat->ringkasan }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Pastikan jQuery sudah dimuat sebelum kode ini -->
<script>
    $(document).ready(function() {
        // Aksi saat tombol Saring diklik
        $('#btnFilter').click(function(e) {
            e.preventDefault(); // Mencegah pengiriman form secara default

            // Ambil nilai dari input tanggal dan jenis surat
            var dariTanggal = $('#dari_tanggal').val();
            var sampaiTanggal = $('#sampai_tanggal').val();
            var jenisSurat = $('#jenis_surat').val();

            // Lakukan sesuatu dengan nilai-nilai tersebut, misalnya kirim AJAX request atau ubah URL

            // Contoh output nilai ke konsol
            console.log('Dari Tanggal:', dariTanggal);
            console.log('Sampai Tanggal:', sampaiTanggal);
            console.log('Jenis Surat:', jenisSurat);
        });

        // Aksi saat tombol Cetak diklik
        $('#btnCetak').click(function(e) {
            e.preventDefault(); // Mencegah pengiriman form secara default

            // Lakukan aksi pencetakan, misalnya membuka halaman cetak atau menyiapkan data untuk cetak
        });
    });
</script>

