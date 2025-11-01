<x-layouts.app title="Data Poli">
    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Success Alert -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Flash Message Alert -->
            @if (session('message'))
                <div class="alert alert-{{ session('type', 'success') }} alert-dismissible fade show" role="alert">
                    <i class="fas fa-info-circle"></i> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Main Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-hospital"></i> Data Poli
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('polis.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Poli
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Poli</th>
                                    <th>Keterangan</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($polis as $index => $poli)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $poli->nama_poli }}</td>
                                        <td>{{ $poli->keterangan }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('polis.edit', $poli->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('polis.destroy', $poli->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus Poli ini?')" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">
                                            <em>Belum ada data Poli</em>
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

    @push('scripts')
    <script>
        // Auto hide alerts after 5 seconds
        setTimeout(() => {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
    @endpush
</x-layouts.app>
