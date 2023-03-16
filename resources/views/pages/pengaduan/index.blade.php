@extends('pages.layouts.app')
@section('content')

<div class="row">
    {{-- <div class="col-md-4">
        <div class="card flex-fill w-100">
            <div class="card-header">

                @if (isset($edit))
                <h5 class="card-title mb-0">Edit Data</h5>
                @else
                <h5 class="card-title mb-0">Create Data</h5>
                @endif

            </div>
            <div class="container-fluid">

                @if (isset($edit))
                @include('pages.pengaduan.edit')
                @else
                @include('pages.pengaduan.create')
                @endif

            </div>
        </div>
    </div> --}}
    <div class="offset-2 col-md-8">
        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th class="d-none d-xl-table-cell">NIK</th>
                        <th class="d-none d-xl-table-cell">Laporan</th>
                        <th>Image</th>
                        <th>Status</th>
                        {{-- <th class="d-none d-md-table-cell">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td>{{ $item->mas->nik }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td>
                            <img src="/image/{{ $item->fhoto }}" width="80px" alt=""></td>
                        <td>{{ $item->status }}</td>
                        {{-- <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('pengaduan-admin.destroy', $item->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('pengaduan-admin.edit', $item->id) }}">Edit</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('pengaduan-admin.show', $item->id) }}">Detail</a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Hapus
                            </button>
                        </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
