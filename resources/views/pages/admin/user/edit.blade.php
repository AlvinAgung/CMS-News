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
                                    <h4 class="card-title">Edit User</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-create" method="POST" action="{{ route('user.update', $show->id) }}">          
                                            @csrf
                                            @method('PUT')
                                            @csrf
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="input user name" aria-label="name" aria-describedby="name" name="name" value="{{$show->name}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="input email name" aria-label="email" aria-describedby="email" name="email" value="{{$show->email}}">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="email">Password</label>
                                                <input type="text" id="password" class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="input password name" aria-label="password" aria-describedby="password" name="password">
                                                    <input type="text" id="password" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="input password name" aria-label="password" aria-describedby="password" name="password2" value="{{$show->password}}" hidden>
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="email">Role</label>
                                                <select class="form-control" name="role_id" id="role_id">
                                                    @foreach ($role as $item)
                                                    <option value="{{$item->id}}" {{$show->role_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach 
                                                </select>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="email">Perangkat Desa</label>
                                                <select class="form-control" name="village_officer_id" id="village_officer_id">
                                                    @foreach ($village_officer as $item)
                                                    <option value="{{$item->id}}" {{$show->village_officer_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach 
                                                </select>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.dt-responsive').DataTable();
            $('#btn-create').on('click', function() {
                $("#modal-create").modal('show');
            });
        });
    </script>
@endpush
