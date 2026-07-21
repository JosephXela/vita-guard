<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Vita Guard - Member health portal for doctor consultations, bookings, and health articles." />

    <title>@yield('title', 'Vita Guard') | Member Health Portal</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('libra/favicon.ico') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @stack('styles')

    <style>
        :root {
            --vg-primary: #0f6e5e;
            --vg-primary-dark: #0a4f43;
            --vg-accent: #cbd113;
            --vg-ink: #16232b;
            --vg-muted: #6b7c85;
            --vg-bg: #f6f9f8;
            --vg-border: #e3ebe9;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background-color: var(--vg-bg);
            color: var(--vg-ink);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .brand-font {
            font-family: 'Poppins', sans-serif;
        }

        main {
            flex: 1 0 auto;
        }

        a {
            text-decoration: none;
        }

        /* ===== Topbar (info strip) ===== */
        .topbar {
            background: var(--vg-primary-dark);
            color: #cfe3de;
            font-size: 0.82rem;
        }

        .topbar a {
            color: #cfe3de;
        }

        .topbar a:hover {
            color: #ffffff;
        }

        /* ===== Navbar utama ===== */
        .navbar-vg {
            background: var(--vg-primary);
            box-shadow: 0 2px 10px rgba(15, 110, 94, 0.15);
        }

        .navbar-vg .navbar-brand {
            font-weight: 700;
            font-size: 1.35rem;
            color: #ffffff;
            letter-spacing: 0.2px;
        }

        .navbar-vg .navbar-brand small {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 0.7rem;
            font-weight: 400;
            color: #cfe3de;
        }

        .navbar-vg .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            font-size: 0.92rem;
            padding: 0.6rem 1rem !important;
            border-radius: 6px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .navbar-vg .nav-link:hover,
        .navbar-vg .nav-link.active {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff !important;
        }

        .navbar-vg .nav-link.active {
            font-weight: 600;
        }

        .btn-vg-outline {
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.4rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-vg-outline:hover {
            background: #ffffff;
            color: var(--vg-primary-dark);
        }

        .btn-vg-solid {
            background: var(--vg-accent);
            color: var(--vg-ink);
            font-size: 0.85rem;
            font-weight: 700;
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            border: none;
            transition: filter 0.2s ease;
        }

        .btn-vg-solid:hover {
            filter: brightness(0.95);
            color: var(--vg-ink);
        }

        /* ===== Emergency strip di bawah navbar ===== */
        .emergency-strip {
            background: #ffffff;
            border-bottom: 1px solid var(--vg-border);
        }

        .emergency-strip .icon-circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(15, 110, 94, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--vg-primary);
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        .emergency-strip h6 {
            margin: 0;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--vg-ink);
        }

        .emergency-strip p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--vg-muted);
        }

        /* ===== Konten ===== */
        .content-wrap {
            min-height: 420px;
            padding: 2rem 0 3rem;
        }

        /* ===== Footer ===== */
        footer.vg-footer {
            background: var(--vg-primary-dark);
            color: #cfe3de;
            font-size: 0.88rem;
        }

        footer.vg-footer h6 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 0.9rem;
        }

        footer.vg-footer a {
            color: #b9d4cd;
        }

        footer.vg-footer a:hover {
            color: #ffffff;
        }

        footer.vg-footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        footer.vg-footer ul li {
            margin-bottom: 0.5rem;
        }

        .vg-copyright {
            background: #093b32;
            color: #a9c4bd;
            font-size: 0.8rem;
        }

        .vg-copyright a {
            color: #cbd113;
            font-weight: 600;
        }

        @media (max-width: 991.98px) {
            .navbar-vg .nav-link {
                color: #ffffff !important;
            }

            .navbar-vg .navbar-collapse {
                padding-top: 0.75rem;
            }
        }
    </style>
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-vg py-2">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Vita Guard
                <small>Member Health Portal</small>
            </a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#vgNavbar">
                <i class="bi bi-list fs-1 text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="vgNavbar">
                <ul class="navbar-nav mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/doctors*') ? 'active' : '' }}" href="{{ url('/member/doctors') }}">
                            <i class="bi bi-person-badge me-1"></i> Doctor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/articles*') ? 'active' : '' }}" href="{{ url('/member/articles') }}">
                            <i class="bi bi-journal-text me-1"></i> Article
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/bookings*') ? 'active' : '' }}" href="{{ url('/member/bookings') }}">
                            <i class="bi bi-calendar-check me-1"></i> Booking
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/consultations*') ? 'active' : '' }}" href="{{ url('/member/consultations') }}">
                            <i class="bi bi-chat-dots me-1"></i> Consultation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/history*') ? 'active' : '' }}" href="{{ url('/member/history') }}">
                            <i class="bi bi-clock-history me-1"></i> History
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    @auth
                    <span class="text-white-50 small d-none d-lg-inline">
                        <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                    </span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-vg-outline">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-vg-solid">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- ===== EMERGENCY STRIP ===== -->
    <div class="emergency-strip py-3">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div>
                    <h6>24 Hour Emergency Service</h6>
                    <p>+62 21 5551234</p>
                </div>
            </div>
            <a href="{{ url('/member/consultations') }}" class="d-none d-md-inline-flex align-items-center text-decoration-none" style="color: var(--vg-primary); font-weight:600; font-size:0.88rem;">
                Consult a doctor now <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>

    <!-- ===== KONTEN ===== -->
    <main class="content-wrap">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="vg-footer pt-5 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <h6 class="brand-font text-white fs-5">Vita Guard</h6>
                    <p class="mb-0">
                        Vita Guard provides health education and consultation services anytime, anywhere.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h6>Quick Navigation</h6>
                    <ul>
                        <li><a href="{{ url('/member/doctors') }}">Find a Doctor</a></li>
                        <li><a href="{{ url('/member/articles') }}">Health Articles</a></li>
                        <li><a href="{{ url('/member/bookings') }}">Book a Consultation</a></li>
                        <li><a href="{{ url('/member/history') }}">Consultation History</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6>Contact us</h6>
                    <ul>
                        <li><i class="bi bi-geo-alt me-2"></i>Surabaya, Indonesia</li>
                        <li><i class="bi bi-telephone me-2"></i>+62 21 5551234</li>
                        <li><i class="bi bi-envelope me-2"></i>cs@vitaguard.id</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===== COPYRIGHT ===== -->
    <div class="vg-copyright py-3">
        <div class="container d-flex flex-wrap justify-content-between gap-2">
            <span>&copy; {{ date('Y') }} <strong>Vita Guard</strong>. All rights reserved.</span>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>