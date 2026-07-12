<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
   
</head>

<body class="antialiased">
    @extends('layout')

    @section('content')

        <h2>Pilih Layanan Kesehatan</h2>

        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">

                        <h4>Konsultasi Online</h4>

                        <p>Konsultasi langsung dengan dokter</p>

                        <a href="/consultations" class="btn btn-primary">
                            Pilih
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">

                        <h4>Janji Temu Dokter</h4>

                        <p>Buat janji dengan dokter di klinik</p>

                        <a href="/bookings" class="btn btn-primary">
                            Pilih
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">

                        <h4>Artikel</h4>

                        <p>Artikel tentang kesehatan yang dibuat oleh dokter</p>

                        <a href="/articles" class="btn btn-primary">
                            Pilih
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">

                        <h4>Dokter</h4>

                        <p>Dokter dalam Vita Guard yang tersedia</p>

                        <a href="/doctors" class="btn btn-primary">
                            Pilih
                        </a>

                    </div>
                </div>
            </div>

            <!-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">

                        <h4>Jadwal Dokter</h4>

                        <p>Jadwal Dokter dapat dilihat disini</p>

                        <a href="/doctorSchedules" class="btn btn-primary">
                            Pilih
                        </a>

                    </div>
                </div>
            </div> -->

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">

                        <h4>History</h4>

                        <p>Riwayat Konsultasi yang telah dilakukan sebelumnya</p>

                        <a href="/riwayats" class="btn btn-primary">
                            Pilih
                        </a>

                    </div>
                </div>
            </div>

        </div>

    @endsection
</body>

</html>