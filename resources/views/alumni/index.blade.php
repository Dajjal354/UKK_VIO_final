@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Alumni</h1>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
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
                                {{ $data->konsentrasiKeahlian->nama_konsentrasi_keahlian }}
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