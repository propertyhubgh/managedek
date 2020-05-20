<?php

    Route::GET('/home', 'AdminController@index')->name('admin.home');
    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', 'AdminController@changePassword');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');
    Route::get('/me', 'AdminController@me')->name('admin.me');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

    // active status
    Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
    Route::delete('activation/{admin}', 'ActivationController@deactivate');
    Route::resource('permission', 'PermissionController');
//task
    Route::get('/task','\App\Http\Controllers\TaskController@index')->name('task.index');
    Route::get('/task/create','\App\Http\Controllers\TaskController@create')->name('task.create');
    Route::get('/task/edit/{id}','\App\Http\Controllers\TaskController@edit')->name('task.edit');

    Route::post('/task','\App\Http\Controllers\TaskController@store')->name('task.store');
    Route::put('/task/update/{id}','\App\Http\Controllers\TaskController@update')->name('task.update');
    Route::delete('/task/{id}','\App\Http\Controllers\TaskController@destroy')->name('task.destroy');

    //idea
    Route::get('/idea','\App\Http\Controllers\AdminIdeaController@index')->name('ideas.index');
    Route::get('/idea/create','\App\Http\Controllers\AdminIdeaController@create')->name('ideas.create');
    Route::post('/idea','\App\Http\Controllers\AdminIdeaController@store')->name('ideas.store');

    //OrderType
Route::get('/ordertypes','\App\Http\Controllers\AdminOrderTypeController@index')->name('admin.ordertype.index');
Route::get('/ordertypes/create','\App\Http\Controllers\AdminOrderTypeController@create')->name('admin.ordertype.create');
Route::get('/ordertypes/{id}/edit','\App\Http\Controllers\AdminOrderTypeController@edit')->name('admin.ordertype.edit');
Route::post('/ordertypes','\App\Http\Controllers\AdminOrderTypeController@store')->name('admin.ordertype.store');
Route::put('/ordertypes/{id}/update','\App\Http\Controllers\AdminOrderTypeController@update')->name('admin.ordertype.update');
Route::delete('/ordertypes/{id}','\App\Http\Controllers\AdminOrderTypeController@destroy')->name('admin.ordertype.delete');

//Customer
Route::get('/customers','\App\Http\Controllers\AdminCustomerController@index')->name('admin.customer.index');
Route::get('/customers/create','\App\Http\Controllers\AdminCustomerController@create')->name('admin.customer.create');
Route::get('/customers/{id}/edit','\App\Http\Controllers\AdminCustomerController@edit')->name('admin.customer.edit');

Route::post('/customers','\App\Http\Controllers\AdminCustomerController@store')->name('admin.customer.store');
Route::put('/customers/{id}/update','\App\Http\Controllers\AdminCustomerController@update')->name('admin.customer.update');
Route::delete('/customers/{id}','\App\Http\Controllers\AdminCustomerController@destroy')->name('admin.customer.delete');

//Orders
Route::get('/orders','\App\Http\Controllers\AdminOrderController@index')->name('admin.orders.index');
Route::get('/orders/create','\App\Http\Controllers\AdminOrderController@create')->name('admin.orders.create');
Route::get('/orders/{id}/edit','\App\Http\Controllers\AdminOrderController@edit')->name('admin.orders.edit');

Route::post('/orders','\App\Http\Controllers\AdminOrderController@store')->name('admin.orders.store');

Route::put('/orders/{id}/update','\App\Http\Controllers\AdminOrderController@update')->name('admin.orders.update');
Route::delete('/orders/{id}','\App\Http\Controllers\AdminOrderController@destroy')->name('admin.orders.delete');

//Accounts
Route::get('/accounts','\App\Http\Controllers\AdminAccountController@index')->name('admin.accounts.index');
Route::get('/accounts/create','\App\Http\Controllers\AdminAccountController@create')->name('admin.accounts.create');
Route::get('/accounts/{id}/edit','\App\Http\Controllers\AdminAccountController@edit')->name('admin.accounts.edit');

Route::post('/accounts','\App\Http\Controllers\AdminAccountController@store')->name('admin.accounts.store');

Route::put('/accounts/{id}/update','\App\Http\Controllers\AdminAccountController@update')->name('admin.accounts.update');
Route::delete('/accounts/{id}','\App\Http\Controllers\AdminAccountController@destroy')->name('admin.accounts.delete');

//payments
Route::get('/payments','\App\Http\Controllers\AdminPaymentController@index')->name('admin.payments.index');
Route::get('/payments/create','\App\Http\Controllers\AdminPaymentController@create')->name('admin.payments.create');
Route::get('/payments/{id}/edit','\App\Http\Controllers\AdminPaymentController@edit')->name('admin.payments.edit');

Route::post('/payments','\App\Http\Controllers\AdminPaymentController@store')->name('admin.payments.store');

Route::put('/payments/{id}/update','\App\Http\Controllers\AdminPaymentController@update')->name('admin.payments.update');
Route::delete('/payments/{id}','\App\Http\Controllers\AdminPaymentController@destroy')->name('admin.payments.delete');

    Route::fallback(function () {
        return abort(404);
    });
