<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                    </span>
                    <h2 class="brand-text">Admin Panel</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ Request::routeIs(['dashboard']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i
                        data-feather="activity"></i><span class="menu-title text-truncate"
                        data-i18n="Kanban">Dashboard</span></a>
            </li>
            <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="Invoice">Management</span></a>
                <ul class="menu-content">
                    @if ( \Auth::user()->role_id == '1' )
                        
                        <li class="{{ Request::routeIs(['kategori-berita.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('kategori-berita.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Kategori</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['berita.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('berita.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Berita</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['acara.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('acara.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Acara</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['video.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('video.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Video</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['jabatan.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('jabatan.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Jabatan</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['perangkat-desa.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('perangkat-desa.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Perangkat Desa</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['role.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('role.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="Preview">Role</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['user.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('user.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Preview">User</span></a>
                        </li>
                    @elseif(\Auth::user()->role_id == '2' )
                        <li class="{{ Request::routeIs(['acara.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('acara.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Acara</span></a>
                        </li>
                        <li class="{{ Request::routeIs(['berita.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('berita.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">Berita</span></a>
                        </li>
                    @endif
                   
                </ul>
            </li>

        </ul>
    </div>
</div>
