@extends('pages.layouts.app')
@section('content')
<div class="offset-2 col-md-8">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Detail</h5>
        </div>
        <div class="container-fluid">
            <form action="{{ route('tanggapan.edit', $edit->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <h5 class="card-title mb-2" style="text-align: center">{{ $edit->tgl_pengaduan }}</h5>
                <div class="text-muted mb-2" style="text-align: center">{{ $edit->mas->nik }}</div> --}}
                <div class="text-muted mb-2" style="text-align: center"><img
                        src="http://127.0.0.1:8000/image/{{ $edit->fhoto }}" width="150px"></div>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Date  : {{ $edit->tgl_pengaduan }}
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Nama Pelapor : {{ $edit->mas->name }}
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> NIK <a
                            href="#">:
                            &nbsp; {{ $edit->mas->nik }}</a>
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Laporan Pengaduan <a
                            href="#">:
                            &nbsp; {{ $edit->laporan }}</a></li>

                    <li class="mb-4"><span data-feather="home" class="feather-sm me-1"></span> Status :
                        @switch($edit)
                        @case($edit->status == '1')
                        <span class="badge bg-success">Terverifikasi</span>
                        @break
                        @endswitch
                    </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
@endsection
