<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmailVerifierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SingleEmailVerifyController;
use App\Http\Controllers\BulkEmailVerifyController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\ApiIntegrationController;
use App\Http\Controllers\BuyCreditController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\PasteEmailController;
use App\Http\Controllers\CardController;


use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;



    
//admin custom login page
 Route::get('/admin/login', [ProfileController::class, 'adminlogin']);
 //admin custom register page
 Route::get('/admin/register', [ProfileController::class, 'adminregister']);
 //admin logi funtion
  Route::get('/admin/logouts', [ProfileController::class, 'logouts']);

 // middleware for auth profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// middleware for  role= admin
Route::middleware(['auth', 'role:admin'])->group(function () {
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
     //admin custom profile edit 
 Route::get('/admin/custom/profile', [AdminDashboardController::class, 'customedit'])->name('profile.customedit');
 //admin custom pass edit custompassedit
 Route::get('/admin/custom/edit', [AdminDashboardController::class, 'custompassedit'])->name('profile.custompassedit');
//admin dashbar setting route
 Route::get('/admin/custom/setting', [AdminDashboardController::class, 'setting'])->name('profile.setting');
 // start apis controller
  Route::resource('employees', EmployeeController::class);
  
   Route::resource('students', StudentController::class);
    Route::resource('admins', UserController::class);
    //end apis controller
    //start normal controller
    //email verifier controller
Route::get('/admin/emailverify', [EmailVerifyController::class, 'index'])->name('emailverify.index');
    //credit balance route
    Route::get('/admin/credit', [EmailVerifyController::class, 'index'])->name('credit.index');
    //buy credit
        Route::get('/admin/buycredit', [BuyCreditController::class, 'index'])->name('buycredit.index');
        // foor apis sidebar route
           Route::get('/admin/api', [ApiIntegrationController::class, 'index'])->name('api.index');
           //task and result route
              Route::get('/admin/tasks', [TasksController::class, 'index'])->name('tasksresult.index');
              //cards
                Route::get('/admin/cards', [CardController::class, 'index'])->name('cards.index');
});

// middleware for  role= user
// Route::middleware(['auth', 'role:user'])->group(function () {
//     //Route::get('/', fn() => view('frontend.index'));
// });

require __DIR__.'/auth.php';


//admin side all routes
// this html form all file for view form only and copy from here 
 Route::get('/admin/profile', [AdminDashboardController::class, 'adminprofile']);
 //datatable index chekc 
  Route::get('/admin/datatables', [AdminDashboardController::class, 'admintable']);




 // Public user page (frontend) for everyone
Route::get('/', [UserController::class, 'index'])->name('frontend.home');


//single email verify routes
Route::post('/single/verify', [SingleEmailVerifyController::class, 'signleverify'])->name('single.verify');
// Bulk email file upload
 Route::post('/bulk-email-verifier/upload', [BulkEmailVerifyController::class, 'handleUploadAndVerify'])->name('bulk.upload.verify');
 // bulk test index fiel 
 Route::get('/bulk/index', [BulkEmailVerifyController::class, 'index'])->name('bulk.index');
 //show live progress baar
Route::get('/bulk-verification/{task}/progress', [BulkEmailVerifyController::class, 'getTaskProgress'])->name('bulk.progress');
// result show page
Route::get('/bulk-verification/{id}', [BulkEmailVerifyController::class, 'result'])->name('bulk.result');
// paste email verify
Route::post('/email/paste-verify', [PasteEmailController::class, 'pasteVerify'])->name('paste.verify');


//NEW SPAMSHARK ADMIN DASHBOARD IMPLEMTN IN EXISTING ONE
Route::get('/spamshark/dashboard', [AdminDashboardController::class, 'spamshark'])->name('spamshark.dashboard');
