@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Welcome</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ Auth::user()->name }}</li>
    </ol>
    
    <!-- Cards Section -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('alumni.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Profile Sekolah</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.sekolah.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Jumlah Alumni
                </div>
                <div class="card-body"><canvas id="userActivityChart" width="600" height="200"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Status Alumni
                </div>
                <div class="card-body">
                    <canvas id="alumniStatusChart" 
                            data-working="{{ $workingAlumni }}"
                            data-studying="{{ $studyingAlumni }}"
                            width="100%" 
                            height="106%">
                    </canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="me-2">
                        <i class="fas fa-circle text-primary"></i> Bekerja
                    </span>
                    <span class="me-2">
                        <i class="fas fa-circle text-success"></i> Kuliah
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Alumni Table -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Alumni Terbaru
            <div class="float-end">
                <a href="{{ route('alumni.index') }}" class="btn btn-primary btn-sm">
                    Lihat Semua Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tahun Lulus</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumni as $data)
                    <tr>
                        <td>{{ $data->nisn }}</td>
                        <td>{{ $data->nama_depan }} {{ $data->nama_belakang }}</td>
                        <td>{{ $data->tahunLulus->tahun_lulus }}</td>
                        <td>
                            @if($data->konsentrasiKeahlian)
                                {{ $data->konsentrasiKeahlian->konsentrasi_keahlian }}
                            @else
                                <span class="text-muted">Data tidak tersedia</span>
                            @endif
                        </td>
                        <td>{{ $data->statusAlumni->status_alumni }}</td>
                        <td>
                            <a href="{{ route('alumni.show', $data) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection