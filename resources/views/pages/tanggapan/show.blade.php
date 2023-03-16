@extends('pages.layouts.app')
@section('content')
@php
    $id =Session::get('id');

@endphp
<div class="offset-2 col-md-8">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Detail</h5>
        </div>
        <div class="container-fluid">
                <div class="text-muted mb-2" style="text-align: center"><img
                        src="http://127.0.0.1:8000/image/{{ $show->fhoto }}" width="150px"></div>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Date  : {{ $show->tgl_pengaduan }}
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Nama Pelapor : {{ $show->mas->name }}
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> NIK <a
                            href="#">:
                            &nbsp; {{ $show->mas->nik }}</a>
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Laporan Pengaduan <a
                            href="#">:
                            &nbsp; {{ $show->laporan }}</a>
                    </li>
                    <li class="mb-5"><span data-feather="home" class="feather-sm me-1"></span> Status <a
                            href="#">:

                            @switch($show)
                            @case($show->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @default
                            <span>{{ $show->status }}</span>
                            @endswitch</a>
                    </li>
                </ul>
            </form>

            <form action="{{ route('tanggapan.update', $show->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 mt-2">
                    <label for="tanggapan" class="form-label">Berikan Tanggapan</label>
                    <textarea class="form-control mb-3" name="tanggapan"></textarea>
                </div>
             {{-- <input class="form-control mb-2" type="text" readonly name="petugas_id" value="{{ $di }}"> --}}
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary me-md-">Cancel</a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
