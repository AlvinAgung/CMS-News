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
                                    <h4 class="card-title">Data Berita</h4>
                                    <div class="d-flex align-items-center">
                                        <button type="button" class="btn btn-primary" id="btn-create"><a class="text-white" href="{{route('berita.create')}}">Tambah Berita</a></button>
                                    </div>
                                </div>
                                <div class="card-body" style="overflow-x:auto;">
                                    <table class="dt-responsive table text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Picture</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($berita as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->picture }}</td>
                                                @if ($item->status == 'PUBLISHED')
                                                    <td><span class="badge badge-success">Published</span></td>
                                                @else
                                                    <td><span class="badge badge-primary">Draft</span></td>
                                                @endif

                                                <td>
                                                    <a href="{{route('berita.show', $item->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                    <button class="btn btn-danger" onclick="confirmDelete()"><i class="fa fa-trash"></i></button>
                                                    <form id="deleteForm" action="{{route('berita.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    {{-- <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script> --}}
    <script>
        function confirmDelete() {
            var result = window.confirm("Apakah kamu yakin ingin menghapus?");
            if (result) {
                document.getElementById('deleteForm').submit();
            } else {
            }
        }
    </script>
        <script>
            $('.dt-responsive').DataTable({
    
            });
        </script>
@endpush
