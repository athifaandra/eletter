@extends('layouts.admin')

@section('page-title')
    <h1>Kelola User</h1>
@endsection

@section('content')
<div class="section-body">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header-form">
                    <a href="/tambahuser" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah User
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Nomor</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 20%;">NIP</th>
                                <th style="width: 20%;">Jabatan</th>
                                <th style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td> {{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->nip}}</td>
                                <td>{{$user->jabatan}}</td>
                                <td>
                                    <div>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon icon-left btn-danger">
                                                <i class="far fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
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
</div>

@endsection
