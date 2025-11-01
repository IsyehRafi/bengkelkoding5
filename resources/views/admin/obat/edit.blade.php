@extends('components.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Obat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('obat.index') }}">Manajemen Obat</a></li>
                        <li class="breadcrumb-item active">Edit Obat</li>
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
                            <h3 class="card-title">Form Edit Obat</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                           id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                                    @error('nama_obat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kemasan">Kemasan</label>
                                    <input type="text" class="form-control @error('kemasan') is-invalid @enderror"
                                           id="kemasan" name="kemasan" value="{{ old('kemasan', $obat->kemasan) }}" required>
                                    @error('kemasan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                           id="harga" name="harga" value="{{ old('harga', $obat->harga) }}" min="0" step="0.01" required>
                                    @error('harga')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
