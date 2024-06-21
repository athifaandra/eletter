@extends('layouts.head')

@section('page-title')
  <h1>Tindak Lanjuti Pengajuan</h1>
@endsection

@section('content')
<div class="section-body">
    <div class="card card-primary">
        <div class="list-group">
            <a href="/detailsurat" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2024/DISKOMINFO-KP/32</h5>
                    <small>Senin/ 5 Februari 2024</small>
                </div>
                <p class="mb-1">Dinas Komunikasi & Informatika Padang | Nomor Agenda: 123 | Undangan Rapat</p>
                <h6>Undangan menghadiri rapat untuk Bidang IPDS dalam pembahasan publikasi Padang Dalam Angka</h6>
                <div style="text-align: right; color: green">
                    <h6>Accepted</h6>
                </div>
            </a>
        </div>
    </div>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="form-row align-items-center">
                <div class="form-group col-md-4">
                    <label for="file">Choose File</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="sifat_surat">Sifat Surat</label>
                    <select class="form-control" id="sifat_surat" name="sifat_surat" required>
                        <option value="">Pilih Sifat Surat</option>
                        <option value="priority">Priority</option>
                        <option value="not priority">Not Priority</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status_surat">Status Surat</label>
                    <select class="form-control" id="status_surat" name="status_surat" required>
                        <option value="">Pilih Status Surat</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                        <option value="processed">Processed</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection