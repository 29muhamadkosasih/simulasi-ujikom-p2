@extends('pages.layouts.app')
@section('content')
<div class="offset-2 col-md-8">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Detail</h5>
        </div>
        <div class="container-fluid">
            <form action="{{ route('pengaduan.show', $show->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <h5 class="card-title mb-2" style="text-align: center">{{ $show->tgl_pengaduan }}</h5>
                <div class="text-muted mb-2" style="text-align: center">{{ $show->mas->nik }}</div>
                <div class="text-muted mb-2" style="text-align: center"><img src="/image/{{ $show->fhoto }}" width="150px"></div>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Laporan Pengaduan <a href="#">:
                            &nbsp; {{ $show->laporan }}</a>
                    </li>
                </ul>
            </form>

        </div>
    </div>
</div>
@endsection

