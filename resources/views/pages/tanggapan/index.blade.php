@extends('pages.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th class="d-none d-xl-table-cell">NIK</th>
                        <th class="d-none d-xl-table-cell">Laporan</th>
                        <th>Image</th>
                        <th>status</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td>{{ $item->nik_id }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td><img src="/image/{{ $item->fhoto }}" width="80px" alt=""></td>
                        <td>
                            @switch($item)
                            @case($item->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @case($item->status == '1')
                            <span class="badge bg-success">Terverikasi</span>
                            @break
                            @case($item->status == '2')
                            <span class="badge bg-success">On Progress</span>
                            @break
                            @case($item->status == '3')
                            <span class="badge bg-danger">Selesai</span>
                            @break

                            @default
                            <span>{{ $item->status }}</span>
                            @endswitch
                        </td>
                        <td>
                            @switch($item)
                            @case($item->status == '0')
                            <a class="btn btn-primary btn-sm" href="{{ route('tanggapan.show', $item->id) }}">Verifikasi</a>
                            @break
                            @default
                            {{-- <span class="badge bg-success">Terverifikasi</span> --}}
                            <a class="btn btn-warning btn-sm" href="{{ route('tanggapan.edit',$item->id) }}">Detail</a>
                            @endswitch
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
