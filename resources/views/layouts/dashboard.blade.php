<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('pageTitle') | {{ config('app.name') }}</title>

    <!-- Vendors styles-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.9/dist/simplebar.min.css">
    <link rel="stylesheet" href="{{ mix('css/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    @yield('stylesheet')
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <div class="sidebar-brand-full">
            <img src="{{ mix('assets/brand/GMDP_35x35.png') }}"  style="width: 35px">
        </div>
        <div class="nav-title mx-2">GMDP BILLING</div>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link {{ Request::route()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="nav-icon cil cil-speedometer"></i> Dashboard</a></li>
        <li class="nav-title">Data Master</li>
        <li class="nav-item"><a class="nav-link" href="colors.html">
            <i class="nav-icon cil cil-user"></i> Reseller</a></li>
        <li class="nav-item"><a class="nav-link" href="#">
            <i class="nav-icon cil cil-people"></i> Pelanggan </a>
        </li>
        {{-- <li class="nav-divider"></li>
        <li class="nav-title">Administrative Tools</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-female"></use>
            </svg> ADMIN </a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-id-card"></use>
                </svg> Daftar Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-female-plus"></use>
                </svg> Tambah Admin</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
            </svg> SETTINGS </a></li>
        <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top"> --}}
            {{-- <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
            </svg> LOGOUT
          </a></li> --}}
      {{-- </ul> --}}
      {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg></a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Reseller</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pelanggan</a></li>
          {{--   <li class="nav-item"><a class="nav-link" href="#">Admin</a></li>   --}}
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                </svg></a></li>
          </ul>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>@yield('pageTitle')</span></li>
            </ol>
          </nav>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        @yield('content')
      </div>
      <footer class="footer">
        <div><a href="https://gmdp.net.id/">Billing</a> © 2023 Global Media Data Prima.</div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.6/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.9/dist/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    @yield('script')

  </body>
</html>
