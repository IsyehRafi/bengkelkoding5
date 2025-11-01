<x-layouts.app title="Tambah Poli">
    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus"></i> Tambah Poli Baru
                            </h3>
                        </div>
                        <form action="{{ route('polis.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_poli" class="form-label">Nama Poli <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama_poli') is-invalid @enderror"
                                                id="nama_poli" name="nama_poli" value="{{ old('nama_poli') }}"
                                                placeholder="Masukkan nama poli..." required>
                                            @error('nama_poli')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                                            <textarea name="keterangan" id="keterangan" rows="3"
                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                placeholder="Masukkan keterangan poli..." required>{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                                <a href="{{ route('polis.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
