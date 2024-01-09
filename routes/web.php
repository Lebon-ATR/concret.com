<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

// Route principale de la page d'accueil
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

// Route::get('admin/admin/list', function () {
//     return view('admin.admin.list');
// });

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);

});

Route::group(['middleware' => 'enseignant'], function () {
    Route::get('enseignant/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'etudiant'], function () {
    Route::get('etudiant/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
});
// Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
// Route::get('enseignant/dashboard', 'EnseignantController@dashboard')->name('enseignant.dashboard');
// Route::get('etudiant/dashboard', 'EtudiantController@dashboard')->name('etudiant.dashboard');
// Route::get('parent/dashboard', 'ParentController@dashboard')->name('parent.dashboard');
