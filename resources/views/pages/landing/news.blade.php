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
                            <h2>Berita</h2>
                            <p>
                                Berita adalah cermin dinamika dunia, menghadirkan informasi aktual yang mencakup peristiwa, fakta, dan opini terkini..</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{route('landing')}}">Home</a></li>
                        <li>Berita</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 posts-list">

                    @foreach ($berita as $item)

                    
                    <div class="col-xl-4 col-md-6">
                        <article>

                            <div class="post-img">
                                <img src="{{ asset('storage/picture/news/'.$item->picture) }}" alt=""
                                    class="img-fluid">
                            </div>

                            <p class="post-category">{{$item->Category->name}}</p>

                            <h2 class="title">
                                <a href="news/{{$item->slug}}">{{$item->title}}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/asset-profil/user-profil.jpg') }}" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author-list">{{$item->user->name}}</p>
                                    <p class="post-date">
                                        <time datetime="">{{date('d M Y', strtotime($item->created_at))}}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->
                        
                    @endforeach


                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div><!-- End blog pagination -->

            </div>
        </section><!-- End Blog Section -->

    </main>
@endsection

@push('before-js')
@endpush

@push('after-js')
@endpush
