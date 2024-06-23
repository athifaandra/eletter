@extends('layouts.staff')

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
            <form id="filterForm" method="GET" action="{{ route('staff.agenda') }}" style="display: flex; flex-wrap: wrap; align-items: center;">
                <div class="form-group" style="margin-right: 170px;">
                    <label>Dari Tanggal</label>
                    <input type="date" class="form-control" name="dari_tanggal" value="{{ request('dari_tanggal') }}">
                </div>
                <div class="form-group" style="margin-right: 170px;">
                    <label>Sampai Tanggal</label>
                    <input type="date" class="form-control" name="sampai_tanggal" value="{{ request('sampai_tanggal') }}">
                </div>
                <div class="form-group" style="margin-right: 170px;">
                    <label>Jenis Surat</label>
                    <select class="form-control" style="margin-right: 20px;" name="jenis_surat">
                        <option value="">Semua Surat</option>
                        <option value="masuk" {{ request('jenis_surat') == 'masuk' ? 'selected' : '' }}>Surat Masuk</option>
                        <option value="keluar" {{ request('jenis_surat') == 'keluar' ? 'selected' : '' }}>Surat Keluar</option>
                    </select>
                </div>
                <div class="card-header-action" style="display: flex; align-items: center;">
                    <button type="submit" class="btn btn-warning" style="margin-right: 10px;">Saring</button>
                    <a href="#" class="btn btn-info" id="btnCetak">Cetak</a>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="agendaTable">
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
                        <td class="medium-text">{{ $surat->nomor_agenda }}</td>
                        <td class="medium-text">{{ $surat->nomor_surat }}</td>
                        <td class="medium-text">{{ $surat->instansi }}</td>
                        <td class="medium-text">{{ $surat->tanggal_agenda }}</td>
                        <td class="medium-text jenis-surat">
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

<style>
  .medium-text {
      font-size: 0.875rem;
  }
</style>

<!-- Muat jQuery dan jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

@section('scripts')
<script>
    $(document).ready(function() {
        // Aksi saat tombol Saring diklik
        // $('#btnFilter').click(function(e) {
        //     e.preventDefault(); // Mencegah pengiriman form secara default

        //     // Ambil nilai dari input tanggal dan jenis surat
        //     var dariTanggal = $('#dari_tanggal').val();
        //     var sampaiTanggal = $('#sampai_tanggal').val();
        //     var jenisSurat = $('#jenis_surat').val();

        //     // Mengirim permintaan AJAX ke endpoint agenda dengan data yang diperlukan
        //     $.ajax({
        //         url: "{{ route('agenda') }}",
        //         type: "GET",
        //         data: {
        //             dari_tanggal: dariTanggal,
        //             sampai_tanggal: sampaiTanggal,
        //             jenis_surat: jenisSurat
        //         },
        //         success: function(response) {
        //             // Mengganti konten tabel dengan hasil penyaringan yang baru
        //             $('#agendaTable tbody').html(response);
        //         },
        //         error: function(xhr) {
        //             console.log(xhr.responseText);
        //         }
        //     });
        // });

        $('#btnCetak').click(function(e) {
        e.preventDefault(); // Mencegah pengiriman form secara default

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Menggunakan font Times New Roman
        doc.setFont('times');

        // Tambahkan judul
        doc.setFontSize(16);
        doc.text('Agenda BPS Kota Padang', 105, 22, { align: 'center' });

        // Tambahkan garis di bawah judul
        doc.setLineWidth(1);
        doc.line(70, 25, 140, 25);

        doc.autoTable({
            html: '#agendaTable',
            startY: 30,
            theme: 'grid',
            headStyles: {
                fillColor: [169, 169, 169],
                textColor: [0, 0, 0]
            },
            styles: {
                minCellHeight: 10,
                halign: 'center',
                cellPadding: 2,
                lineColor: [0, 0, 0],
                lineWidth: 0.1
            },
            tableLineColor: [0, 0, 0],
            tableLineWidth: 0.1
        });

        // Save the PDF
        doc.save('Agenda_BPS_Kota_Padang.pdf');
    });

    });
</script>
