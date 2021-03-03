<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//Product section route group
Route::group(['namespace' => 'App\Http\Controllers\Admin','middleware' => 'is_admin',], function () {

    // Department route group
    Route::group(['prefix' => 'department'], function () {
        Route::get('/', 'DepartmentController@index')->name('department');
        Route::post('store', 'DepartmentController@store')->name('department.store');
        Route::get('edit/{id}', 'DepartmentController@edit')->name('edit.department');
        Route::post('update', 'DepartmentController@update')->name('department.update');
        Route::delete('delete/{id}', 'DepartmentController@delete')->name('department.delete');
    }); 

    // Division route group
    Route::group(['prefix' => 'division'], function () {
        Route::get('/', 'DivisionController@index')->name('division');
        Route::post('store', 'DivisionController@store')->name('division.store');
        Route::get('edit/{id}', 'DivisionController@edit');
        Route::get('/get', 'DivisionController@getDepartment')->name('get.department');
        Route::post('update', 'DivisionController@update')->name('division.update');
        Route::delete('delete/{id}', 'DivisionController@delete')->name('division.delete');
    });   

    //Position route group 
     Route::group(['prefix' => 'position'], function () {
        Route::get('/', 'PositionController@index')->name('position');
        Route::post('store', 'PositionController@store')->name('position.store');
        Route::get('edit/{id}', 'PositionController@edit');
        Route::post('update', 'PositionController@update')->name('position.update');
        Route::delete('delete/{id}', 'PositionController@delete')->name('position.delete');
    }); 

    //User/Employee route group 
     Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'UserController@index')->name('employee');
        Route::get('/create', 'UserController@create')->name('employee.create');
        Route::post('store', 'UserController@store')->name('employee.store');
        Route::get('view/{id}', 'UserController@view');
        // Route::post('update', 'PositionController@update')->name('position.update');
        Route::delete('delete/{id}', 'UserController@delete')->name('employee.delete');
    }); 
    
    //User/Attendance route group 
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/', 'AttendanceController@index')->name('attendance');
        Route::get('/create', 'AttendanceController@create')->name('attendance.create');
        Route::post('store', 'AttendanceController@store')->name('attendance.store');
        Route::get('view/{id}', 'AttendanceController@view');
        // Route::post('update', 'PositionController@update')->name('position.update');
        Route::delete('delete/{id}', 'AttendanceController@delete')->name('employee.delete');
    });
    
    //Award route group 
     Route::group(['prefix' => 'award'], function () {
        Route::get('/', 'AwardController@index')->name('award');
        Route::get('/search', 'AwardController@employeeSearch')->name('employee.search');
       	Route::post('store', 'AwardController@store')->name('award.store');
       	Route::delete('delete/{id}', 'AwardController@delete')->name('award.delete');
       	Route::get('/get', 'AwardController@getUser')->name('get.user');
       	Route::get('edit/{id}', 'AwardController@edit');
    });

    



    

});



