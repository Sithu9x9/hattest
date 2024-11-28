<?php

use App\Http\Controllers\Frontend\AboutCompanyController;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\AnnualReportController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\CorporateInformationController;
use App\Http\Controllers\Frontend\FinancialReportController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LocalizationController;
use App\Http\Controllers\Frontend\MeetingMinuteController;
use App\Http\Controllers\Frontend\ProductPageController;
use App\Http\Controllers\Frontend\StockInformationController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get("locale/{locale}", LocalizationController::class)->name('language');
Route::view('/partners', 'frontend.pages.partners')->name('partners');

Route::get('/about', [AboutCompanyController::class, 'about'])->name('about');
Route::get('/organization-structure', [AboutCompanyController::class, 'organizationStructure'])->name('organization-structure');
Route::get('/corporate-policy', [AboutCompanyController::class, 'corporatePolicy'])->name('corporate-policy');
Route::get('/products', ProductPageController::class)->name('products.index');

Route::get('/contact', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::post('/careers/{career}/apply', [CareerController::class, 'apply'])->name('careers.apply');
Route::get('/careers/{career}', [CareerController::class, 'show'])->name('careers.show');

Route::get('/corporate-information', [CorporateInformationController::class, 'index'])->name('corporate-information.index');
Route::get('/corporate-information/{corporateInformation}', [CorporateInformationController::class, 'show'])->name('corporate-information.show');
Route::get('/corporate-information-posts/{corporateInformationPost}', [CorporateInformationController::class, 'showPost'])->name('corporate-information-posts.show');

Route::get('/stock-information', [StockInformationController::class, 'index'])->name('stock-information.index');
Route::get('/stock-information/{stockInformation}', [StockInformationController::class, 'show'])->name('stock-information.show');
Route::get('/stock-information-posts/{stockInformationPost}', [StockInformationController::class, 'showPost'])->name('stock-information-posts.show');


Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activity-posts/{activityPost}', [ActivityController::class, 'showPost'])->name('activity-posts.show');


Route::get('/financial-reports', [FinancialReportController::class, 'index'])->name('financial-reports.index');
Route::get('/financial-reports/{financialReport}/download', [FinancialReportController::class, 'download'])->name('financial-reports.download');

Route::get('/annual-reports', [AnnualReportController::class, 'index'])->name('annual-reports.index');
Route::get('/annual-reports/{annualReport}/download', [AnnualReportController::class, 'download'])->name('annual-reports.download');

Route::get('/meeting-minutes', [MeetingMinuteController::class, 'index'])->name('meeting-minutes.index');
Route::get('/meeting-minutes/{meetingMinute}/download', [MeetingMinuteController::class, 'download'])->name('meeting-minutes.download');

Route::get('privacy', 'HomeController@privacy')->name('privacy');

//team routes...
// Route::get('/Board&CEO','HomeController@team')->name('team');

//career routes...
Route::get('/career', 'HomeController@career')->name('career');
Route::get('/career/detail/{id}', 'HomeController@CareerDetail')->name('career.detail');
Route::post('/apply-job', 'HomeController@applyJob')->name('career.apply');

//investment_relations routes
Route::get('/investment_relations', 'HomeController@investment')->name('investment');
