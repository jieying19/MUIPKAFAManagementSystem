<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ManageActivityController;
use App\Http\Controllers\StudentResultController;

// Change this to change the default page
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role != 'KAFAadmin') {
            return redirect('/dashboard');
        }
        else {
            return redirect("/dashboard/kafaActivty");
        }
    } else {
        return redirect()->route('login');
    }
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role != 'KAFAadmin') {
            return redirect('/dashboard/kafaActivty');
        }
        else {
            return redirect("/dashboard/kafaActivty");
        }
    })->name('dashboard');
});

// Manage Kafa Activity Module
Route::get('/dashboard/kafaActivty', [ManageActivityController::class, 'index'])->name('kafaActivity');
Route::post('/kafaActivty/update/{id}', [ManageActivityController::class, 'update'])->name('updateKafaActivity');
Route::get('/kafaActivty/view/{id}', [ManageActivityController::class, 'show'])->name('viewKafaActivity');
Route::post('/kafaActivty/storeAttendance/{id}', [ManageActivityController::class, 'storeAttendance'])->name('storeAttendance');

// View Payment Module
// Only KAFA Admin can access this route
Route::middleware('role:KAFAadmin,MUIPadmin')->group(function () {
    // View list of payments
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index')->middleware('role:KAFAadmin,MUIPadmin');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/insert', [PaymentController::class, 'insert'])->name('payment.insert');
    Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::post('/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');

    // Manage student result
    Route::get('/StudentResultList', [StudentResultController::class, 'index'])->name('StudentResult');
});

// Only Parent can access this route
Route::middleware('role:parent')->group(function () {
    // View Payment Module
    Route::get('/viewPayment', [PaymentController::class, 'userIndex'])->name('payment.userIndex')->middleware('role:parent');
    Route::post('/viewPayment/insert/{userName}', [PaymentController::class, 'updateUser'])->name('payment.userInsert');

   // Manage Kafa Activity Module
//    Route::get('/dashboard/kafaActivty', [ManageActivityController::class, 'index'])->name('kafaActivity');
});

//Report Module
// Only KAFA Admin and MUIP Admin can access this route
Route::middleware('role:KAFAadmin,MUIPadmin')->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::post('/report', [ReportController::class, 'index'])->name('report');
    Route::get('report/data/{range}', [ReportController::class, 'getData'])->name('report.data');
    Route::get('/report/export', [ReportController::class, 'exportCSV'])->name('csv');

   // Manage Kafa Activity Module
//    Route::get('/dashboard/kafaActivty', [ManageActivityController::class, 'index'])->name('kafaActivity');
   Route::get('/kafaActivty/add', [ManageActivityController::class, 'create'])->name('addKafaActivity');
   Route::post('/kafaActivty/store', [ManageActivityController::class, 'store'])->name('storeKafaActivity');
   Route::get('/kafaActivty/edit/{id}', [ManageActivityController::class, 'edit'])->name('editKafaActivity');
   Route::post('/kafaActivty/update/{id}', [ManageActivityController::class, 'update'])->name('updateKafaActivity');
   Route::post('/kafaActivty/delete/{id}', [ManageActivityController::class, 'destroy'])->name('deleteKafaActivity');
//    Route::get('/kafaActivty/view/{id}', [ManageActivityController::class, 'show'])->name('viewKafaActivity');
});

// Announcement & User Module
// Only KAFA Admin & MUIP Admin can access this route
Route::middleware('role:KAFAadmin,MUIPadmin')->group(function () {

    // User Module
    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::get('/users/add', [UserController::class, 'create'])->name('addUser');
    Route::post('/users/store', [UserController::class, 'store'])->name('storeUser');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('editUser');
    Route::post('/users/update', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/users/delete', [UserController::class, 'destroy'])->name('deleteUser');
});
