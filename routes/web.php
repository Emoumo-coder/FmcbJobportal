<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\SaveListingController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Candidate\ApplicationController;
use App\Http\Controllers\candidate\CandidateProfileController;
use App\Http\Controllers\Employer\ListingApplicationController;
use App\Http\Controllers\Candidate\CandidateApplyListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $isHomePage = request()->is('/');
    return view('index')->with('isHomePage', $isHomePage);
})->name('index');



Auth::routes();

Route::get('/listings/manage', [ListingsController::class, 'manage'])->name('listings.manage');
Route::post('/listings/change-status', [ListingsController::class, 'changeStatus'])->name('listings.change-status');
Route::get('/latest-listings', [ListingsController::class, 'getLatestListings'])->name('latest-listings');
// Route::delete('/listings/{$id}', [ListingsController::class, 'destroy'])->name('listings.destroy');
Route::resource('/listings', ListingsController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/candidate/save-listing/index', [SaveListingController::class, 'index'])->name('candidate.save-listing.index');
    Route::post('/candidate/save-listing', [SaveListingController::class, 'save'])->name('candidate.save-listing');
    Route::delete('/candidate/save-listing/delete', [SaveListingController::class, 'delete'])->name('candidate.save-listing.delete');
});

Route::prefix('/candidate')->middleware(['auth'])->group(function () {
    Route::resource('apply-listings', CandidateApplyListingController::class);
    Route::get('/profile/edit', [CandidateProfileController::class, 'edit'])->name('candidate.profile.edit');
    Route::put('/profile/update', [CandidateProfileController::class, 'update'])->name('candidate.profile.update');
    Route::post('/profile/skills', [CandidateProfileController::class, 'addSkill'])->name('candidate.profile.skills.add');
    Route::delete('/profile/skills/{id}', [CandidateProfileController::class, 'deleteSkill'])->name('candidate.profile.skills.delete');
    Route::post('/profile/experiences', [CandidateProfileController::class, 'addExperience'])->name('candidate.profile.experiences.add');
    Route::put('/profile/experiences/{id}', [CandidateProfileController::class, 'updateExperience'])->name('candidate.profile.experiences.update');
    Route::delete('/profile/experiences/{id}', [CandidateProfileController::class, 'deleteExperience'])->name('candidate.profile.experiences.delete');
    Route::post('/profile/education', [CandidateProfileController::class, 'addEducation'])->name('candidate.profile.education.add');
    Route::put('/profile/education/{id}', [CandidateProfileController::class, 'updateEducation'])->name('candidate.profile.education.update');
    Route::delete('/profile/education/{id}', [CandidateProfileController::class, 'deleteEducation'])->name('candidate.profile.education.delete');
    Route::put('/password/change/{id}', [CandidateProfileController::class, 'deleteEducation'])->name('candidate.profile.education.delete');

    // Application//
    Route::get('/applications', [ApplicationController::class, 'index'])->name('candidate.applications.index');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('candidate.applications.show');
    
    // Inbox
    Route::get('/inbox', [InboxController::class, 'index'])->name('candidate.inbox.index')->middleware('isUser');
});

Route::get('/candidate/{username}', [CandidateProfileController::class, 'show'])->name('candidate.profile.show');

Route::prefix('/employer')->middleware(['auth'])->group(function () {
    Route::get('/applications', [ListingApplicationController::class, 'index'])->name('employer.applications.index');
    Route::get('/applications/{application}', [ListingApplicationController::class, 'show'])->name('employer.applications.show');
    Route::post('/applications/change-status', [ListingApplicationController::class, 'changeStatus'])->name('employer.applications.change-status');
    Route::delete('/applications/{application}', [ListingApplicationController::class, 'destroy'])->name('employer.applications.destroy');
    Route::post('/applications/bulk', [ListingApplicationController::class, 'bulkAction'])->name('employer.applicatons.bulk');

    /************
    |---- Profile ---|
    *************/
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('employer.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('employer.profile.update');
    Route::post('/profile/social_link', [ProfileController::class, 'addSocialLink'])->name('employer.profile.social_link');
    Route::delete('/profile/social_link/{social_link}', [ProfileController::class, 'deleteSocialLink'])->name('employer.profile.social_link.delete');
});

Route::get('/employer/{username}', [ProfileController::class, 'show'])->name('employer.profile.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test_sendmail', [App\Http\Controllers\HomeController::class, 'contact']);
Route::get('/company/profile', [CompanyProfileController::class, 'show'])->name('company.profile');


/***********************
 * Admin Routes
 ***********************/
Route::prefix('/manage')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/company/profile/edit', [CompanyProfileController::class, 'edit'])->name('manage.company.profile.edit');
    Route::put('/company/profile/update', [CompanyProfileController::class, 'update'])->name('manage.company.profile.update');
    Route::put('/company/gallery/update_caption', [CompanyProfileController::class, 'updateCaption'])->name('manage.company.gallery.update_caption');
    Route::put('/company/gallery/enable_diable', [CompanyProfileController::class, 'enableDisable'])->name('manage.company.gallery.enable_diable');
    Route::put('/company/gallery/update_photo', [CompanyProfileController::class, 'updatePhoto'])->name('manage.company.gallery.update_photo');
    Route::put('/company/profile/update_more_detail', [CompanyProfileController::class, 'updateMoredetail'])->name('manage.company.profile.update_more_detail');
});

Route::get('/get-inboxes', [InboxController::class, 'getInboxes'])
    ->name('get-inboxes')
    ->middleware('auth');
Route::get('/fetch-new-messages', [InboxController::class, 'fetchNewMessages'])
    ->name('fetch-new-messages')
    ->middleware('auth');
Route::post('/send-inbox', [InboxController::class, 'sendInbox'])
    ->name('send-inbox')
    ->middleware('auth');
Route::get('/message/item', function () {
        return view('partials.__message_item', ['message' => request()->input('message')]);
    })->name('message.item');