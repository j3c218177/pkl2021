<?php

use Illuminate\Support\Facades\Route;

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
     //return view('auth.login');
     return view('welcome');
 });
/*Route::get('/home', function () {
	return view('home');
});*/
Route::get('suratmasuk', 'SuratMasukController@data')->name('suratmasuks.view')->middleware('auth');
Route::get('suratmasuk/add', 'SuratMasukController@add')->name('suratmasuks.addform')->middleware('auth');
Route::post('suratmasuk', 'SuratMasukController@addProcessing')->name('suratmasuks.addprocess');
Route::get('suratmasuk/{suratmasuk}/edit','SuratMasukController@edit')->name('suratmasuks.edit')->middleware('auth');
Route::put('suratmasuk/{suratmasuk}','SuratMasukController@update')->name('suratmasuks.update');
Route::delete('suratmasuk/{suratmasuk}','SuratMasukController@delete')->name('suratmasuks.delete')->middleware('auth');

Route::get('suratkeluar', 'SuratKeluarController@data')->name('suratkeluars.view')->middleware('auth');
Route::get('suratkeluar/add', 'SuratKeluarController@add')->name('suratkeluars.addform')->middleware('auth');
Route::post('suratkeluar', 'SuratKeluarController@addProcessing')->name('suratkeluars.addprocess');
Route::get('suratkeluar/{suratkeluar}/edit','SuratKeluarController@edit')->name('suratkeluars.edit')->middleware('auth');
Route::put('suratkeluar/{suratkeluar}','SuratKeluarController@update')->name('suratkeluars.update');
Route::delete('suratkeluar/{suratkeluar}','SuratKeluarController@delete')->name('suratkeluars.delete')->middleware('auth');


Route::get('daftarhasilkegiatan', 'DaftarHasilKegiatanController@data')->name('daftarhasilkegiatans.view')->middleware('auth');
Route::get('daftarhasilkegiatan/add', 'DaftarHasilKegiatanController@add')->name('daftarhasilkegiatans.addform')->middleware('auth');
Route::post('daftarhasilkegiatan', 'DaftarHasilKegiatanController@addProcessing')->name('daftarhasilkegiatans.addprocess');
Route::get('daftarhasilkegiatan/{hasilkegiatan}/edit','DaftarHasilKegiatanController@edit')->name('daftarhasilkegiatans.edit')->middleware('auth');
Route::put('daftarhasilkegiatans/{hasilkegiatan}','DaftarHasilKegiatanController@update')->name('daftarhasilkegiatans.update');
Route::delete('daftarhasilkegiatan/{hasilkegiatan}','DaftarHasilKegiatanController@delete')->name('daftarhasilkegiatans.delete')->middleware('auth');

Route::get('daftarhadirrapat', 'DaftarHadirRapatController@data')->name('daftarhadirrapats.view')->middleware('auth');
Route::get('daftarhadirrapat/add', 'DaftarHadirRapatController@add')->name('daftarhadirrapats.addform')->middleware('auth');
Route::post('daftarhadirrapat', 'DaftarHadirRapatController@addProcessing')->name('daftarhadirrapats.addprocess');
Route::get('daftarhadirrapat/{hadirrapat}/edit','DaftarHadirRapatController@edit')->name('daftarhadirrapats.edit')->middleware('auth');
Route::put('daftarhadirrapats/{hadirrapat}','DaftarHadirRapatController@update')->name('daftarhadirrapats.update');
Route::delete('daftarhadirrapat/{hadirrapat}','DaftarHadirRapatController@delete')->name('daftarhadirrapats.delete')->middleware('auth');

Route::get('daftarnotulenrapat', 'DaftarNotulenRapatController@data')->name('daftarnotulenrapats.view')->middleware('auth');
Route::get('daftarnotulenrapat/add', 'DaftarNotulenRapatController@add')->name('daftarnotulenrapats.addform')->middleware('auth');
Route::post('daftarnotulenrapat', 'DaftarNotulenRapatController@addProcessing')->name('daftarnotulenrapats.addprocess');
Route::get('daftarnotulenrapat/{notulenrapat}/edit','DaftarNotulenRapatController@edit')->name('daftarnotulenrapats.edit')->middleware('auth');
Route::put('daftarnotulenrapat/{notulenrapat}','DaftarNotulenRapatController@update')->name('daftarnotulenrapats.update');
Route::delete('daftarnotulenrapat/{notulenrapat}','DaftarNotulenRapatController@delete')->name('daftarnotulenrapats.delete')->middleware('auth');

Route::get('seminars', 'SeminarController@data')->name('seminars.view')->middleware('auth');
Route::get('seminars/add', 'SeminarController@add')->name('seminars.addform')->middleware('auth');
Route::get('seminars/data', 'SeminarController@data')->middleware('auth');
Route::post('seminars', 'SeminarController@addProcessing')->name('seminars.addprocess');
Route::get('seminars/{seminar}/edit','SeminarController@edit')->name('seminars.edit')->middleware('auth');
Route::put('seminars/{seminar}','SeminarController@update')->name('seminars.update');
Route::delete('seminars/{seminar}','SeminarController@delete')->name('seminars.delete')->middleware('auth');

Route::get('profil/me/{profil}', 'ProfilController@me')->name('profils.me')->middleware('auth');
Route::get('profil/list', 'ProfilController@data')->name('profils.list')->middleware('auth');
Route::get('profil/add', 'ProfilController@add')->name('profils.addform')->middleware('auth');
Route::post('profil', 'ProfilController@addProcessing')->name('profils.addprocess');
Route::get('profil/{profil}/edit','ProfilController@edit')->name('profils.edit')->middleware('auth');
Route::put('profil/{profil}','ProfilController@update')->name('profils.update');
Route::delete('profil/{profil}','ProfilController@delete')->name('profils.delete')->middleware('auth');

Route::get('workshop', 'WorkshopController@data')->middleware('auth');
Route::get('workshop/add', 'WorkshopController@add')->middleware('auth');
Route::get('workshop/data', 'WorkshopController@data')->middleware('auth');
Route::post('workshop/data', 'WorkshopController@addProcessing');
Route::get('workshop/edit/{id}', 'WorkshopController@edit')->middleware('auth');
Route::patch('workshop/{id}', 'WorkshopController@editProcessing');
Route::delete('workshop/{id}', 'WorkshopController@delete')->middleware('auth');


// Route::get('lokakarya', 'LokakaryaController@data');
// Route::get('lokakarya/add', 'LokakaryaController@add');
// Route::post('lokakarya', 'LokakaryaController@addProcessing');

Route::get('lokakarya', 'LokakaryaController@data')->middleware('auth');
Route::get('lokakarya/add', 'LokakaryaController@add')->middleware('auth');
Route::get('lokakarya/data', 'LokakaryaController@data')->middleware('auth');
Route::post('lokakarya/data', 'LokakaryaController@addProcessing');
Route::get('lokakarya/edit/{id}', 'LokakaryaController@edit')->middleware('auth');
Route::patch('lokakarya/{id}', 'LokakaryaController@editProcessing');
Route::delete('lokakarya/{id}', 'LokakaryaController@delete')->middleware('auth');

Route::get('disposisi/{id}', 'DisposisiController@add')->name('disposisis.addform')->middleware('auth');
Route::get('disposisi/view/{id}', 'DisposisiController@data')->name('disposisis.view')->middleware('auth');
Route::post('disposisi/add/{id}', 'DisposisiController@addProcessing')->name('disposisis.addprocess');
Route::get('disposisi/{id}/edit', 'DisposisiController@edit')->name('disposisis.edit')->middleware('auth');
Route::put('disposisi/{id}','DisposisiController@update')->name('disposisis.update');
Route::delete('disposisi/{id}','DisposisiController@delete')->name('disposisis.delete')->middleware('auth');
Route::get('send', 'DisposisiController@sendNotification');

//mark as read
Route::get('DatabaseNotificationsMarkasRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
    })->name('databasenotifications.markasread');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
