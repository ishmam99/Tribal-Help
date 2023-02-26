<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DigitalContentController;
use App\Http\Controllers\HealthReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;


Route::get('/digital', [DashboardController::class, 'digital'])->name('digital');
Route::get('/applications/create', [ApplicationController::class, 'create'])->name('application.create');
Route::get('/applications/certificate/create', [ApplicationController::class, 'createCertificate'])->name('certificate.create');

Auth::routes();
Route::post('/applications/store', [ApplicationController::class, 'store'])->name('application.store');
Route::post('/applications/certificate/store', [ApplicationController::class, 'storeCertificate'])->name('certificate.store');
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
Route::resource('digitalContent',DigitalContentController::class);
Route::get('/dashboard',[DashboardController::class,'dashboard']);
Route::get('/applications/list',[ApplicationController::class,'index'])->name('application.index');
Route::get('/applications/edit/{application}',[ApplicationController::class,'edit'])->name('application.edit');
Route::post('/applications/update/{application}',[ApplicationController::class,'update'])->name('application.update');
Route::get('/applications/pdf/{application}',[ApplicationController::class,'pdf'])->name('application.pdf');
Route::post('/applications/status/update/{applicationStatus}',[ApplicationController::class,'statusUpdate'])->name('application.statusUpdate');
Route::get('/applications/pdf2/{application}',[ApplicationController::class,'pdf2'])->name('application.pdf2');
Route::get('/certificates',[ApplicationController::class,'certificates'])->name('certificate.index');
    });
// Route::resource('application','App\Http\Controllers\HelprequestController');
Route::get('applicationreport/{id}','App\Http\Controllers\ReportController@applicationreport');

Route::get('/','App\Http\Controllers\DashboardController@index');
Route::group(['middleware' => '\App\Http\Middleware\CheckLoggedIn'], function () {


/*===== User ======= */

Route::get('schools','App\Http\Controllers\UserController@getSchoolList');
Route::get('logout','App\Http\Controllers\AuthController@logout');


Route::resource('students','App\Http\Controllers\StudentController');

Route::get('student/edit/{id}','App\Http\Controllers\StudentController@edit');
Route::resource('studenthealth','App\Http\Controllers\StudentHealthController');

Route::get('individual','App\Http\Controllers\ReportController@individual');
Route::get('pdayreport','App\Http\Controllers\ReportController@pdayreport');
Route::get('categoryreport','App\Http\Controllers\ReportController@categoryreport');

Route::get('schoollist','App\Http\Controllers\ExtraController@schoollist');

Route::get('stdquery','App\Http\Controllers\SqlQueryGenController@stdquery');

Route::post('individualpdf','App\Http\Controllers\ReportController@individualpdf');

Route::post('catwisereport','App\Http\Controllers\ReportController@catwisereport');

Route::post('feedback','App\Http\Controllers\HelprequestController@feedback');
Route::post('refer','App\Http\Controllers\HelprequestController@refer');
Route::post('deleter','App\Http\Controllers\HelprequestController@deleter');


///New Report Routes
// Route::get('danger-zone',[HealthReportController::class,'dangerZone'])->name('danger-zone');
// Route::post('danger-zone-list',[HealthReportController::class,'dangerZoneList'])->name('report.danger-zone');
// Route::get('/school/{id}', [HealthReportController::class, 'schoolList']);
// Route::get('student/individual', [HealthReportController::class, 'student'])->name('student.index');
// Route::get('/report', [HealthReportController::class, 'reportShow'])->name('report.view');
// Route::get('/upazila', [HealthReportController::class, 'upazilaShow'])->name('upazila.view');
// Route::get('/calendar', [HealthReportController::class, 'calendarShow'])->name('calendar.view');
// Route::get('/school', [HealthReportController::class, 'schoolShow'])->name('school.view');
// Route::get('/age', [HealthReportController::class, 'ageShow'])->name('age.view');
// Route::post('graph', [HealthReportController::class, 'graphReport'])->name('graph.report');
// Route::post('upazila', [HealthReportController::class, 'upazilaReport'])->name('upazila.report');
// Route::post('calendar', [HealthReportController::class, 'calendarReport'])->name('calendar.report');
// Route::post('age', [HealthReportController::class, 'ageReport'])->name('age.report');
// Route::post('school', [HealthReportController::class, 'schoolReport'])->name('school.report');
// Route::get('chart',[ChartController::class,'index']);
// Route::post('student/report', [HealthReportController::class, 'report'])->name('student.report');
// Route::get('area/danger',[HealthReportController::class,'areaDanger'])->name('areaDanger.view');
// Route::get('age/danger',[HealthReportController::class,'ageDanger'])->name('ageDanger.view');
// Route::get('school/danger/view',[HealthReportController::class,'schoolDanger'])->name('schoolDanger.view');
// Route::post('area/danger/report',[HealthReportController::class,'areaDangerReport'])->name('areaDanger.report');
// Route::post('age/danger/report',[HealthReportController::class,'ageDangerReport'])->name('ageDanger.report');
// Route::post('school/danger/report',[HealthReportController::class,'schoolDangerReport'])->name('schoolDanger.report');
});
//end


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
