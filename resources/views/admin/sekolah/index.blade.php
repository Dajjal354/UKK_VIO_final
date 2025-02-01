@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Profil Sekolah</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-school me-1"></i>
            Form Profil Sekolah
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.sekolah.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">NPSN</label>
                    <input type="text" class="form-control @error('npsn') is-invalid @enderror" 
                           name="npsn" value="{{ old('npsn', $sekolah->npsn ?? '') }}">
                    @error('npsn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">NSS</label>
                    <input type="text" class="form-control @error('nss') is-invalid @enderror" 
                           name="nss" value="{{ old('nss', $sekolah->nss ?? '') }}">
                    @error('nss')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" 
                           name="nama_sekolah" value="{{ old('nama_sekolah', $sekolah->nama_sekolah ?? '') }}">
                    @error('nama_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                              name="alamat">{{ old('alamat', $sekolah->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" 
                           name="no_telp" value="{{ old('no_telp', $sekolah->no_telp ?? '') }}">
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input type="text" class="form-control @error('website') is-invalid @enderror" 
                           name="website" value="{{ old('website', $sekolah->website ?? '') }}">
                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email', $sekolah->email ?? '') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection 