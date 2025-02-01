@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profil Sekolah</h4>
                </div>
                <div class="card-body">
                    @if($sekolah)
                        <div class="school-info">
                            <h2 class="text-center mb-4">{{ $sekolah->nama_sekolah }}</h2>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">NPSN</div>
                                <div class="col-md-8">{{ $sekolah->npsn }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">NSS</div>
                                <div class="col-md-8">{{ $sekolah->nss }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">Alamat</div>
                                <div class="col-md-8">{{ $sekolah->alamat }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">No. Telepon</div>
                                <div class="col-md-8">{{ $sekolah->no_telp }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">Website</div>
                                <div class="col-md-8">
                                    <a href="{{ $sekolah->website }}" target="_blank">{{ $sekolah->website }}</a>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">Email</div>
                                <div class="col-md-8">{{ $sekolah->email }}</div>
                            </div>
                        </div>
                    @else
                        <p class="text-center">Data profil sekolah belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 