<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/send_email', [SendEmailController::class, 'index'])->name('email.send_email');
Route::post('/send_email/send',[SendEmailController::class, 'send']);
Route::post('/send_email/sendEmailBroadcast',[SendEmailController::class, 'sendEmailBroadcast']);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('Nilai', NilaiController::class);
    Route::resource('Sekolah', SekolahController::class);
    Route::resource('Siswa', SiswaController::class);
    Route::get('/searchLive', [SiswaController::class, 'search'])->name('searchLive');
    Route::get('/live', [NilaiController::class, 'search'])->name('live');
    Route::get('/index2', [SekolahController::class, 'tampil'])->name('index2');
    Route::get('/Nilai/{id}/email_nilai', [SendEmailController::class, 'sendEmail'])->name('Nilai.email_nilai');
    Route::get('/email/broadcast', [SendEmailController::class, 'sendBroadcast'])->name('email.broadcast');
    Route::get('/create', [NilaiController::class, 'create'])->name('Nilai.create');
    Route::get('/findNis',[NilaiController::class, 'findNis']);
    Route::get('/findNamaOrtu',[NilaiController::class, 'findNamaOrtu']);
    Route::get('/findNameOrtu',[SiswaController::class, 'findNameOrtu']);
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/changePassword', '\App\Http\Controllers\HomeController@showChangePasswordForm');
Route::post('/changePassword', '\App\Http\Controllers\HomeController@changePassword')->name('changePassword');

Route::get('import-export', [UserController::class, 'ImportExport']);
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');


Route::get('file-import-export', [SiswaController::class, 'fileImportExport']);
Route::post('fileImport', [SiswaController::class, 'fileImport'])->name('fileImport');

Route::get('contact-form', [CaptchaController::class, 'changepassword']);
Route::post('captcha-validation', [CaptchaController::class, 'capthcaFormValidate']);
Route::get('reload-captcha', [CaptchaController::class, 'reloadCaptcha']);

