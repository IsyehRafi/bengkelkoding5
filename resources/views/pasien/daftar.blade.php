@extends('components.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Poli</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Poli</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('message'))
                        <div class="alert alert-{{ session('type', 'success') }} alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus"></i> Daftar Poli
                            </h3>
                        </div>
                        <form action="{{ route('pasien.daftar.submit') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Terjadi Kesalahan!</strong>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_rm" class="form-label">Nomor Rekam Medis</label>
                                            <input type="text" class="form-control" id="no_rm" name="no_rm"
                                                value="{{ $user->no_rm ?? 'Belum tersedia' }}" 
                                                placeholder="Nomor Rekam Medis" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="selectPoli" class="form-label">Pilih Poli</label>
                                            <select name="id_poli" id="selectPoli" class="form-control">
                                                <option value="">-- Pilih Poli --</option>
                                                @foreach ($polis as $poli)
                                                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectJadwal" class="form-label">Pilih Jadwal Periksa</label>
                                            <select name="id_jadwal" id="selectJadwal" class="form-control">
                                                <option value="">-- Pilih Jadwal --</option>
                                                @foreach ($jadwals as $jadwal)
                                                    <option value="{{ $jadwal->id }}" data-id-poli="{{ $jadwal->dokter->poli->id ?? '' }}">
                                                        {{ $jadwal->dokter->poli->nama_poli ?? '' }} |
                                                        {{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} |
                                                        {{ $jadwal->dokter->nama ?? '--' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="keluhan" class="form-label">Keluhan</label>
                                            <textarea name="keluhan" id="keluhan" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectPoli = document.getElementById('selectPoli');
        const selectJadwal = document.getElementById('selectJadwal');

        selectPoli.addEventListener('change', function() {
            const poliId = this.value;
            Array.from(selectJadwal.options).forEach(option => {
                if (option.value === "") return;
                option.hidden = !(option.dataset.idPoli == poliId && poliId !== '');
            });
            selectJadwal.value = "";
        });

        selectJadwal.addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const poliId = selected.dataset.idPoli;
            if (!selectPoli.value && poliId) {
                selectPoli.value = poliId;
                selectPoli.dispatchEvent(new Event('change'));
            }
        });
    });
</script>
@endpush