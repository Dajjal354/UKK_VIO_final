@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Alumni</h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user me-1"></i>
                    Data Pribadi
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nama:</strong> {{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</p>
                            <p><strong>NISN:</strong> {{ $alumni->nisn }}</p>
                            <p><strong>NIK:</strong> {{ $alumni->nik }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin }}</p>
                            <p><strong>Tempat, Tanggal Lahir:</strong> {{ $alumni->tempat_lahir }}, {{ $alumni->tgl_lahir }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Alamat:</strong> {{ $alumni->alamat }}</p>
                            <p><strong>No. HP:</strong> {{ $alumni->no_hp }}</p>
                            <p><strong>Email:</strong> {{ $alumni->email }}</p>
                            <p><strong>Tahun Lulus:</strong> {{ $alumni->tahunLulus->tahun_lulus }}</p>
                            <p><strong>Jurusan:</strong> {{ $alumni->konsentrasiKeahlian->konsentrasi_keahlian }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($alumni->tracerKuliah)
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-university me-1"></i>
                    Data Kuliah
                </div>
                <div class="card-body">
                    <p><strong>Kampus:</strong> {{ $alumni->tracerKuliah->tracer_kuliah_kampus }}</p>
                    <p><strong>Jenjang:</strong> {{ $alumni->tracerKuliah->tracer_kuliah_jenjang }}</p>
                    <p><strong>Jurusan:</strong> {{ $alumni->tracerKuliah->tracer_kuliah_jurusan }}</p>
                    <p><strong>Status:</strong> {{ $alumni->tracerKuliah->tracer_kuliah_status }}</p>
                    <p><strong>Linearitas:</strong> {{ $alumni->tracerKuliah->tracer_kuliah_linier }}</p>
                    <p><strong>Alamat Kampus:</strong> {{ $alumni->tracerKuliah->tracer_kuliah_alamat }}</p>
                </div>
            </div>
            @endif

            @if($alumni->tracerKerja)
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-briefcase me-1"></i>
                    Data Pekerjaan
                </div>
                <div class="card-body">
                    <p><strong>Nama Perusahaan:</strong> {{ $alumni->tracerKerja->tracer_kerja_nama }}</p>
                    <p><strong>Jabatan:</strong> {{ $alumni->tracerKerja->tracer_kerja_jabatan }}</p>
                    <p><strong>Status:</strong> {{ $alumni->tracerKerja->tracer_kerja_status }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $alumni->tracerKerja->tracer_kerja_tgl_mulai }}</p>
                    <p><strong>Gaji:</strong> Rp{{ number_format($alumni->tracerKerja->tracer_kerja_gaji, 0, ',', '.') }}</p>
                    <p><strong>Lokasi:</strong> {{ $alumni->tracerKerja->tracer_kerja_lokasi }}</p>
                    <p><strong>Alamat:</strong> {{ $alumni->tracerKerja->tracer_kerja_alamat }}</p>
                </div>
            </div>
            @endif

            @if($alumni->testimoni)
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-comment me-1"></i>
                    Testimonial
                </div>
                <div class="card-body">
                    <p><strong>Tanggal:</strong> {{ $alumni->testimoni->tgl_testimoni }}</p>
                    <p><strong>Testimoni:</strong></p>
                    <p>{{ $alumni->testimoni->testimoni }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 