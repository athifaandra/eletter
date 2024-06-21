@extends('layouts.staff')

@section('page-title')
    <h1>Profil</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Profil</div>
    </div>
@endsection

@section('content')
    <!-- Tambahkan skrip untuk menampilkan popup jika ada pesan sukses -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('staff.dashboard') }}";
                    }
                });
            });
        </script>
    @endif

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#profile" data-toggle="tab">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#password" data-toggle="tab">Password</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="profile">
            <!-- Konten untuk Profil -->
            <h3>Informasi Profil</h3>
            <form method="POST" action="{{ route('staff.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="{{ $user->nip }}" required>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan" required>
                        <option value="Kasubag Umum" {{ $user->jabatan == 'Kasubag Umum' ? 'selected' : '' }}>Kasubag Umum</option>
                        <option value="Statistisi Mahir" {{ $user->jabatan == 'Statistisi Mahir' ? 'selected' : '' }}>Statistisi Mahir</option>
                        <option value="Statistisi Terampil" {{ $user->jabatan == 'Statistisi Terampil' ? 'selected' : '' }}>Statistisi Terampil</option>
                        <option value="Statistisi Pertama" {{ $user->jabatan == 'Statistisi Pertama' ? 'selected' : '' }}>Statistisi Ahli Pertama</option>
                        <option value="Statistisi Madya" {{ $user->jabatan == 'Statistisi Madya' ? 'selected' : '' }}>Statistisi Ahli Madya</option>
                        <option value="Statistisi Muda" {{ $user->jabatan == 'Statistisi Muda' ? 'selected' : '' }}>Statistisi Ahli Muda</option>
                        <option value="Pranata Komputer Pertama" {{ $user->jabatan == 'Pranata Komputer Pertama' ? 'selected' : '' }}>Pranata Komputer Ahli Pertama</option>
                        <option value="Pranata Komputer Muda" {{ $user->jabatan == 'Pranata Komputer Muda' ? 'selected' : '' }}>Pranata Komputer Ahli Muda</option>
                        <option value="Penugasan Pranata APBN" {{ $user->jabatan == 'Penugasan Pranata APBN' ? 'selected' : '' }}>Penugasan Pranata Keuangan APBN Terampil</option>
                        <option value="Analis Pengelola APBN" {{ $user->jabatan == 'Analis Pengelola APBN' ? 'selected' : '' }}>Analis Pengelola Keuangan APBN Ahli Muda</option>
                        <option value="Pelaksana" {{ $user->jabatan == 'Pelaksana' ? 'selected' : '' }}>Pelaksana</option>
                        <option value="Pustakawan Terampil" {{ $user->jabatan == 'Pustakawan Terampil' ? 'selected' : '' }}>Pustakawan Terampil</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
        <div class="tab-pane" id="password">
            <!-- Konten untuk Password -->
            <form method="POST" action="{{ route('staff.updatePassword') }}">
            @csrf
                <div class="form-group">
                    <label for="current_password">Password Saat Ini</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Ganti Password</button>
            </form>
        </div>
    </div>
@endsection
