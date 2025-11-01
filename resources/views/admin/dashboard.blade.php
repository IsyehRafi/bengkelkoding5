<x-layouts.app title="Dashboard Admin">
    <div class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hospital"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Poli</span>
                            <span class="info-box-number">{{ \App\Models\Poli::count() }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Dokter</span>
                            <span class="info-box-number">{{ \App\Models\User::where('role', 'dokter')->count() }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pasien</span>
                            <span class="info-box-number">{{ \App\Models\User::where('role', 'pasien')->count() }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-pills"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Obat</span>
                            <span class="info-box-number">{{ \App\Models\Obat::count() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Selamat Datang di Dashboard Admin
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Sistem Poliklinik - Panel Administrasi</p>
                                    <p>Anda dapat mengelola data-data berikut melalui menu di sebelah kiri:</p>
                                    <ul>
                                        <li>Manajemen Data Poli</li>
                                        <li>Manajemen Data Dokter</li>
                                        <li>Manajemen Data Pasien</li>
                                        <li>Manajemen Data Obat</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h5 class="m-0">Menu Cepat</h5>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('polis.index') }}" class="btn btn-primary btn-block mb-2">
                                                <i class="fas fa-hospital"></i> Kelola Data Poli
                                            </a>
                                            <a href="{{ route('polis.create') }}" class="btn btn-success btn-block">
                                                <i class="fas fa-plus"></i> Tambah Poli Baru
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
