@extends('pages.layouts.app')
@section('content')
<div class="row">
    <div class="offset-2 col-md-8">
        <div class="card flex-fill">

            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Filter Export</h5>
                </div>
                <div class="container-fluid">
                    <form action="{{ route('laporan.getLaporan') }}" method="POST">
                        @csrf
                        <label for="">Start Date</label><br>
                        <input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        <label for="">End Date</label><br>
                        <input type="text" name="to" class="form-control mb-3" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        <button type="submit" class="btn btn-primary mb-3" style="width: 100%">Cari Laporan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="offset-2 col-md-8">


        <div class="card-body">
            @if ($pengaduan ?? '')
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Isi Laporan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $k => $v)
                            <tr>
                                <td>{{ $k += 1 }}</td>
                                <td>{{ $v->tgl_pengaduan }}</td>
                                <td>{{ $v->laporan }}</td>
                                <td>
                                    @if ($v->status == '0')
                                        <a href="" class="badge badge-danger">Pending</a>
                                    @elseif($v->status == 'proses')
                                        <a href="" class="badge badge-warning text-white">Proses</a>
                                    @else
                                        <a href="" class="badge badge-success">Selesai</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    Tidak ada data
                </div>
            @endif
        </div>

        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">

                <div class="d-flex justify-content-end">
                    <a href="{{ route('report.export-pdf') }}" class="btn btn-primary btn-sm m-2" target="_blank">Export
                        PDF</a>

                        <div class="float-right">
                            @if ($pengaduan ?? '')
                                <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to]) }}" class="btn btn-danger">EXPORT PDF</a>
                            @endif
                        </div>

                </div>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th class="d-none d-xl-table-cell">NIK</th>
                        <th class="d-none d-xl-table-cell">Laporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td>{{ $item->mas->nik }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td>
                            @switch($item)
                            @case($item->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @case($item->status == '1')
                            <span class="badge bg-info">Terverikasi</span>
                            @break
                            @case($item->status == '2')
                            <span class="badge bg-warning">On Progress</span>
                            @break
                            @case($item->status == '3')
                            <span class="badge bg-success ">Selesai</span>
                            @break

                            @default
                            <span>{{ $item->status }}</span>
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
