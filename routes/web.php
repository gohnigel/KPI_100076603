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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Knowledge profile module
Route::view('/profile', 'profile.index')->middleware('auth');
Route::resource('/persInfo', 'PersonalInformationController')->middleware('auth');
Route::resource('/projects', 'ProjectController')->middleware('auth');
Route::resource('/publications', 'PublicationController')->middleware('auth');
Route::resource('/intProp', 'IntellectualPropertyController')->middleware('auth');
Route::resource('/supervisions', 'SupervisionController')->middleware('auth');
Route::resource('/teachings', 'TeachingController')->middleware('auth');
Route::resource('/consultations', 'ConsultationController')->middleware('auth');
Route::resource('/comSer', 'CommunityServiceController')->middleware('auth');
Route::resource('/pastAgencies', 'PastAgencyController')->middleware('auth');

// Object module
Route::resource('/objectAdmin', 'ObjectAdminController')->middleware('auth');

// Approve module
Route::get('/approve', 'ApproveController@index')->middleware('auth');
Route::get('/approve/{user}', 'ApproveController@profile')->middleware('auth');

Route::get('/approvePersInfo/{user}', 'ApprovePersonalInformationController@index')->middleware('auth');
Route::get('/approvePersInfo/{user}/{persInfo}/approve', 'ApprovePersonalInformationController@approve')->middleware('auth');
Route::put('/approvePersInfo/{user}/{persInfo}', 'ApprovePersonalInformationController@update')->middleware('auth');

Route::get('/approveProjects/{user}', 'ApproveProjectController@index')->middleware('auth');
Route::get('/approveProjects/{user}/{project}', 'ApproveProjectController@show')->middleware('auth');
Route::get('/approveProjects/{user}/{project}/approve', 'ApproveProjectController@approve')->middleware('auth');
Route::put('/approveProjects/{user}/{project}', 'ApproveProjectController@update')->middleware('auth');

Route::get('/approvePublications/{user}', 'ApprovePublicationController@index')->middleware('auth');
Route::get('/approvePublications/{user}/{publication}', 'ApprovePublicationController@show')->middleware('auth');
Route::get('/approvePublications/{user}/{publication}/approve', 'ApprovePublicationController@approve')->middleware('auth');
Route::put('/approvePublications/{user}/{publication}', 'ApprovePublicationController@update')->middleware('auth');

Route::get('/approveIntProp/{user}', 'ApproveIntellectualPropertyController@index')->middleware('auth');
Route::get('/approveIntProp/{user}/{intProp}', 'ApproveIntellectualPropertyController@show')->middleware('auth');
Route::get('/approveIntProp/{user}/{intProp}/approve', 'ApproveIntellectualPropertyController@approve')->middleware('auth');
Route::put('/approveIntProp/{user}/{intProp}', 'ApproveIntellectualPropertyController@update')->middleware('auth');

Route::get('/approveSupervisions/{user}', 'ApproveSupervisionController@index')->middleware('auth');
Route::get('/approveSupervisions/{user}/{supervision}', 'ApproveSupervisionController@show')->middleware('auth');
Route::get('/approveSupervisions/{user}/{supervision}/approve', 'ApproveSupervisionController@approve')->middleware('auth');
Route::put('/approveSupervisions/{user}/{supervision}', 'ApproveSupervisionController@update')->middleware('auth');

Route::get('/approveTeachings/{user}', 'ApproveTeachingController@index')->middleware('auth');
Route::get('/approveTeachings/{user}/{teaching}', 'ApproveTeachingController@show')->middleware('auth');
Route::get('/approveTeachings/{user}/{teaching}/approve', 'ApproveTeachingController@approve')->middleware('auth');
Route::put('/approveTeachings/{user}/{teaching}', 'ApproveTeachingController@update')->middleware('auth');

Route::get('/approveConsultations/{user}', 'ApproveConsultationController@index')->middleware('auth');
Route::get('/approveConsultations/{user}/{consultation}', 'ApproveConsultationController@show')->middleware('auth');
Route::get('/approveConsultations/{user}/{consultation}/approve', 'ApproveConsultationController@approve')->middleware('auth');
Route::put('/approveConsultations/{user}/{consultation}', 'ApproveConsultationController@update')->middleware('auth');

Route::get('/approveComSer/{user}', 'ApproveCommunityServiceController@index')->middleware('auth');
Route::get('/approveComSer/{user}/{comSer}', 'ApproveCommunityServiceController@show')->middleware('auth');
Route::get('/approveComSer/{user}/{comSer}/approve', 'ApproveCommunityServiceController@approve')->middleware('auth');
Route::put('/approveComSer/{user}/{comSer}', 'ApproveCommunityServiceController@update')->middleware('auth');

Route::get('/approvePastAgencies/{user}', 'ApprovePastAgencyController@index')->middleware('auth');
Route::get('/approvePastAgencies/{user}/{pastAgency}', 'ApprovePastAgencyController@show')->middleware('auth');
Route::get('/approvePastAgencies/{user}/{pastAgency}/approve', 'ApprovePastAgencyController@approve')->middleware('auth');
Route::put('/approvePastAgencies/{user}/{pastAgency}', 'ApprovePastAgencyController@update')->middleware('auth');

// Rating module
Route::get('/ratings', 'RatingController@index')->middleware('auth');
Route::get('/ratings/{user}', 'RatingController@profile')->middleware('auth');

Route::get('/ratingsPersInfo/{user}', 'RatingPersonalInformationController@index')->middleware('auth');
Route::get('/ratingsPersInfo/{user}/{persInfo}/create', 'RatingPersonalInformationController@create')->middleware('auth');
Route::post('/ratingsPersInfo/{user}/{persInfo}', 'RatingPersonalInformationController@store')->middleware('auth');
Route::get('/ratingsPersInfo/{user}/{persInfo}/{rating}/edit', 'RatingPersonalInformationController@edit')->middleware('auth');
Route::put('/ratingsPersInfo/{user}/{persInfo}/{rating}', 'RatingPersonalInformationController@update')->middleware('auth');
Route::delete('/ratingsPersInfo/{user}/{persInfo}/{rating}', 'RatingPersonalInformationController@destroy')->middleware('auth');

Route::get('/ratingsProjects/{user}', 'RatingProjectController@index')->middleware('auth');
Route::get('/ratingsProjects/{user}/{project}/create', 'RatingProjectController@create')->middleware('auth');
Route::post('/ratingsProjects/{user}/{project}', 'RatingProjectController@store')->middleware('auth');
Route::get('/ratingsProjects/{user}/{project}', 'RatingProjectController@show')->middleware('auth');
Route::get('/ratingsProjects/{user}/{project}/{rating}/edit', 'RatingProjectController@edit')->middleware('auth');
Route::put('/ratingsProjects/{user}/{project}/{rating}', 'RatingProjectController@update')->middleware('auth');
Route::delete('/ratingsProjects/{user}/{project}/{rating}', 'RatingProjectController@destroy')->middleware('auth');

Route::get('/ratingsPublications/{user}', 'RatingPublicationController@index')->middleware('auth');
Route::get('/ratingsPublications/{user}/{publication}/create', 'RatingPublicationController@create')->middleware('auth');
Route::post('/ratingsPublications/{user}/{publication}', 'RatingPublicationController@store')->middleware('auth');
Route::get('/ratingsPublications/{user}/{publication}', 'RatingPublicationController@show')->middleware('auth');
Route::get('/ratingsPublications/{user}/{publication}/{rating}/edit', 'RatingPublicationController@edit')->middleware('auth');
Route::put('/ratingsPublications/{user}/{publication}/{rating}', 'RatingPublicationController@update')->middleware('auth');
Route::delete('/ratingsPublications/{user}/{publication}/{rating}', 'RatingPublicationController@destroy')->middleware('auth');

Route::get('/ratingsIntProp/{user}', 'RatingIntellectualPropertyController@index')->middleware('auth');
Route::get('/ratingsIntProp/{user}/{intProp}/create', 'RatingIntellectualPropertyController@create')->middleware('auth');
Route::post('/ratingsIntProp/{user}/{intProp}', 'RatingIntellectualPropertyController@store')->middleware('auth');
Route::get('/ratingsIntProp/{user}/{intProp}', 'RatingIntellectualPropertyController@show')->middleware('auth');
Route::get('/ratingsIntProp/{user}/{intProp}/{rating}/edit', 'RatingIntellectualPropertyController@edit')->middleware('auth');
Route::put('/ratingsIntProp/{user}/{intProp}/{rating}', 'RatingIntellectualPropertyController@update')->middleware('auth');
Route::delete('/ratingsIntProp/{user}/{intProp}/{rating}', 'RatingIntellectualPropertyController@destroy')->middleware('auth');

Route::get('/ratingsSupervisions/{user}', 'RatingSupervisionController@index')->middleware('auth');
Route::get('/ratingsSupervisions/{user}/{supervision}/create', 'RatingSupervisionController@create')->middleware('auth');
Route::post('/ratingsSupervisions/{user}/{supervision}', 'RatingSupervisionController@store')->middleware('auth');
Route::get('/ratingsSupervisions/{user}/{supervision}', 'RatingSupervisionController@show')->middleware('auth');
Route::get('/ratingsSupervisions/{user}/{supervision}/{rating}/edit', 'RatingSupervisionController@edit')->middleware('auth');
Route::put('/ratingsSupervisions/{user}/{supervision}/{rating}', 'RatingSupervisionController@update')->middleware('auth');
Route::delete('/ratingsSupervisions/{user}/{supervision}/{rating}', 'RatingSupervisionController@destroy')->middleware('auth');

Route::get('/ratingsTeachings/{user}', 'RatingTeachingController@index')->middleware('auth');
Route::get('/ratingsTeachings/{user}/{teaching}/create', 'RatingTeachingController@create')->middleware('auth');
Route::post('/ratingsTeachings/{user}/{teaching}', 'RatingTeachingController@store')->middleware('auth');
Route::get('/ratingsTeachings/{user}/{teaching}', 'RatingTeachingController@show')->middleware('auth');
Route::get('/ratingsTeachings/{user}/{teaching}/{rating}/edit', 'RatingTeachingController@edit')->middleware('auth');
Route::put('/ratingsTeachings/{user}/{teaching}/{rating}', 'RatingTeachingController@update')->middleware('auth');
Route::delete('/ratingsTeachings/{user}/{teaching}/{rating}', 'RatingTeachingController@destroy')->middleware('auth');

Route::get('/ratingsConsultations/{user}', 'RatingConsultationController@index')->middleware('auth');
Route::get('/ratingsConsultations/{user}/{consultation}/create', 'RatingConsultationController@create')->middleware('auth');
Route::post('/ratingsConsultations/{user}/{consultation}', 'RatingConsultationController@store')->middleware('auth');
Route::get('/ratingsConsultations/{user}/{consultation}', 'RatingConsultationController@show')->middleware('auth');
Route::get('/ratingsConsultations/{user}/{consultation}/{rating}/edit', 'RatingConsultationController@edit')->middleware('auth');
Route::put('/ratingsConsultations/{user}/{consultation}/{rating}', 'RatingConsultationController@update')->middleware('auth');
Route::delete('/ratingsConsultations/{user}/{consultation}/{rating}', 'RatingConsultationController@destroy')->middleware('auth');

Route::get('/ratingsComSer/{user}', 'RatingCommunityServiceController@index')->middleware('auth');
Route::get('/ratingsComSer/{user}/{comSer}/create', 'RatingCommunityServiceController@create')->middleware('auth');
Route::post('/ratingsComSer/{user}/{comSer}', 'RatingCommunityServiceController@store')->middleware('auth');
Route::get('/ratingsComSer/{user}/{comSer}', 'RatingCommunityServiceController@show')->middleware('auth');
Route::get('/ratingsComSer/{user}/{comSer}/{rating}/edit', 'RatingCommunityServiceController@edit')->middleware('auth');
Route::put('/ratingsComSer/{user}/{comSer}/{rating}', 'RatingCommunityServiceController@update')->middleware('auth');
Route::delete('/ratingsComSer/{user}/{comSer}/{rating}', 'RatingCommunityServiceController@destroy')->middleware('auth');

Route::get('/ratingsPastAgencies/{user}', 'RatingPastAgencyController@index')->middleware('auth');
Route::get('/ratingsPastAgencies/{user}/{pastAgency}/create', 'RatingPastAgencyController@create')->middleware('auth');
Route::post('/ratingsPastAgencies/{user}/{pastAgency}', 'RatingPastAgencyController@store')->middleware('auth');
Route::get('/ratingsPastAgencies/{user}/{pastAgency}', 'RatingPastAgencyController@show')->middleware('auth');
Route::get('/ratingsPastAgencies/{user}/{pastAgency}/{rating}/edit', 'RatingPastAgencyController@edit')->middleware('auth');
Route::put('/ratingsPastAgencies/{user}/{pastAgency}/{rating}', 'RatingPastAgencyController@update')->middleware('auth');
Route::delete('/ratingsPastAgencies/{user}/{pastAgency}/{rating}', 'RatingPastAgencyController@destroy')->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
