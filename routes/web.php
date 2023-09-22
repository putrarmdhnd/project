<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\TanggapanController;
use App\Models\Pengaduan;
use App\Models\Tanggapan;



Route::get('/masuk', [AuthController::class, 'masuk'])->name('login')->middleware('guest');
Route::post('/masuk', [AuthController::class, 'login'])->middleware('guest');
Route::get('/daftar', [AuthController::class, 'daftar'])->middleware('guest');
Route::post('/daftar', [AuthController::class, 'register'])->middleware('guest');
Route::post('/keluar', [AuthController::class, 'keluar'])->name('logout');

require __DIR__ . '/landing_page/landing_page.php';


Route::get('/dashboard', function () {
    return view('index', [
        'title'           => 'Dasbor',
        'total_laporan'   => Pengaduan::all()->count(),
        'laporan_selesai' => Pengaduan::where('status', 'selesai')->count(),
        'total_tanggapan' => Tanggapan::all()->count(),
    ]);
})->middleware('auth');

// Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::put('/pengaduan/respon/{pengaduan}', [PengaduanController::class, 'response'])->middleware('auth');
Route::get('/pengaduan/belum', [PengaduanController::class, 'belum'])->middleware('auth');
Route::get('/pengaduan/proses', [PengaduanController::class, 'proses'])->middleware('auth');
Route::get('/pengaduan/selesai', [PengaduanController::class, 'selesai'])->middleware('auth');
Route::resource('/pengaduan', PengaduanController::class)->middleware('auth');
Route::resource('/tanggapan', TanggapanController::class)->middleware('auth');

Route::put('/pengajuan-surat/{pengajuan_surat}/approve', [PengajuanSuratController::class, 'approve'])->middleware('auth')->name('pengajuan_surat.approve');
Route::put('/pengajuan-surat/{pengajuan_surat}/reject', [PengajuanSuratController::class, 'reject'])->middleware('auth')->name('pengajuan_surat.reject');
Route::get('/pengajuan-surat/{pengajuan_surat}/preview', [PengajuanSuratController::class, 'preview'])->middleware('auth')->name('pengajuan_surat.preview.surat');
Route::get('/pengajuan-surat/{pengajuan_surat}/download', [PengajuanSuratController::class, 'download'])->middleware('auth')->name('pengajuan_surat.download.surat');
Route::resource('/pengajuan-surat', PengajuanSuratController::class)->middleware('auth');

Route::group(['middleware' => ['auth', 'hanyaAdmin']], function () {
    Route::get('/pengguna/masyarakat', [UserController::class, 'masyarakat']);
    Route::get('/pengguna/petugas', [UserController::class, 'petugas']);
    Route::resource('/pengguna', UserController::class);
});


//  Control Management System Landing Page
require __DIR__ . '/landing_page/cms.php';


