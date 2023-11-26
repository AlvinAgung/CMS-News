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
<style>
    .sidebar-item.tags ul li.active a {
    background-color: #008374; /* Warna merah untuk tag yang aktif */
    color: white;
    font-weight: bold; /* Tebalkan teks tag yang aktif */
}
</style>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Detail Berita</h2>
              <p>Detail berita mencakup informasi yang lebih rinci dan komprehensif mengenai suatu peristiwa atau topik berita tertentu.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="{{route('landing')}}">Home</a></li>
            <li>Berita Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="{{asset('storage/picture/news/'.$berita->picture)}}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{$berita->title}}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$berita->user->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="">{{date('d M Y', strtotime($berita->created_at))}}</time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                {!! $berita->content !!}
              </div><!-- End post content -->

              <div class="meta-bottom">

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">{{$berita->category->name}}</a></li>
                </ul>
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              {{-- <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn--> --}}

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                    @foreach ($kategori as $item)
                        <li><a href="#">{{$item->name}} <span>({{$item->news_count}})</span></a></li>                        
                    @endforeach

                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">
                    @foreach ($beritaRecent as $item)

                    <div class="post-item mt-3">
                        <img src="{{asset('storage/picture/news/'.$item->picture)}}" alt="">
                        <div>
                          <h4><a href="news/{{$item->slug}}">{{$item->title}}</a></h4>
                          <time datetime="">{{date('d M Y', strtotime($berita->created_at))}}</time>
                        </div>
                      </div><!-- End recent post item-->
                        
                    @endforeach

                </div>

              </div><!-- End sidebar recent posts-->

              <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                    @foreach ($kategori as $item)
                        <li class=" {{$berita->category->id == $item->id ? 'active' : ''}}"><a href="#">{{$item->name}}</a></li>                        
                    @endforeach

                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->
@endsection

@push('before-js')
@endpush

@push('after-js')
@endpush
