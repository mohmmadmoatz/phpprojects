<?php

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



// Pats Routes
Route::get('/api/pats/{id?}','PatController@disAll');

Route::get('/api/pats/show/{id?}','PatController@show');

Route::post('/api/pats','PatController@store');

Route::post('/api/pats/{id?}','PatController@update');

Route::delete('/api/pats/{id?}','PatController@destroy');

/// Emp Routes
Route::get('/api/emps/{id?}','EmpController@disAll');

Route::get('/api/emps/show/{id?}','EmpController@show');

Route::post('/api/emps','EmpController@store');

Route::post('/api/emps/{id?}','EmpController@update');

Route::delete('/api/emps/{id?}','EmpController@destroy');

//Branch Routes
Route::get('/api/branch/{id?}','BranchController@disAll');

Route::get('/api/branch/show/{id?}','BranchController@show');

Route::post('/api/branch','BranchController@store');

Route::post('/api/branch/{id?}','BranchController@update');

Route::delete('/api/branch/{id?}','BranchController@destroy');

//Cln Routes

Route::get('/api/cln/{id?}','ClnController@disAll');

Route::get('/api/cln/show/{id?}','ClnController@show');

Route::post('/api/cln','ClnController@store');

Route::post('/api/cln/{id?}','ClnController@update');

Route::delete('/api/cln/{id?}','ClnController@destroy');

// Cln per Routes

Route::get('/api/clnper/{id?}','clnperController@dis_per');

Route::get('/api/clnper/show/{id?}','clnperController@show');

Route::post('/api/clnper','clnperController@store');

Route::post('/api/clnper/{id?}','clnperController@update');

Route::delete('/api/clnper/{id?}','clnperController@destroy');


// Doc  Routes

Route::get('/api/doctor/{id?}','DocController@disAll');

Route::get('/api/doctor/show/{id?}','DocController@show');

Route::post('/api/doctor','DocController@store');

Route::post('/api/doctor/{id?}','DocController@update');

Route::delete('/api/doctor/{id?}','DocController@destroy');

//Booking Routes

Route::get('/api/appt/{id?}/{docid}/{date}','apptcontroller@getAppt');

Route::get('/api/appt/show/{id?}','apptcontroller@show');

Route::post('/api/appt','apptcontroller@store');

Route::post('/api/appt/{id?}','apptcontroller@update');

Route::delete('/api/appt/{id?}','apptcontroller@destroy');


Route::get('/addNewPat', function () {
    return view('welcome');
});




Route::get('/AddEmp', function () {
    return view('addEmp');
});


Route::get('/branchdata', function () {
    return view('branch');
});

Route::get('/addcln', function () {
    return view('addcln');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/newBook', function () {
    return view('newbook');
});

Route::get('/doctor', function () {
    return view('doctorhome');
});

Route::get('/doctordata', function () {
    return view('doctordata');
});


Route::get('/doctorPre', function () {
    return view('doctorPre');
});

Route::get('/disbank', function () {
    return view('disbank');
});

Route::get('/defineService', function () {
    return view('defineSv');
});

Route::get('/newinv', function () {
    return view('newinv');
});






Auth::routes();

Route::get('/', 'HomeController@index');
