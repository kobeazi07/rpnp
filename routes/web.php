<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;

Route::get('/', [HomeController::class, 'home'])->name('HalamanHome');
Route::get('/about', [HomeController::class, 'about'])->name('HalamanAbout');
Route::get('/blog', [HomeController::class, 'blog'])->name('HalamanBlog');
Route::get('/dblog/{id}', [HomeController::class, 'dblog'])->name('HalamanDBlog');
Route::get('/carerr', [HomeController::class, 'carerr'])->name('HalamanCarerr');
Route::get('/dcarerr/{id}', [HomeController::class, 'dcarerr'])->name('HalamanDCarerr');
Route::get('/dportfolio/{id}', [HomeController::class, 'dportfolio'])->name('HalamanDPortfolio');

Route::get('/admin', [MasterController::class, 'halamanlogin'])->name('HalamanLogin');
Route::post('/login', [MasterController::class, 'login'])->name('login');
Route::post('/logout', [MasterController::class, 'user_logout'])->name('Logout');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [MasterController::class, 'dashboard'])->name('HalamanDashboard');
    Route::post('/edit_setting/{id}', [MasterController::class, 'edit_setting'])->name('Edit_setting');
    Route::get('/admin_about', [MasterController::class, 'about'])->name('HalamanAdminAbout');
    // Route::post('/tambah_about', [AdminController::class, 'tambah_about'])->name('Tambah_About');
    Route::post('/edit_about/{id}', [MasterController::class, 'edit_about'])->name('Edit_About');
    // partner
    Route::get('admin_partner', [MasterController::class, 'admin_partner'])->name('HalamanAdminpartner');
    Route::post('/tambah_partner', [MasterController::class, 'tambah_partner'])->name('Tambah_partner');
    Route::post('/edit_partner/{id}', [MasterController::class, 'edit_partner'])->name('Edit_partner');
    Route::delete('/partner/{partner}', [MasterController::class, 'partner_destroy'])->name('partner.destroy');

    Route::get('admin_services', [MasterController::class, 'admin_services'])->name('HalamanAdminservices');
    Route::post('/tambah_services', [MasterController::class, 'tambah_services'])->name('Tambah_services');
    Route::post('/edit_services/{id}', [MasterController::class, 'edit_services'])->name('Edit_services');
    Route::delete('/services/{services}', [MasterController::class, 'services_destroy'])->name('services.destroy');

    Route::get('admin_testimoni', [MasterController::class, 'admin_testimoni'])->name('HalamanAdmintestimoni');
    Route::post('/tambah_testimoni', [MasterController::class, 'tambah_testimoni'])->name('Tambah_testimoni');
    Route::post('/edit_testimoni/{id}', [MasterController::class, 'edit_testimoni'])->name('Edit_testimoni');
    Route::delete('/testimoni/{testimoni}', [MasterController::class, 'testimoni_destroy'])->name('testimoni.destroy');

    Route::get('admin_klasifikasi', [MasterController::class, 'admin_klasifikasi'])->name('HalamanAdminklasifikasi');
    Route::post('/tambah_klasifikasi', [MasterController::class, 'tambah_klasifikasi'])->name('Tambah_klasifikasi');
    Route::post('/edit_klasifikasi/{id}', [MasterController::class, 'edit_klasifikasi'])->name('Edit_klasifikasi');
    Route::delete('/klasifikasi/{klasifikasi}', [MasterController::class, 'klasifikasi_destroy'])->name('klasifikasi.destroy');

    Route::get('admin_galeri', [MasterController::class, 'admin_galeri'])->name('HalamanAdmingaleri');
    Route::post('/tambah_galeri', [MasterController::class, 'tambah_galeri'])->name('Tambah_galeri');
    Route::post('/edit_galeri/{id}', [MasterController::class, 'edit_galeri'])->name('Edit_galeri');
    Route::delete('/galeri/{galeri}', [MasterController::class, 'galeri_destroy'])->name('galeri.destroy');

    Route::get('admin_staff', [MasterController::class, 'admin_staff'])->name('HalamanAdminstaff');
    Route::post('/tambah_staff', [MasterController::class, 'tambah_staff'])->name('Tambah_staff');
    Route::post('/edit_staff/{id}', [MasterController::class, 'edit_staff'])->name('Edit_staff');
    Route::delete('/staff/{staff}', [MasterController::class, 'staff_destroy'])->name('staff.destroy');


    Route::get('admin_kategori_career', [MasterController::class, 'admin_kategori_career'])->name('HalamanAdminkategori_career');
    Route::post('/tambah_kategori_career', [MasterController::class, 'tambah_kategori_career'])->name('Tambah_kategori_career');
    Route::post('/edit_kategori_career/{id}', [MasterController::class, 'edit_kategori_career'])->name('Edit_kategori_career');
    Route::delete('/kategori_career/{kategori_career}', [MasterController::class, 'kategori_career_destroy'])->name('kategori_career.destroy');

    Route::get('admin_building_type', [MasterController::class, 'admin_building_type'])->name('HalamanAdminbuilding_type');
    Route::post('/tambah_building_type', [MasterController::class, 'tambah_building_type'])->name('Tambah_building_type');
    Route::post('/edit_building_type/{id}', [MasterController::class, 'edit_building_type'])->name('Edit_building_type');
    Route::delete('/building_type/{building_type}', [MasterController::class, 'building_type_destroy'])->name('building_type.destroy');

    Route::get('admin_kategori_blog', [MasterController::class, 'admin_kategori_blog'])->name('HalamanAdminkategori_blog');
    Route::post('/tambah_kategori_blog', [MasterController::class, 'tambah_kategori_blog'])->name('Tambah_kategori_blog');
    Route::post('/edit_kategori_blog/{id}', [MasterController::class, 'edit_kategori_blog'])->name('Edit_kategori_blog');
    Route::delete('/kategori_blog/{kategori_blog}', [MasterController::class, 'kategori_blog_destroy'])->name('kategori_blog.destroy');

    Route::get('admin_kategori_portfolio', [MasterController::class, 'admin_kategori_portfolio'])->name('HalamanAdminkategori_portfolio');
    Route::post('/tambah_kategori_portfolio', [MasterController::class, 'tambah_kategori_portfolio'])->name('Tambah_kategori_portfolio');
    Route::post('/edit_kategori_portfolio/{id}', [MasterController::class, 'edit_kategori_portfolio'])->name('Edit_kategori_portfolio');
    Route::delete('/kategori_portfolio/{kategori_portfolio}', [MasterController::class, 'kategori_portfolio_destroy'])->name('kategori_portfolio.destroy');

    Route::get('admin_career', [MasterController::class, 'admin_career'])->name('HalamanAdmincareer');
    Route::post('/tambah_career', [MasterController::class, 'tambah_career'])->name('Tambah_career');
    Route::post('/edit_career/{id}', [MasterController::class, 'edit_career'])->name('Edit_career');
    Route::delete('/career/{career}', [MasterController::class, 'career_destroy'])->name('career.destroy');

    Route::get('admin_portfolio', [MasterController::class, 'admin_portfolio'])->name('HalamanAdminportfolio');
    Route::post('/tambah_portfolio', [MasterController::class, 'tambah_portfolio'])->name('Tambah_Portfolio');
    Route::post('/edit_portfolio/{id}', [MasterController::class, 'edit_portfolio'])->name('Edit_Portfolio');
    Route::delete('/portfolio/{portfolio}', [MasterController::class, 'portfolio_destroy'])->name('Portfolio.destroy');
    Route::delete('/portfolio/detail-picture/{id}', [MasterController::class, 'deletePictureportfolio']);


    Route::get('admin_blog', [MasterController::class, 'admin_blog'])->name('HalamanAdminblog');
    Route::post('/tambah_blog', [MasterController::class, 'tambah_blog'])->name('Tambah_blog');
    Route::post('/edit_blog/{id}', [MasterController::class, 'edit_blog'])->name('Edit_blog');
    Route::delete('/blog/{blog}', [MasterController::class, 'blog_destroy'])->name('blog.destroy');
    Route::delete('/blog/detail-picture/{id}', [MasterController::class, 'deletePictureblog']);
});
