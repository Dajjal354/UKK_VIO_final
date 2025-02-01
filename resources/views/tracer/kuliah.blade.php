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
        <div class="card-header">Form Data Kuliah</div>
        <div class="card-body">
            <form method="POST" action="{{ route('tracer.kuliah.store', $alumni->id_alumni) }}">
                @csrf
                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Nama Kampus</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('tracer_kuliah_kampus') is-invalid @enderror" 
                               name="tracer_kuliah_kampus" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name="tracer_kuliah_status" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="cuti">Cuti</option>
                            <option value="lulus">Lulus</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Pilih</label>
                    <div class="col-md-6">
                        <select class="form-control" name="tracer_kuliah_linier" required>
                            <option value="">Pilih Linear</option>
                            <option value="aktif">Linear</option>
                            <option value="cuti">Tidak Linear</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Jenjang</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tracer_kuliah_jenjang" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Jurusan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tracer_kuliah_jurusan" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-form-label text-md-end">Alamat</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tracer_kuliah_alamat" required>
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