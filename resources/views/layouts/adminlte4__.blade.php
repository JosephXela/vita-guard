<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title') | Portal</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{ asset('portal/favicon.ico') }}">

  <!-- FontAwesome JS -->
  <script defer src="{{ asset('portal/assets/plugins/fontawesome/js/all.min.js') }}"></script>

  <!-- App CSS -->
  <link id="theme-style" rel="stylesheet" href="{{ asset('portal/assets/css/portal.css') }}">

  <!-- Per-page styles -->
  @stack('styles')
</head>

<body class="app">

  <!--===================== HEADER =====================-->
  <header class="app-header fixed-top">
    <div class="app-header-inner">
      <div class="container-fluid py-2">
        <div class="app-header-content">
          <div class="row justify-content-between align-items-center">

            <!-- Sidebar toggler (mobile) -->
            <div class="col-auto">
              <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                  <title>Menu</title>
                  <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"
                    d="M4 7h22M4 15h22M4 23h22"></path>
                </svg>
              </a>
            </div>

            <!-- Search (mobile trigger) -->
            <div class="search-mobile-trigger d-sm-none col">
              <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
            </div>

            <!-- Search box -->
            <div class="app-search-box col">
              <form class="app-search-form">
                <input type="text" placeholder="Search..." name="search"
                  class="form-control search-input">
                <button type="submit" class="btn search-btn btn-primary" value="Search">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </div>

            <!-- Utilities: notifications, settings, user -->
            <div class="app-utilities col-auto">

              <!-- Notifications -->
              <div class="app-utility-item app-notifications-dropdown dropdown">
                <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
                  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
                  title="Notifications">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                    <path fill-rule="evenodd"
                      d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                  </svg>
                  <span class="icon-badge">3</span>
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                  <div class="dropdown-menu-header p-3">
                    <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                  </div>
                  <div class="dropdown-menu-content">
                    <div class="item p-3">
                      <div class="row gx-2 justify-content-between align-items-center">
                        <div class="col-auto">
                          <img class="profile-image"
                            src="{{ asset('portal/assets/images/profiles/profile-1.png') }}"
                            alt="">
                        </div>
                        <div class="col">
                          <div class="info">
                            <div class="desc">Amy shared a file with you.</div>
                            <div class="meta">2 hrs ago</div>
                          </div>
                        </div>
                      </div>
                      <a class="link-mask" href="{{ route('notifications.index') }}"></a>
                    </div>

                    <div class="item p-3">
                      <div class="row gx-2 justify-content-between align-items-center">
                        <div class="col-auto">
                          <div class="app-icon-holder">
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                              class="bi bi-receipt" fill="currentColor"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27z" />
                            </svg>
                          </div>
                        </div>
                        <div class="col">
                          <div class="info">
                            <div class="desc">You have a new invoice.</div>
                            <div class="meta">1 day ago</div>
                          </div>
                        </div>
                      </div>
                      <a class="link-mask" href="{{ route('notifications.index') }}"></a>
                    </div>

                    <div class="item p-3">
                      <div class="row gx-2 justify-content-between align-items-center">
                        <div class="col-auto">
                          <img class="profile-image"
                            src="{{ asset('portal/assets/images/profiles/profile-2.png') }}"
                            alt="">
                        </div>
                        <div class="col">
                          <div class="info">
                            <div class="desc">James sent you a new message.</div>
                            <div class="meta">7 days ago</div>
                          </div>
                        </div>
                      </div>
                      <a class="link-mask" href="{{ route('notifications.index') }}"></a>
                    </div>
                  </div>

                  <div class="dropdown-menu-footer p-2 text-center">
                    <a href="{{ route('notifications.index') }}">View all</a>
                  </div>
                </div>
              </div>

              <!-- Settings -->
              <div class="app-utility-item">
                <a href="{{ route('settings.index') }}" title="Settings">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319z" />
                    <path fill-rule="evenodd"
                      d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                  </svg>
                </a>
              </div>

              <!-- User dropdown -->
              <div class="app-utility-item app-user-dropdown dropdown">
                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                  href="#" role="button" aria-expanded="false">
                  <img src="{{ asset('portal/assets/images/user.png') }}" alt="User Profile">
                </a>
                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                  <li><a class="dropdown-item" href="{{ route('account.index') }}">Account</a></li>
                  <li><a class="dropdown-item" href="{{ route('settings.index') }}">Settings</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">Log Out</button>
                    </form>
                  </li>
                </ul>
              </div>

            </div>{{-- /.app-utilities --}}
          </div>{{-- /.row --}}
        </div>{{-- /.app-header-content --}}
      </div>{{-- /.container-fluid --}}
    </div>{{-- /.app-header-inner --}}

    <!--===================== SIDEPANEL =====================-->
    <div id="app-sidepanel" class="app-sidepanel">
      <div id="sidepanel-drop" class="sidepanel-drop"></div>
      <div class="sidepanel-inner d-flex flex-column">

        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>

        <!-- Brand / Logo -->
        <div class="app-branding">
          <a class="app-logo" href="{{ route('dashboard') }}">
            <img class="logo-icon me-2"
              src="{{ asset('portal/assets/images/app-logo.svg') }}" alt="Logo">
            <span class="logo-text">PORTAL</span>
          </a>
        </div>

        <!-- Sidebar Menu -->
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
          <ul class="app-menu list-unstyled accordion" id="menu-accordion">

            <li class="nav-item">
              <a class="nav-link @yield('overview-active')" href="{{ route('dashboard') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6z" />
                  </svg>
                </span>
                <span class="nav-link-text">Overview</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('bookings-active')" href="{{ route('bookings.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                      d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                  </svg>
                </span>
                <span class="nav-link-text">Bookings</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('consultations-active')" href="{{ route('consultations.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    <path fill-rule="evenodd"
                      d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125z" />
                  </svg>
                </span>
                <span class="nav-link-text">Consultations</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('articles-active')" href="{{ route('articles.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-newspaper"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zm12 10.972V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H11.5a.5.5 0 0 0 .5-.5v-.028z" />
                    <path
                      d="M2 3h8v1H2V3zm0 2.5h8v1H2v-1zm0 2.5h8v1H2V8zm0 2.5h8v1H2v-1zM2 13h8v1H2v-1zm0-9.5h2v1H2v-1z" />
                  </svg>
                </span>
                <span class="nav-link-text">Articles</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('doctors-active')" href="{{ route('doctors.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-pulse"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    <path fill-rule="evenodd"
                      d="M0 8.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .4.2L4 9.667l1.6-5.333a.5.5 0 0 1 .894-.106L8 7.1l1.1-1.833a.5.5 0 0 1 .8-.067L11 6.5h4.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.4-.2l-.9-1.2-1.1 1.833a.5.5 0 0 1-.83.048L5.5 5.4l-1.6 5.333a.5.5 0 0 1-.894.106L1.5 9H.5a.5.5 0 0 1-.5-.5z" />
                  </svg>
                </span>
                <span class="nav-link-text">Doctors</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('doctorSchedules-active')"
                href="{{ route('doctorSchedules.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar3"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                    <path fill-rule="evenodd"
                      d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                  </svg>
                </span>
                <span class="nav-link-text">Doctor Schedules</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('riwayats-active')" href="{{ route('riwayats.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                    <path
                      d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                  </svg>
                </span>
                <span class="nav-link-text">Historys</span>
              </a>
            </li>

            <!-- Contoh menu dengan submenu (collapse) -->
            <li class="nav-item has-submenu">
              <a class="nav-link submenu-toggle @yield('pages-active')" href="#"
                data-bs-toggle="collapse" data-bs-target="#submenu-pages" aria-expanded="false"
                aria-controls="submenu-pages">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                    <path
                      d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                  </svg>
                </span>
                <span class="nav-link-text">Pages</span>
                <span class="submenu-arrow">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                  </svg>
                </span>
              </a>
              <div id="submenu-pages" class="collapse submenu @yield('pages-submenu-open')"
                data-bs-parent="#menu-accordion">
                <ul class="submenu-list list-unstyled">
                  <li class="submenu-item">
                    <a class="submenu-link @yield('notifications-active')"
                      href="{{ route('notifications.index') }}">Notifications</a>
                  </li>
                  <li class="submenu-item">
                    <a class="submenu-link @yield('account-active')"
                      href="{{ route('account.index') }}">Account</a>
                  </li>
                  <li class="submenu-item">
                    <a class="submenu-link @yield('settings-active')"
                      href="{{ route('settings.index') }}">Settings</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('charts-active')" href="{{ route('charts.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z" />
                  </svg>
                </span>
                <span class="nav-link-text">Charts</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @yield('help-active')" href="{{ route('help.index') }}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                      d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                  </svg>
                </span>
                <span class="nav-link-text">Help</span>
              </a>
            </li>

          </ul>{{-- /.app-menu --}}
        </nav>{{-- /#app-nav-main --}}

        <!-- Footer sidebar -->
        <div class="app-sidepanel-footer">
          <nav class="app-nav app-nav-footer">
            <ul class="app-menu footer-menu list-unstyled">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.index') }}">
                  <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear"
                      fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319z" />
                      <path fill-rule="evenodd"
                        d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                    </svg>
                  </span>
                  <span class="nav-link-text">Settings</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>{{-- /.app-sidepanel-footer --}}

      </div>{{-- /.sidepanel-inner --}}
    </div>{{-- /#app-sidepanel --}}

  </header>{{-- /.app-header --}}

  <!--===================== MAIN CONTENT =====================-->
  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">

        @yield('content')

      </div>{{-- /.container-xl --}}
    </div>{{-- /.app-content --}}

    <!--===================== FOOTER =====================-->
    <footer class="app-footer">
      <div class="container text-center py-3">
        <small class="copyright">
          Copyright &copy; {{ date('Y') }}
          <a class="app-link" href="#">{{ config('app.name') }}</a>.
          All rights reserved.
        </small>
      </div>
    </footer>

  </div>{{-- /.app-wrapper --}}

  <!--===================== MODAL SLOT =====================-->
  @stack('modal')

  <!--===================== SCRIPTS =====================-->
  <script src="{{ asset('portal/assets/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('portal/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('portal/assets/js/app.js') }}"></script>

  <!-- Per-page scripts -->
  @stack('script')

</body>

</html>