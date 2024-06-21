@extends('layouts.admin')

@section('page-title')
    <h1>Tambah User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola User</a></div>
        <div class="breadcrumb-item">Tambah User</div>
    </div>
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('user.store')}}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-8 col-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" maxlength="18" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" id="nip" name="nip" tabindex="2" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control selectric" id="jabatan" name="jabatan" required>
                            <option value="Kasubag Umum">Kasubag Umum</option>
                            <option value="Statistisi Mahir">Statistisi Mahir</option>
                            <option value="Statistisi Terampil">Statistisi Terampil</option>
                            <option value="Statistisi Pertama">Statistisi Ahli Pertama</option>
                            <option value="Statistisi Madya">Statistisi Ahli Madya</option>
                            <option value="Statistisi Muda">Statistisi Ahli Muda</option>
                            <option value="Pranata Komputer Pertama">Pranata Komputer Ahli Pertama</option>
                            <option value="Pranata Komputer Muda">Pranata Komputer Ahli Muda</option>
                            <option value="Penugasan Pranata APBN">Penugasan Pranata Keuangan APBN Terampil</option>
                            <option value="Analis Pengelola APBN">Analis Pengelola Keuangan APBN Ahli Muda</option>
                            <option value="Pelaksana">Pelaksana</option>
                            <option value="Pustakawan Terampil">Pustakawan Terampil</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
