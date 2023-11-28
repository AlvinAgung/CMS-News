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
                            <h2>Video</h2>
                            <p>
                            Video berfungsi sebagai penjelasan atau pengantar yang mendetail tentang isi video, dan dapat membantu menarik perhatian pemirsa potensial.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{route('landing')}}">Home</a></li>
                        <li>Video</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 posts-list">

                    @foreach ($video as $item)

                    <div id="video" class="col-xl-4 col-md-6">
                        <section id="call-to-action" class="call-to-action">
                            <?php $url = $item->video_url; ?>
                            <?php $videoId = str_replace('https://www.youtube.com/watch?v=', '', $url); ?>
                            <div class="container text-center" style=" background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.ytimg.com/vi/{{$videoId}}/maxresdefault.jpg') center center;  padding:50px 60px !important;" data-aos="zoom-out">
                                <a href="{{$item->video_url}}" class="glightbox play-btn"></a>
                                <h3>{{$item->title}}</h3>
                                <p> Klik Logo Play Button Untuk Memutar Video.</p>
                                {{-- <a class="cta-btn" href="#">Call To Action</a> --}}
                            </div>
                        </section><!-- End Call To Action Section -->
                    </div>
                        
                    @endforeach

                    {{ $video->links('includes.pagination') }}
                {{-- <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div><!-- End blog pagination --> --}}

            </div>
        </section><!-- End Blog Section -->

    </main>
@endsection

@push('before-js')
@endpush

@push('after-js')
@endpush
