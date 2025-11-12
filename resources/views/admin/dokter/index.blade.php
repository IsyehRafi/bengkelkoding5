@extends('components.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Dokter</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Dokter</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Dokter</h3>
                            <div class="card-tools">
                                <a href="{{ route('dokter.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Dokter
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-{{ session('type', 'success') }} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session('message') }}
                                </div>
                            @endif
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Dokter</th>
                                        <th>Email</th>
                                        <th>No. KTP</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Poli</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dokters as $index => $dokter)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $dokter->nama }}</td>
                                            <td>{{ $dokter->email }}</td>
                                            <td>{{ $dokter->no_ktp }}</td>
                                            <td>{{ $dokter->no_hp }}</td>
                                            <td>{{ $dokter->alamat }}</td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $dokter->poli->nama_poli ?? 'Belum Dipilih' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus dokter ini?')" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="8">
                                                <em>Belum ada data Dokter</em>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection