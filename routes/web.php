<?php
Route::get('/','HomeController@index');

//coming leaving

Route::get('coming/leaving', 'ComingLeaving@index')->name('coming.leaving');
Route::get('coming/', 'ajax\AjaxController@coming');
Route::get('leaving/', 'ajax\AjaxController@leaving');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('staff/create/barecode', 'Admin\UsersController@create_barecode')->name('create.barecode');
    Route::get('staff/create/barecode', 'Admin\UsersController@create_barecode')->name('create.barecode');
    Route::get('staff/create/maps', 'Admin\UsersController@create_maps')->name('create.maps');
    Route::get('staff/leaving/coming', 'Admin\UsersController@leaving_coming')->name('leaving_coming_staff');
    Route::get('staff/leaving/coming/show', 'Admin\UsersController@leaving_coming_show')->name('leaving_coming_staff_show');
    Route::get('/staff/leavingComing', 'Admin\UsersController@leavingComingMove')->name('getMoves');
    Route::post('/staff/deleteLeavingComing', 'Admin\UsersController@deleteLeavingComingMove')->name('deleteMoves');
    Route::get('ajax/leaving', 'ajax\AjaxController@leaving')->name('ajax.leaving');
    Route::get('ajax/coming', 'ajax\AjaxController@coming')->name('ajax.coming');

    Route::get('ajax/lat/lng', 'ajax\AjaxController@lat_lng');

    Route::get('ajax/barcode/generate', 'ajax\AjaxController@br_generate');
    Route::get('ajax/rqcode/generate', 'ajax\AjaxController@rq_generate');

    Route::get('ajax/barcode/download', 'ajax\AjaxController@br_download');
    Route::get('ajax/rqcode/download', 'ajax\AjaxController@rq_download');

    Route::get('ajax/search', 'ajax\AjaxController@search');



    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('vacations', 'Admin\VacationsController');
    Route::post('vacations_mass_destroy', ['uses' => 'Admin\VacationsController@massDestroy', 'as' => 'vacations.mass_destroy']);
    Route::post('vacations_restore/{id}', ['uses' => 'Admin\VacationsController@restore', 'as' => 'vacations.restore']);
    Route::delete('vacations_perma_del/{id}', ['uses' => 'Admin\VacationsController@perma_del', 'as' => 'vacations.perma_del']);

    Route::resource('working_periods', 'Admin\WorkingPeriodsController');
    Route::post('working_periods_mass_destroy', ['uses' => 'Admin\WorkingPeriodsController@massDestroy', 'as' => 'working_periods.mass_destroy']);
    Route::post('working_periods_restore/{id}', ['uses' => 'Admin\WorkingPeriodsController@restore', 'as' => 'working_periods.restore']);
    Route::delete('working_periods_perma_del/{id}', ['uses' => 'Admin\WorkingPeriodsController@perma_del', 'as' => 'working_periods.perma_del']);

    Route::resource('assign_working_periods', 'Admin\AssignWorkingPeriodsController');
    Route::post('assign_working_period_mass_destroy', ['uses' => 'Admin\AssignWorkingPeriodsController@massDestroy', 'as' => 'assign_working_periods.mass_destroy']);

    Route::resource('assign_deps_working_periods', 'Admin\AssignDepartmentsWorkingPeriodsController');
    Route::post('assign_deps_working_period_mass_destroy', ['uses' => 'Admin\AssignDepartmentsWorkingPeriodsController@massDestroy', 'as' => 'assign_departments_working_periods.mass_destroy']);

    Route::resource('specialties', 'Admin\SpecialtiesController');
    Route::post('specialties_mass_destroy', ['uses' => 'Admin\SpecialtiesController@massDestroy', 'as' => 'specialties.mass_destroy']);
    Route::post('specialties_restore/{id}', ['uses' => 'Admin\SpecialtiesController@restore', 'as' => 'specialties.restore']);
    Route::delete('specialties_perma_del/{id}', ['uses' => 'Admin\SpecialtiesController@perma_del', 'as' => 'specialties.perma_del']);
    Route::resource('departments', 'Admin\DepartmentsController');
    //position
    Route::get('position', 'PositionController@index');
    Route::get('position/create', 'PositionController@create');
    Route::get('position/{id}/edit', 'PositionController@edit');
    Route::post('position/{id}/update', 'PositionController@update');
    Route::get('position/{id}/delete', 'PositionController@delete');
    Route::post('position/store', 'PositionController@store');
    //position

    Route::post('departments_mass_destroy', ['uses' => 'Admin\DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);
    Route::post('departments_restore/{id}', ['uses' => 'Admin\DepartmentsController@restore', 'as' => 'departments.restore']);
    Route::delete('departments_perma_del/{id}', ['uses' => 'Admin\DepartmentsController@perma_del', 'as' => 'departments.perma_del']);

    Route::resource('degrees', 'Admin\DegreesController');
    Route::post('degrees_mass_destroy', ['uses' => 'Admin\DegreesController@massDestroy', 'as' => 'degrees.mass_destroy']);
    Route::post('degrees_restore/{id}', ['uses' => 'Admin\DegreesController@restore', 'as' => 'degrees.restore']);
    Route::delete('degrees_perma_del/{id}', ['uses' => 'Admin\DegreesController@perma_del', 'as' => 'degrees.perma_del']);

    Route::resource('courses', 'Admin\CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
    Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);

    Route::resource('experiences', 'Admin\ExperiencesController');
    Route::post('experiences_mass_destroy', ['uses' => 'Admin\ExperiencesController@massDestroy', 'as' => 'experiences.mass_destroy']);
    Route::post('experiences_restore/{id}', ['uses' => 'Admin\ExperiencesController@restore', 'as' => 'experiences.restore']);
    Route::delete('experiences_perma_del/{id}', ['uses' => 'Admin\ExperiencesController@perma_del', 'as' => 'experiences.perma_del']);

    Route::group(['prefix' => 'users/{id}', 'as' => 'users.'], function () {
        Route::resource('usedVacations', 'Admin\UsedVacationsController');
        Route::post('usedVacations_mass_destroy', ['uses' => 'Admin\UsedVacationsController@massDestroy', 'as' => 'usedVacations.mass_destroy']);
        Route::post('usedVacations_restore/{vacationId}', ['uses' => 'Admin\UsedVacationsController@restore', 'as' => 'usedVacations.restore']);
        Route::delete('usedVacations_perma_del/{vacationId}', ['uses' => 'Admin\UsedVacationsController@perma_del', 'as' => 'usedVacations.perma_del']);

        Route::get('pointings', ['uses' => 'Admin\PointingsController@index', 'as' => 'pointings.index']);
    });

    Route::resource('pointings', 'Admin\PointingsController')->except(['index']);

    // pointing files
    Route::get('pointing_files', 'Admin\PointingFilesController@index')->name('pointing_files.index');
    Route::get('pointing_files/create', 'Admin\PointingFilesController@create')->name('pointing_files.create');
    Route::post('pointing_files', 'Admin\PointingFilesController@store')->name('pointing_files.store');

    // Aids
    Route::resource('aids', 'Admin\AidsController');
    Route::post('aids_mass_destroy', ['uses' => 'Admin\AidsController@massDestroy', 'as' => 'aids.mass_destroy']);

    // Rest Days
    Route::resource('rest_days', 'Admin\RestDaysController');
    Route::post('rest_days_mass_destroy', ['uses' => 'Admin\RestDaysController@massDestroy', 'as' => 'rest_days.mass_destroy']);

    // Aid User
    Route::resource('assign_aids', 'Admin\AssignAidUserController');

    // Aid Department
    Route::resource('assign_aid_deps', 'Admin\AssignAidDepartmentController');

    // Rest Day User
    Route::resource('assign_rest_days', 'Admin\AssignRestDayUserController');

    // Rest Day Department
    Route::resource('assign_dep_rest_days', 'Admin\AssignDepartmentRestDayController');

    /* Reports */
    Route::group(['namespace' => 'Admin\Reports', 'prefix' => 'reports', 'as' => 'reports.'], function () {
        // Vacation Reports
        Route::get('vacations', [
            'uses' => 'VacationsController@index',
            'as' => 'vacations.index'
        ]);
        // Users Reports
        Route::get('users', [
            'uses' => 'UsersController@index',
            'as' => 'users.index'
        ]);
        // Pointings Reports
        Route::get('pointings', [
            'uses' => 'PointingsController@index',
            'as' => 'pointings.index'
        ]);
        Route::get('pointings/{id}', [
            'uses' => 'PointingsController@show',
            'as' => 'pointings.show'
        ]);
    });
    // vacations requests
    Route::post('vacation/request','Admin\UsersController@makeRequest')->name('make_vac_request');
    Route::post('vacation/request/accept','Admin\UsersController@acceptReq')->name('accept_vac_request');
    Route::post('vacation/request/refuse','Admin\UsersController@refuseReq')->name('refuse_vac_request');
});
