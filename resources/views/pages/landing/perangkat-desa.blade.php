@extends('layouts.landing')
@section('title')
    Landing
@endsection
@push('before-css')
@endpush
@push('after-css')
@endpush
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Perangkat Desa</h2>
                            <p>
                                Perangkat desa merupakan sesuatu organisasi yang mengurusi kegiatan desa.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{route('landing')}}">Home</a></li>
                        <li>Perangkat Desa</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div id="perangkat-desa">
                    <section id="team" class="team">
                        <div class="container" data-aos="fade-up">

            
                            <div class="row gy-4">
                                @foreach ($perangkat_desa as $item)
            
                                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member">
                                        <img src="{{ asset('storage/picture/perangkat-desa/'.$item->photo) }}" class="img-fluid"
                                            alt="">
                                        <h4>{{$item->name}}</h4>
                                        <span>{{$item->jabatan->name}}</span>
                                        <div class="social">
                                            <a href=""><i class="bi bi-twitter"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                </div><!-- End Team Member -->
                                    
                                @endforeach
            
                            </div>
            
                        </div>
                    </section>
                </div>

        </section><!-- End Blog Section -->

    </main>
@endsection

@push('before-js')
@endpush

@push('after-js')
@endpush
