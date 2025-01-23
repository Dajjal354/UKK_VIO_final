@extends('layouts.user')

@section('content')
<div class="container">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="card">
        <div class="card-header">Form Data Pekerjaan</div>
        <div class="card-body">
            <form method="POST" action="{{ route('tracer.kerja.store', $alumni->id_alumni) }}">
                @csrf

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Pekerjaan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="tracer_kerja_pekerjaan" required>
                            <option value="">Pilih Pekerjaan</option>
                            <option value="aktif">Swasta</option>
                            <option value="cuti">Negeri</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Nama Perusahaan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tracer_kerja_nama" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name="tracer_kerja_status" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="cuti">Cuti</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Jabatan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tracer_kerja_jabatan" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Gaji</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="tracer_kerja_gaji" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Lokasi</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="tracer_kerja_lokasi" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Alamat Perusahaan</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="tracer_kerja_alamat" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Mulai') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('tracer_kerja_tgl_mulai') is-invalid @enderror" 
                                       name="tracer_kerja_tgl_mulai" value="{{ old('tracer_kerja_tgl_mulai') }}" required>
                                @error('tracer_kerja_tgl_mulai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
            </form>
        </div>
    </div>
</div>
@endsection