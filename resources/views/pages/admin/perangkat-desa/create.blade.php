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
                                    <h4 class="card-title">Tambah Perangkat Desa</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-create" method="POST" action="{{ route('perangkat-desa.store') }}" enctype="multipart/form-data">

                                            @csrf
                                            <div class="mb-1">
                                                <label class="form-label" for="name">NIP</label>
                                                <input type="text" id="nip" class="form-control @error('nip') is-invalid @enderror"
                                                    placeholder="Input NIP" aria-label="nip" aria-describedby="nip" name="nip">
                                                @error('nip')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Input Name" aria-label="name" aria-describedby="name" name="name">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="address">Address</label>
                                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror"
                                                    placeholder="Input Address" aria-label="address" aria-describedby="address" name="address">
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Gender</label>
                                                    <select name="gender" class="form-control select-search" data-fouc>
                                                        <option value="Laki - Laki">Laki - Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Input Email" aria-label="email" aria-describedby="email" name="email">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="telp">Telp</label>
                                                <input type="text" id="telp" class="form-control @error('telp') is-invalid @enderror"
                                                    placeholder="Input Telp" aria-label="telp" aria-describedby="telp" name="telp">
                                                @error('telp')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="jabatan">Jabatan</label>
                                                <select name="jabatan_id" id="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                                                   @foreach ($jabatan as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                   @endforeach
                                                </select>
                                                @error('jabatan_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Photo</label>
                                                <input id="fill" onchange="previewFile()" type="file" class="form-control" name="picture">
                                                <span class="help-block">Format : jpg, jpeg, png. Max file size 20Mb</span>
                                                @error('picture')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                    
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
