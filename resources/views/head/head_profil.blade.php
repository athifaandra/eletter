@extends('layouts.head')

@section('page-title')
    <h1>Profil</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Profil</div>
    </div>
@endsection

@section('content')
<<<<<<< HEAD
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
=======

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
                        window.location.href = "{{ route('headoffice.dashboard') }}";
                    }
                });
            });
        </script>
>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3
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
<<<<<<< HEAD
            <form method="POST" action="#">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="{{ Auth::user()->nip }}" required>
                </div>
                <div class="form-group">
                    <label for="position">Jabatan</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ Auth::user()->position }}" required>
=======
            <form method="POST" action="{{ route('head.profileupdate', $user->id) }}" enctype="multipart/form-data">
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
                    <label for="position">Jabatan</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ $user->jabatan }}" readonly>
>>>>>>> faf83a3e2b3b386a617f4f310c26abfc214770c3
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
        <div class="tab-pane" id="password">
            <!-- Konten untuk Password -->
            <h3>Ganti Password</h3>
            <form method="POST" action="{{ route('head.updatePassword') }}">
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
