@extends('layouts.user.app')
@section('content')

<section id="portfolio" class="portfolio mt-5">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Laporan</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($data as $item)

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="/image/{{ $item->fhoto }}" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Detail </h4>
            <a href="/image/{{ $item->fhoto }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            <a href="{{ route('home.show', $item->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        @endforeach
      </div>

    </div>
  </section>

@endsection
