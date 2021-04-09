<?php
use Illuminate\Http\Request; 
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
    return view('auth/login');
});


Auth::routes();


Route::get('/cari-penduduk',function(){
    return view('cari-penduduk');
});

Auth::routes();

//front end action
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/surat-view', 'SuratController@index');
Route::post('/store-surat','SuratController@store');
Route::get('/list-surat-view','SuratController@showlist');
Route::get('/get-surat/{id}','SuratController@showsurat');
Route::get('/surat/detail/{id}','SuratController@detailsurat');
Route::get('/surat/hapus/{id}','SuratController@deletesurat');
Route::get('/detail-artikel/{id}','ArtikelController@detail');
Route::get('/persewaan','ArtikelController@sewa');
Route::get('/cari-penduduk-find','ArtikelController@cari');
Route::get('/detail-sewa/{id}','ArtikelController@show_sewa');
Route::get('/edit-profile',function(){
    return view('edit');
});
Route::post('/edit-profile-post','HomeController@edit_profile');


// admin auth
Route::get('/loginadmin','Auth\AuthAdminController@login');
Route::get('/registeradmin-super','Auth\AuthAdminController@register');
Route::post('/registeradmin-super-post','Auth\AuthAdminController@store');

Route::post('loginadmin-post','Auth\AuthAdminController@cek');
Route::get('/backend', 'HomeaController@index')->name('admin.dashboard');

// backend Pengajuan Surat
Route::get('/backendPengajuanSurat','backendController@tampilPengajuanSurat');
Route::get('/backendPengajuanSuratDetail{id}','backendController@tampilPengajuanSuratDetail');
Route::post('/updateStatus/selesai','backendController@updateStatusSelesai');
Route::post('/updateStatus/ditolak','backendController@updateStatusDitolak');

//homebackend
Route::get('/backendHome','backendHomeController@tampil');
Route::get('/backendHome1','backendHomeController@tampil1');
Route::get('/backendTemplate','backendHomeController@tampilTemplate');


//backendArtikel
Route::get('/backendArtikel','backendArtikelController@tampilArtikel');
Route::get('/backendArtikelBaru','backendArtikelController@tulisArtikel');
Route::post('/backendArtikel/post','backendArtikelController@postArtikel');
Route::get('/backendArtikel/hapus','backendArtikelController@hapusArtikel');
Route::get('/backendArtikel/edit/{id}','backendArtikelController@editArtikel');
Route::post('/backendArtikel/artikelEdit','backendArtikelController@editPostArtikel');
Route::get('/backendArtikel/hapus/{id}','backendArtikelController@hapusArtikel');

//penduduk
Route::get('/backendUser','backendUserController@tampilUser');
Route::get('/backendRegisterUser','backendUserController@RegisterUser');
Route::post('/backendRegisterUserPost','backendUserController@RegisterUserPost');
Route::get('/backendUserDetail{id}','backendUserController@detailUser');
Route::post('/backend/user/update/{id}','backendUserController@updateUser');
Route::get('/backendUser/hapus/{id}','backendUserController@hapusUser');
Route::get('/backendUser/resetPassword','backendUserController@resetPassword');


//persewaan
Route::get('/backendPersewaan','backendPersewaanController@tampilPersewaan');
Route::get('/backendPersewaanDetail{id}','backendPersewaanController@detailPersewaan');
Route::get('/backendPersewaan/hapus/{id}','backendPersewaanController@hapusPersewaan');
Route::get('/backendPersewaan/tambah','backendPersewaanController@tambahPersewaan');
Route::get('/backendPersewaan/tambah/post','backendPersewaanController@PostPersewaan');

//Cetak Surat
Route::get('/cetakWord', ['as'=>'createWord','uses'=>'BackendCetakSuratController@createWordDocx']);
Route::get('/cetakSurat', ['as'=>'createWord','uses'=>'BackendCetakSuratController@cetakSurat1']);
Route::get('/cetakSurat1', 'BackendCetakSuratController@cetakSurat2');

Route::get('/cetakSurat2', function ( Request $request ) {

    
    $file = public_path('surat_pernyataan.rtf');
    $array = array(
        '[NOMOR_SURAT]' => '015/BT/SK/V/2017',
        '[PERUSAHAAN]' => 'CV. Borneo Teknomedia',
        '[NAMA]' => 'Melani Malik',
        '[NIP]' => '3011710010',
        '[ALAMAT]' => 'Jl. Manunggal Gg. 8 Loa Bakung, Samarinda',
        '[PERMOHONAN]' => 'Permohonan pengurusan pembuatan NPWP',
        '[KOTA]' => 'Samarinda',
        '[DIRECTOR]' => 'Noviyanto Rahmadi',
        '[TANGGAL]' => date('d F Y'),
    );
    

    $nama_file = 'surat-keterangan-kerja.doc';
    return WordTemplate::export($file, $array, $nama_file);
});













//lain lain

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
