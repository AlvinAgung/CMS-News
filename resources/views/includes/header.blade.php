<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">


            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">
                            
                            @if(\Auth::user()->villageofficer)
                                {{ \Auth::user()->villageofficer->name }}
                            @else
                                Super Admin
                            @endif

                            </span><span class="user-status">{{\Auth::user()->role->name }}</span></div><span class="avatar">
                            @if(\Auth::user()->villageofficer)
                                <img class="round"
                                src="{{ asset('storage/picture/perangkat-desa/'. \Auth::user()->villageofficer->photo ) }}" alt="avatar"
                                height="40" width="40"><span class="avatar-status-online">
                            @else
                                <img class="round"
                                src="{{ asset('storage/asset-profil/user-profil.jpg') }}" alt="avatar"
                                height="40" width="40"><span class="avatar-status-online">
                            @endif 
                           
                            </span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="me-50" data-feather="power"></i>
                            Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
