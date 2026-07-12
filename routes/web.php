<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ConsultationMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\MemberController;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Consultation;
use App\Models\DoctorSchedule;
use App\Models\History;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(["auth"])->group(function () {

    Route::get('/', function () {
        $role = Auth::user()->role; // Mengambil role user yang sedang login

        if ($role === 'ADMIN') {
            return redirect()->route('dashboard.index'); // Admin langsung ke dashboard AdminLTE
        }

        if ($role === 'DOCTOR') {
            return redirect('/bookings'); // Dokter langsung ke daftar booking pasien mereka
        }

        // Jika dia MEMBER, jalankan method indexArticles
        return app(App\Http\Controllers\MemberController::class)->indexArticles(request());
    });

    Route::get('/welcome', function () {
        return 'Selamat Datang di Portal Kesehatan';
    });

    Route::get('/menu', function () {
        return view('menu');
    });

    Route::get('/menu/{jenis}', function ($jenis) {

        if ($jenis == "konsultasi") {
            /*return "Daftar layanan Konsultasi Online";*/
            return view('konsultasi');
        }

        if ($jenis == "janji") {
            /*return "Daftar layanan Janji Temu Dokter";*/
            return view('janji');
        }
    });

    Route::get('/administrasi', function () {
        return view('administrasi');
    });

    Route::get('/administrasi/{jenis}', function ($jenis) {

        if ($jenis == "categories") {
            /*return "Portal Manajemen: Daftar Kategori Layanan";*/
            return view('categories');
        } else if ($jenis == "order") {
            /*return "Portal Manajemen: Daftar Konsultasi dan Janji Temu";*/
            return view('order');
        } else if ($jenis == "members") {
            /*return "Portal Manajemen: Daftar Pasien";*/
            return view('members');
        }
    });

    Route::post('/articles/detail', [ArticleController::class, 'showDetail'])->name('article.showDetail');
    Route::post('/doctors/detail', [DoctorController::class, 'showDetail'])->name('doctors.showDetail');
    Route::post('/consultations/detail', [ConsultationController::class, 'showDetail'])->name('consultations.showDetail');
    Route::post('/bookings/detail', [BookingController::class, 'showDetail'])->name('bookings.showDetail');
    Route::post('/riwayats/detail', [RiwayatController::class, 'showDetail'])->name('riwayats.showDetail');

    Route::resource('articles', ArticleController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('consultations', ConsultationController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('doctorSchedules', DoctorScheduleController::class);
    Route::resource('riwayats', RiwayatController::class);
    Route::resource('dashboard', DashboardController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/detail/{article}', [MemberController::class, 'detail'])->name('detailArticle');

    Route::get('/member/articles', [MemberController::class, 'indexArticles']);
    Route::get('/member/articles/{article}', [MemberController::class, 'showArticle']);

    Route::get('/member/doctors', [MemberController::class, 'indexDoctors']);
    Route::get('/member/doctors/{doctor}', [MemberController::class, 'showDoctor'])->name('member.doctors.show');

    Route::get('/member/bookings/create/{doctor}', [MemberController::class, 'createBooking']);
    Route::post('/member/bookings', [MemberController::class, 'storeBooking'])->name('member.bookings.store');
    Route::get('/member/bookings', [MemberController::class, 'indexBookings'])->name('member.bookings.index');

    Route::get('/member/consultations', [App\Http\Controllers\MemberController::class, 'indexConsultations'])->name('member.consultations.index');
    Route::get('/member/consultations/{consultation}', [MemberController::class, 'showConsultation'])->name('member.consultations.show');
    Route::get('/member/history', [MemberController::class, 'indexHistory']);
});

Auth::routes();

Route::post('/consultations/{consultation}/messages', [ConsultationMessageController::class, 'store'])
    ->name('consultation-messages.store');
Route::post('/bookings/update-status', [BookingController::class, 'updateStatus'])
    ->name('bookings.updateStatus');
Route::post('/consultations/update-status', [ConsultationController::class, 'updateStatus'])
    ->name('consultations.updateStatus');
