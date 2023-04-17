<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayData;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Users;
use App\Http\Controllers\UserPages;
use App\Http\Controllers\ApiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/sensor/{temperature}/{flowrate}/{waterlevel}',[ApiController::class,'sensor']);
Route::post('/login',[Users::class,'login'])->name('login');
Route::get('/',[UserPages::class,'showlogin'])->name('showlogin');
Route::get('flowrate',[ApiController::class,'flowRateData'])->name('flowRateData');

Route::group(['middleware' => 'auth'],function(){


Route::get('/users',[UserPages::class,'users'])->name('users');

Route::post('user/create',[Users::class,'createUser'])->name('user.create');
Route::delete('user/delete/{id}',[Users::class,'deleteUser']);
Route::post('user/edit/{id}',[Users::class,'editUser']);
Route::get('/display',[Displaydata::class,'temp_graph'])->name('display');
Route::get('/humidity',[Displaydata::class,'humidity'])->name('humidity');
Route::get('/temperature',[Displaydata::class,'temperature'])->name('temperature');
Route::get('/wind',[Displaydata::class,'wind'])->name('wind');
Route::get('/graphs',[DisplayData::class,'disp_graph'])->name('graphs');
Route::get('/display/graphs',[DisplayData::class,'temp_graph'])->name('display.graphs');
Route::get('/humidy/graphs',[DisplayData::class,'waterlevel_graph'])->name('water.graphs');
Route::get('/speed/graphs',[DisplayData::class,'flowrate'])->name('flowrate.graphs');

Route::get('/temp-data', [Displaydata::class,'temp_data']);
Route::get('role',[UserPages::class,'roles'])->name('role');
Route::post('addrole', [Users::class, 'addrole']);
Route::post('deleterole/{id}', [Users::class, 'deleterole']);
Route::post('block/{id}', [Users::class, 'block']);
Route::post('editRole/{id}', [Users::class, 'editrole']);
Route::get('logout',[Users::class,'logout'])->name('logout');
Route::post('changepassword', [Users::class, 'changepassword']);
Route::post('changeinfo', [Users::class, 'changeinfo']);
Route::get('/reporttemp',[ReportController::class,'reporttemp'])->name('reporttemp');
Route::get('generate_pdf',[ReportController::class,'generatePDFtemp'])->name('generate_pdf');
Route::get('/reportflow',[ReportController::class,'reportflow'])->name('reportflow');
Route::get('generateflow',[ReportController::class,'generatePDFflow'])->name('generateflow');
Route::get('/waterlevel',[ReportController::class,'reportwaterlevel'])->name('waterlevel');
Route::get('/generatewaterlevel',[ReportController::class,'generatePDFwater'])->name('generatewaterlevel');

//API//


});
