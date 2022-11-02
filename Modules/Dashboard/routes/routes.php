<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Controller\DashboardController;
use Modules\Profile\Controller\ProfileController;
use Modules\Chat\Controller\ChatController;
use Modules\Phones\Controller\PhonesController;
use Modules\Phones\Controller\UpdatePhonesController;

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

// all dashboard related routes including phone views and profile will be defined here
// with or under the auth middleware

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [DashboardController::class,'create']);

    Route::get('/dashboard', [DashboardController::class,'create'])->name('dashboard');

    Route::get('/logout', [DashboardController::class,'authLogout'])->name('logout');

    Route::get('/profile', [ProfileController::class,'create'])->name('profile');

    Route::post('/profile_update', [ProfileController::class,'updateProfile'])->name('profile_update');

    Route::get('/chats', [ChatController::class,'loadChats']);

    Route::get('/phones', [PhonesController::class,'loadPhones'])->name('phones'); 

    Route::get('/phone/delete/{id}', [PhonesController::class,'deletePhone']);

    Route::get('add_new_phone', [PhonesController::class,'addPhoneView']);

    Route::post('add_phone', [PhonesController::class,'addPhone'])->name('add_phone');

    Route::get('phone_edit/{id}', [UpdatePhonesController::class,'updatePhoneView']);

    Route::post('update_phone/{id}', [UpdatePhonesController::class,'updatePhone'])->name('update_phone');

    Route::get('/apps', function () {
        return view('dashboard::apps.apps-list');
    })->name('apps');

    Route::get('/pages', function () {
        return view('dashboard::profile.pages-card-user-1');
    })->name('pages');

    Route::get('/forms', function () {
        return view('dashboard::forms.form-input-text');
    })->name('forms');

    Route::get('/components', function () {
        return view('dashboard::components.components-accordion');
    })->name('components');

    Route::get('/elements', function () {
        return view('dashboard::elements.elements-avatar');
    })->name('elements');

    Route::get('/form', function () {
        return view('dashboard::forms.form-layout-5');
    })->name('form');

    Route::get('/crm_analytics', function () {
        return view('dashboard::dashboard.dashboards-crm-analytics');
    })->name('crm_analytics');

    Route::get('/dashboards_orders', function () {
        return view('dashboard::dashboard.dashboards-orders');
    })->name('dashboards_orders');

    Route::get('/dashboards_crypto_1', function () {
        return view('dashboard::dashboard.dashboards-crypto-1');
    })->name('dashboards_crypto_1');

    Route::get('/dashboards_crypto_2', function () {
        return view('dashboard::dashboard.dashboards-crypto-2');
    })->name('dashboards_crypto_2');

    Route::get('/dashboards_banking_1', function () {
        return view('dashboard::dashboard.dashboards-banking-1');
    })->name('dashboards_banking_1');

    Route::get('/dashboards_banking_2', function () {
        return view('dashboard::dashboard.dashboards-banking-2');
    })->name('dashboards_banking_2');
    
    Route::get('/dashboards_personal', function () {
        return view('dashboard::dashboard.dashboards-personal');
    })->name('dashboards_personal');

    Route::get('/dashboards_cms_analytics', function () {
        return view('dashboard::dashboard.dashboards-cms-analytics');
    })->name('dashboards_cms_analytics');

    Route::get('/dashboards_influencer', function () {
        return view('dashboard::dashboard.dashboards-influencer');
    })->name('dashboards_influencer');

    Route::get('/dashboards_travel', function () {
        return view('dashboard::dashboard.dashboards-travel');
    })->name('dashboards_travel');

    Route::get('/dashboards_teacher', function () {
        return view('dashboard::dashboard.dashboards-teacher');
    })->name('dashboards_teacher');

    Route::get('/dashboards_education', function () {
        return view('dashboard::dashboard.dashboards-education');
    })->name('dashboards_education');
    
    Route::get('/dashboards_authors', function () {
        return view('dashboard::dashboard.dashboards-authors');
    })->name('dashboards_authors');

    Route::get('/dashboards_doctor', function () {
        return view('dashboard::dashboard.dashboards-doctor');
    })->name('dashboards_doctor');
    
    Route::get('/dashboards_employees', function () {
        return view('dashboard::dashboard.dashboards-employees');
    })->name('dashboards_employees');
    
    Route::get('/dashboards_workspace', function () {
        return view('dashboard::dashboard.dashboards-workspace');
    })->name('dashboards_workspace');
    
    Route::get('/dashboards_meeting', function () {
        return view('dashboard::dashboard.dashboards-meeting');
    })->name('dashboards_meeting');
    
    Route::get('/dashboards_project_boards', function () {
        return view('dashboard::dashboard.dashboards-project-boards');
    })->name('dashboards_project_boards');

    Route::get('/dashboards_widget_ui', function () {
        return view('dashboard::dashboard.dashboards-widget-ui');
    })->name('dashboards_widget_ui');

    Route::get('/dashboards_widget_contacts', function () {
        return view('dashboard::dashboard.dashboards-widget-contacts');
    })->name('dashboards_widget_contacts');

    Route::get('/w', function () {
        return view('dashboard::welcome');
    });
});
