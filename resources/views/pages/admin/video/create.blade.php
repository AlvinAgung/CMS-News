@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@push('before-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
@endpush
@push('after-css')
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Add Video</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-create" method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data">

                                            @csrf
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Title</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="input Title" aria-label="title" aria-describedby="title" name="title">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Video URL</label>
                                                <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Input Video URL">
{{-- 
                                                <input type="file" class="form-control" name="video_url_file" id="video_url_file" hidden>
                                                <span class="help-block" id="format_video_file" hidden>Format : jpg, jpeg, png. Max file size 20Mb</span> --}}
                                            </div>
                                            {{-- <div class="mb-1">
                                                <label class="form-label" for="name">Status</label>
                                            
                                                    <select name="status" class="form-control select-search" data-fouc>
                                                        <option value="VIDEO UTAMA">Video Utama</option>
                                                        <option value="Video">Video</option>
                                                    </select>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Simpan</button>
                                  
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
@endsection
@push('before-js')
@endpush
@push('after-js')
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script>
    </script>
@endpush
