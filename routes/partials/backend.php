<?php

use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Auth::routes();

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('sliders', SliderController::class);
});

// Authentication Routes...
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Change Password Routes...
Route::get('admin/change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('admin/change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes...
Route::get('admin/register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('admin/register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);
// Route::get('/home', 'HomeController@index')->name('home');

// Admin routes...
Route::get('/admin/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

// Activities routes...
Route::get('/admin/activities', 'Admin\ActivitiesController@index')->name('admin.act.index');
Route::post('/admin/activities/store', 'Admin\ActivitiesController@store')->name('admin.act.store');
Route::post('/admin/activities/update', 'Admin\ActivitiesController@update')->name('admin.act.update');
Route::delete('/admin/activities/destroy/{id}', 'Admin\ActivitiesController@destroy')->name('admin.act.destroy');

//slider
Route::get('/admin/slider', 'Admin\SliderController@index')->name('admin.slider.index');
Route::post('/admin/slider/store', 'Admin\SliderController@store')->name('admin.slider.store');
Route::post('/admin/slider/update', 'Admin\SliderController@update')->name('admin.slider.update');
Route::delete('/admin/slider/destroy/{id}', 'Admin\SliderController@destroy')->name('admin.slider.destroy');

// Activities posts routes...
Route::get('/admin/activities/posts/{act_id}', 'Admin\ActivitiesPostController@index')->name('admin.act-post.index');
Route::get('/admin/activities/posts/create/{act_id}', 'Admin\ActivitiesPostController@create')->name('admin.act-post.create');
Route::post('/admin/activities/upload-files', 'Admin\ActivitiesPostController@upload')->name('upload-files');
Route::post('/admin/activities/posts/store', 'Admin\ActivitiesPostController@store')->name('admin.act-post.store');
Route::get('/admin/activities/posts/edit/{act_id}/{act_post_id}', 'Admin\ActivitiesPostController@edit')->name('admin.act-post.edit');
Route::put('/admin/activities/posts/update/{act_post_id}', 'Admin\ActivitiesPostController@update')->name('admin.act-post.update');
Route::post('/admin/activities/update-upload-files/{act_post_id}', 'Admin\ActivitiesPostController@updateupload')->name('update-upload-files');
Route::delete('/admin/activities/posts/destroy/{act_post_id}', 'Admin\ActivitiesPostController@destroy')->name('admin.act-post.destroy');

// Activities posts images routes...
Route::get('/admin/activities/image/destroy/{image_id}', 'Admin\ActivitiesPostController@imageDestroy')->name('admin.image.destroy');
Route::get('/admin/activities/allimage/destroy/{act_post_id}', 'Admin\ActivitiesPostController@allimageDestroy')->name('admin.allimage.destroy');

// Corporate Information Routes...
Route::get('/admin/corporate-information', 'Admin\CorporateInformationController@index')->name('admin.corporate.index');
Route::post('/admin/corporate-information/store', 'Admin\CorporateInformationController@store')->name('admin.corporate.store');
Route::post('/admin/corporate-information/update', 'Admin\CorporateInformationController@update')->name('admin.corporate.update');
Route::delete('/admin/corporate-information/destroy/{id}', 'Admin\CorporateInformationController@destroy')->name('admin.corporate.destroy');

// Corporate Information posts routes...
Route::get('/admin/corporate-information/posts/{cor_id}', 'Admin\CorporateInformationPostController@index')->name('admin.corporate-post.index');
Route::get('/admin/corporate-information/posts/create/{cor_id}', 'Admin\CorporateInformationPostController@create')->name('admin.corporate-post.create');
Route::post('/admin/corporate-information/upload-files', 'Admin\CorporateInformationPostController@upload')->name('corporate-upload-files');
Route::post('/admin/corporate-information/posts/store', 'Admin\CorporateInformationPostController@store')->name('admin.corporate-post.store');
Route::get('/admin/corporate-information/posts/edit/{cor_id}/{cor_post_id}', 'Admin\CorporateInformationPostController@edit')->name('admin.corporate-post.edit');
Route::put('/admin/corporate-information/posts/update/{cor_post_id}', 'Admin\CorporateInformationPostController@update')->name('admin.corporate-post.update');
Route::post('/admin/corporate-information/update-upload-files/{cor_post_id}', 'Admin\CorporateInformationPostController@updateupload')->name('corporate-update-upload-files');
Route::delete('/admin/corporate-information/posts/destroy/{cor_post_id}', 'Admin\CorporateInformationPostController@destroy')->name('admin.corporate-post.destroy');

// Corporate Information posts images routes...
Route::get('/admin/corporate-information/image/destroy/{image_id}', 'Admin\CorporateInformationPostController@imageDestroy')->name('admin.corporate.image.destroy');
Route::get('/admin/corporate-information/allimage/destroy/{cor_post_id}', 'Admin\CorporateInformationPostController@allimageDestroy')->name('admin.corporate.allimage.destroy');

// Stock Routes...
Route::get('/admin/stock-information', 'Admin\StockController@index')->name('admin.stock.index');
Route::post('/admin/stock-information/store', 'Admin\StockController@store')->name('admin.stock.store');
Route::post('/admin/stock-information/update', 'Admin\StockController@update')->name('admin.stock.update');
Route::delete('/admin/stock-information/destroy/{id}', 'Admin\StockController@destroy')->name('admin.stock.destroy');

// Stock posts routes...
Route::get('/admin/stock-information/posts/{stk_id}', 'Admin\StockPostController@index')->name('admin.stock-post.index');
Route::get('/admin/stock-information/posts/create/{stk_id}', 'Admin\StockPostController@create')->name('admin.stock-post.create');
Route::post('/admin/stock-information/upload-files', 'Admin\StockPostController@upload')->name('stock-upload-files');
Route::post('/admin/stock-information/posts/store', 'Admin\StockPostController@store')->name('admin.stock-post.store');
Route::get('/admin/stock-information/posts/edit/{stk_id}/{stk_post_id}', 'Admin\StockPostController@edit')->name('admin.stock-post.edit');
Route::put('/admin/stock-information/posts/update/{stk_post_id}', 'Admin\StockPostController@update')->name('admin.stock-post.update');
Route::post('/admin/stock-information/update-upload-files/{stk_post_id}', 'Admin\StockPostController@updateupload')->name('stock-update-upload-files');
Route::delete('/admin/stock-information/posts/destroy/{stk_post_id}', 'Admin\StockPostController@destroy')->name('admin.stock-post.destroy');

// Stock posts images routes...
Route::get('/admin/stock-information/image/destroy/{image_id}', 'Admin\StockPostController@imageDestroy')->name('admin.stock.image.destroy');
Route::get('/admin/stock-information/allimage/destroy/{stk_post_id}', 'Admin\StockPostController@allimageDestroy')->name('admin.stock.allimage.destroy');

// Annual Report Routes...
Route::get('/admin/annual_reports', 'Admin\AnnualReportController@index')->name('admin.annual.index');
Route::post('/admin/annual_reports/store', 'Admin\AnnualReportController@store')->name('admin.annual.store');
Route::post('/admin/annual_reports/update', 'Admin\AnnualReportController@update')->name('admin.annual.update');
Route::delete('/admin/annual_reports/destroy/{id}', 'Admin\AnnualReportController@destroy')->name('admin.annual.destroy');

// Financial Report Routes...
Route::get('/admin/financial_reports', 'Admin\FinancialReportController@index')->name('admin.financial.index');
Route::post('/admin/financial_reports/store', 'Admin\FinancialReportController@store')->name('admin.financial.store');
Route::post('/admin/financial_reports/update', 'Admin\FinancialReportController@update')->name('admin.financial.update');
Route::delete('/admin/financial_reports/destroy/{id}', 'Admin\FinancialReportController@destroy')->name('admin.financial.destroy');

// Meeting Minute Routes...
Route::get('/admin/meeting-minute', 'Admin\MeetingMinuteController@index')->name('admin.meeting.index');
Route::post('/admin/meeting-minute/store', 'Admin\MeetingMinuteController@store')->name('admin.meeting.store');
Route::post('/admin/meeting-minute/update', 'Admin\MeetingMinuteController@update')->name('admin.meeting.update');
Route::delete('/admin/meeting-minute/destroy/{id}', 'Admin\MeetingMinuteController@destroy')->name('admin.meeting.destroy');

// Career routes...
Route::get('/admin/career', 'Admin\CareerController@index')->name('admin.career.index');
Route::get('/admin/career/create', 'Admin\CareerController@create')->name('admin.career.create');
Route::post('/admin/career/store', 'Admin\CareerController@store')->name('admin.career.store');
Route::get('/admin/career/edit/{id}', 'Admin\CareerController@edit')->name('admin.career.edit');
Route::get('/admin/career/show/{id}', 'Admin\CareerController@show')->name('admin.career.show');
Route::put('/admin/career/update/{id}', 'Admin\CareerController@update')->name('admin.career.update');
Route::delete('/admin/career/destroy/{id}', 'Admin\CareerController@destroy')->name('admin.career.destroy');


// //language switch routes...
