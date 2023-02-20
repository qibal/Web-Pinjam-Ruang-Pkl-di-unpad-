<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// admin
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\TableRuangan;
use App\Http\Controllers\Admin\TableLantai;
use App\Http\Controllers\Admin\DataPeminjamController;
use App\Http\Controllers\Admin\TableProsedur;
use App\Http\Controllers\Admin\ProfileAdmin;
use App\Http\Controllers\Admin\daftarUser;

// user
use App\Http\Controllers\User\FormPinjamController;
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\historyPinjamController;
use App\Http\Controllers\User\prosedurPinjamController;
use App\Http\Controllers\User\daftarRuanganController;
use App\Http\Controllers\User\Kalender;
use App\Http\Controllers\User\detailRuangan;


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



Route::get('/', function () {
    return view('User.HomeUser');
});

// Route::view('admin2','Admin.LayoutAdmin2');




Auth::routes();
//admin
Route::middleware(['auth:admin'])->group( function(){
    Route::get('/admin/home',[HomeAdminController::class,'home'])->name('admin-home');

    // table ruangan
    Route::get('/admin/TableRuangan',[TableRuangan::class,'tableRuangan'])->name('admin.tableRuangan');
    Route::post('/admin/TableRuangan/add',[TableRuangan::class,'tableRuanganAdd'])->name('admin.RuanganAdd');
    Route::get('/admin/TableRuangan/delete/{id}',[TableRuangan::class,'tableRuanganDelete'])->name('admin.RuanganDelete');
    Route::get('/admin/TableRuangan/edit/{id}',[TableRuangan::class,'tableRuanganEdit'])->name('admin.RuanganEdit');
    Route::post('/admin/TableRuangan/UpdateData',[TableRuangan::class,'tableRuanganUpdateData'])->name('admin.RuanganUpdateData');

    //table lantai
    Route::get('/admin/TableLantai',[TableLantai::class,'tableLantai'])->name('admin.tableLantai');
    Route::post('/admin/TableLantai/add',[TableLantai::class,'tableLantaiAdd'])->name('admin.tableLantaiAdd');
    Route::get('/admin/TableLantai/delete/{id}',[TableLantai::class,'tableLantaiDelete'])->name('admin.LantaiDelete');

    //table peminjam
    Route::get('/admin/DataPeminjam',[DataPeminjamController::class,'dataPeminjam'])->name('admin.dataPeminjam');
    Route::get('/admin/DataPeminjam/setuju/{id}',[DataPeminjamController::class,'setuju'])->name('admin.setuju');
    Route::get('/admin/DataPeminjam/delete/{id}',[DataPeminjamController::class,'delete'])->name('admin.delete');

    //prosedur peminjam
    Route::get('/admin/ProsedurPinjam',[TableProsedur::class,'prosedurPinjam'])->name('admin.prosedurPinjam');
    Route::post('/admin/ProsedurPinjam/Add',[TableProsedur::class,'prosedurPinjamAdd'])->name('admin.prosedurPinjamAdd');
    Route::get('/admin/ProsedurPinjam/Delete/{id}',[TableProsedur::class,'prosedurPinjamDelete'])->name('admin.prosedurPinjamDelete');
    Route::get('/admin/ProsedurPinjam/Edit/{id}',[TableProsedur::class,'prosedurPinjamEdit'])->name('admin.prosedurPinjamEdit');
    Route::post('/admin/ProsedurPinjam/UPdateData',[TableProsedur::class,'prosedurPinjamUpdateData'])->name('admin.prosedurPinjamUpdateData');

    //profile Admin
    Route::get('/admin/ProfileAdmin',[ProfileAdmin::class,'profileAdmin'])->name('admin.profileAdmin');
    Route::get('/admin/ProfileAdmin/ubahPassword',[ProfileAdmin::class,'ubahPassword'])->name('admin.ubahPassword');
    Route::post('/admin/ProfileAdmin/ubahPassword/changePassword',[ProfileAdmin::class,'changePassword'])->name('admin.changePassword');

    // data user
    Route::get('/admin/daftarUser',[daftarUser::class,'daftarUser']);
    Route::get('/admin/daftarUser/delete/{id}',[daftarUser::class,'daftarUserDelete'])->name('daftarUserDelete');

    // notif permohonan peminjaman
    Route::get('/admin/notif',[HomeAdminController::class,'notif'])->name('notif');
} );



//user


Route::middleware(['auth:user'])->group( function(){
    Route::get('/user/home',[HomeUserController::class,'home'])->name('user-home');

    // form pinjam ruangan
    Route::post('/user/formPinjam/Add',[FormPinjamController::class,'formpinjamAdd'])->name('user.formpinjamAdd');

    // history pinjam
    Route::get('/user/history_pinjam',[historyPinjamController::class,'historyPinjam'])->name('user.historyPinjam');
    Route::get('/user/history_pinjam/batalPermohonan/{id}',[historyPinjamController::class,'batalPermohonan'])->name('user.batalPermohonan');
    Route::get('/user/history_pinjam/batalPinjam/{id}',[historyPinjamController::class,'batalPinjam'])->name('user.batalPinjam');
    Route::get('/user/history_pinjam/selesaiPinjam/{id}',[historyPinjamController::class,'selesaiPinjam'])->name('user.selesaiPinjam');

    Route::get('/user/formPinjam',[FormPinjamController::class,'formpinjam'])->name('formpinjam');
    Route::post('/user/getRuangan',[FormPinjamController::class,'getRuangan'])->name('getRuangan');

    Route::get('/user/kalender',[kalender::class,'kalender'])->name('kalender');

    Route::get('/user/prosedur_pinjam',[prosedurPinjamController::class,'prosedur_pinjam'])->name('user.Prosedur_pinjam');

    Route::get('/user/daftarRuangan',[daftarRuanganController::class,'daftarRuangan'])->name('user.daftarRuangan');
    Route::get('/user/detailRuangan/{id}',[detailRuangan::class,'detailRuangan'])->name('user.detailRuangan');


} );
