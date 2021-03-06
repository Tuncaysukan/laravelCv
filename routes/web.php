<?php

use App\Http\Controllers\adminController\educationController;
use App\Http\Controllers\experinceController\experinceControl;
use App\Http\Controllers\frontendController\frontController;
use App\Http\Controllers\adminController\adminController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [frontController::class, 'index'])->name('index');
Route::get('/resume', [frontController::class, 'resume'])->name('resume');
Route::get('/portfolio', [frontController::class, 'portfolio'])->name('portfolio');
Route::get('/blog', [frontController::class, 'blog'])->name('blog');
Route::get('/contact', [frontController::class, 'contact'])->name('contact');


///Admin Routes

Route::prefix('manager')->middleware('auth')->group(function () {
    Route::get('/', [adminController::class, 'index'])->name('manager.index');
    Route::get('/education-list', [educationController::class, 'list'])->name('manager.education.list');
    Route::post('education-changeStatus', [educationController::class, 'changeStatus'])->name('manager.education.changeStatus');
    Route::get('/education-add', [educationController::class, 'add'])->name('manager.education.add');
    Route::get('/education-addShow', [educationController::class, 'addShow'])->name('manager.education.addShow');
    Route::post('/education-addShow', [educationController::class, 'edit'])->name('manager.education.addShow');
    Route::post('/education-add', [educationController::class, 'addPost'])->name('manager.education.add.post');
    Route::post('/education-delete',[educationController::class,'delete'])->name('manager.education.delete');
    Route::get('/education-update',[educationController::class,'update'])->name('manager.education.update');


    //  Deneyimler  Route
    Route::get('/exper??nce-list',[experinceControl::class,'index'])->name('manager.experince.list');
    Route::get('/exper??nce-add', [experinceControl::class, 'add'])->name('manager.experince.add');
    Route::post('/experience-add', [experinceControl::class, 'save'])->name('manager.experince.addPost');
    Route::post('/experience-delete',[experinceControl::class,'delete'])->name('manager.experince.delete');
    Route::post('/experince-changeStatus',[experinceControl::class,'changeStatus'])->name('manager.experince.changeStatus');
    Route::get('/experince-update',[experinceControl::class,'update'])->name('manager.experince.update');
    Route::post('/experince-addShow', [experinceControl::class, 'edit'])->name('manager.experince.addShow');
//manager.experince.addShow



}
);


//Log  view
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
//log view
