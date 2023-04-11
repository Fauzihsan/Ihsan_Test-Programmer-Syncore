@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Biodata</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>NAMA LENGKAP</th>
                            <th>TEMPAT LAHIR</th>
                            <th>TANGGAL LAHIR</th>
                            <th>POSISI DILAMAR</th>
                            <th><i class="fas fa-gear"></i></th>
                        </tr>
                        @php $no = 1; @endphp

                        @if (count($data) > 0)
                            @foreach ($data as $d)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                <td>{{ $d->tempat_lahir }}</td>
                                <td>{{ $d->tanggal_lahir }}</td>
                                <td>{{ $d->posisi_dilamar }}</td>
                                <td>
                                        <a href="{{ route('admin.biodata.destroy', ['id'=> $d->id]) }}" class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="4">Biodata kosong</td>
                            </tr>
                        @endif
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
