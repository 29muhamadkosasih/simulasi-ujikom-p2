@php
        $nik =Session::get('nik');
        $name =Session::get('name');
        $username =Session::get('username');
        $telp =Session::get('telp');
        $id =Session::get('id');
@endphp

@extends('layouts.user.app')
@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About Me</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row justify-content-center">
            <div class="offet-2 col-lg-6">
              <div class="member d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="rounded"><img src="https://ui-avatars.com/api/?name={{ $username }}"  alt=""></div>
                <div class="member-info">
                  <h4>{{ Auth::user()->name }}</h4>
                  <span>{{ Auth::user()->username }}</span>
                  <p>NIK : {{ Auth::user()->nik }}</p>
                  <p>No. Telf : {{ Auth::user()->telp }}</p>
                </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Team Section -->


      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Form Pengaduan</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="offset-2 col-lg-8 mt-12 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data" role="form" class="php-email-form" >
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Date</label>
                                <input type="date" name="tgl_pengaduan" class="form-control" id="tgl_pengaduan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" name="fhoto" id="fhoto" required>
                            </div>
                        <div class="form-group">
                            <label for="name">Laporan</label>
                            <textarea class="form-control" name="laporan" rows="10" required></textarea>
                        </div>
                        <input type="hidden" name="nik_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="status" value="0">
                        <div class="text-center"><button type="submit">Laporkan</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
