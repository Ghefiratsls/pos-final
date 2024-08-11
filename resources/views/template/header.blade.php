<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal" href="index.html">
                <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img main-logo"
                    alt="Sparic logo">
                <img src="{{ url('/assets') }}/images/brand/logo-light.png" class="header-brand-img darklogo"
                    alt="Sparic logo">
            </a>
            <!-- LOGO -->
            <div class="main-header-center ms-3 d-none d-lg-block">
            </div>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="dropdown d-lg-none d-flex">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COUNTRY -->
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout mt-1"><i class="ri-moon-clear-line"></i></span>
                                    <span class="light-layout mt-1"><i class="ri-sun-line"></i></span>
                                </a>
                            </div>
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link" id="fullscreen-button">
                                    <i class="ri-fullscreen-exit-line fullscreen-button"></i>
                                </a>
                            </div>
                            <!-- FULL-SCREEN -->
                           
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                    class="nav-link leading-none d-flex">
                                    @if (Auth::user()->foto)
                                        <img src="{{ asset('' . Auth::user()->foto) }}" alt="profile-user"
                                            class="avatar  profile-user brround cover-image">
                                    @else
                                        <img src="{{ url('/assets') }}/images/users/male/profile.png" alt="profile-user"
                                            class="avatar  profile-user brround cover-image">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-popper="none">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fw-semibold">{{ Auth::user()->nama }}</h5>
                                            <span class="text-muted fs-12">{{ Auth::user()->akses_name }}</span>
                                            @if (Auth::user()->akses == 2)
                                                <span class="text-muted fs-12">
                                                    {{ Auth::user()->mitra->namaMitra }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <a class="dropdown-item text-dark fw-semibold border-top" href="profile.html">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item text-dark fw-semibold"
                                        href="{{ route('web.auth.logout') }}">
                                        <i class="dropdown-icon fe fe-log-out"></i> Sign
                                        out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
