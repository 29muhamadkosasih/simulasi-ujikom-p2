@extends('layouts.user.app')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <h2>Pengaduan Details</h2>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="/image/{{ $show->fhoto }}" width="250px" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Pengaduan Information</h3>
                        <ul>
                            <li><strong>Date</strong>: {{ $show->tgl_pengaduan }}</li>
                            <li><strong>Nama Pelapor</strong>: {{ $show->mas->name }}</li>
                            <li><strong>NIK</strong>: {{ $show->mas->nik }}</li>
                            <li><strong>Status</strong>:
                                @switch($show)
                                @case($show->status == '0')
                                <span class="badge bg-secondary">Pending</span>
                                @break

                                @case($show->status == '1')
                                <span class="badge bg-success">Terverikasi</span>
                                @break

                                @case($show->status == '2')
                                <span class="badge bg-success">On Progress</span>
                                @break

                                @case($show->status == '3')
                                <span class="badge bg-success">Selesai</span>
                                @break

                                @default
                                <span>{{ $show->status }}</span>
                                @endswitch
                            </li>
                            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Laporan</h2>
                        <p>
                        {{$show->laporan}}
                        </p>
                    </div>
                </div>

        </div>

    </div>
</section><!-- End Portfolio Details Section -->
@endsection
