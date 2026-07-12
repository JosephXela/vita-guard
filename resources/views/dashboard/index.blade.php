@extends('layouts.adminlte4')
@section('title', 'Dashboard')
@section('dashboard-active', 'active')
@section('content')

<div class="container">
    <h2>Dashboard</h2>
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $jumlahDokter }}</h3>
                    <p>Doctors</p>
                </div>

                <i class="small-box-icon bi bi-person-badge-fill"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $jumlahMember }}</h3>
                    <p>Members</p>
                </div>

                <i class="small-box-icon bi bi-people-fill"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ $jumlahArtikel }}</h3>
                    <p>Articles</p>
                </div>

                <i class="small-box-icon bi bi-newspaper"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-info">
                <div class="inner">
                    <h3>{{ $jumlahBooking }}</h3>
                    <p>Bookings</p>
                </div>

                <i class="small-box-icon bi bi-calendar-check"></i>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-secondary">
                <div class="inner">
                    <h3>{{ $jumlahBookingApproved }}</h3>
                    <p>Booking Approved</p>
                </div>

                <i class="small-box-icon bi bi-check-circle"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-dark">
                <div class="inner">
                    <h3>{{ $jumlahBookingDone }}</h3>
                    <p>Booking Done</p>
                </div>

                <i class="small-box-icon bi bi-check2-all"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>{{ $jumlahConsultationActive }}</h3>
                    <p>Consultation Active</p>
                </div>

                <i class="small-box-icon bi bi-chat-dots"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $jumlahConsultationClosed }}</h3>
                    <p>Consultation Closed</p>
                </div>

                <i class="small-box-icon bi bi-chat-square-text"></i>
            </div>
        </div>

    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">
                Booking Statistics
            </h3>
        </div>

        <div class="card-body">
            <div id="bookingChart"></div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    var options = {
        chart: {
            type: 'bar',
            height: 350
        },

        series: [{
            name: 'Jumlah',
            data: [
                {{ $jumlahBookingApproved }},
                {{ $jumlahBookingDone }},
                {{ $jumlahBookingCancel }},
                {{ $jumlahConsultationActive }},
                {{ $jumlahConsultationClosed }}
            ]
        }],

        xaxis: {
            categories: [
                'Booking Approved',
                'Booking Done',
                'Booking Cancel',
                'Consultation Active',
                'Consultation Closed'
            ]
        }
    };

    new ApexCharts(document.querySelector("#bookingChart"), options).render();
</script>
@endpush