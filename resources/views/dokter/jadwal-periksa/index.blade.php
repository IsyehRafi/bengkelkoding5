@extends('components.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Periksa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Jadwal Periksa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('message'))
                        <div class="alert alert-{{ session('type', 'success') }} alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list"></i> Jadwal Periksa
                            </h3>
                            <a href="{{ route('jadwal-periksa.create') }}" class="btn btn-primary float-end">
                                <i class="fas fa-plus"></i> Tambah Jadwal Periksa
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Hari</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jadwalPeriksas as $jadwalPeriksa)
                                            <tr>
                                                <td>{{ $jadwalPeriksa->id }}</td>
                                                <td>{{ $jadwalPeriksa->hari }}</td>
                                                <td>{{ \Carbon\Carbon::parse($jadwalPeriksa->jam_mulai)->format('H:i') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($jadwalPeriksa->jam_selesai)->format('H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('jadwal-periksa.edit', $jadwalPeriksa->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('jadwal-periksa.destroy', $jadwalPeriksa->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus Data Jadwal Periksa ini ?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="5">Belum ada Jadwal Periksa</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection