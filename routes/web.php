<?php

use App\Http\Controllers\adminController\educationController;
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
Route::get('/portfolio',[frontController::class,'portfolio'])->name('portfolio');
Route::get('/blog',[frontController::class,'blog'])->name('blog');
Route::get('/contact',[frontController::class,'contact'])->name('contact');



///Admin Routes

Route::prefix('manager')->middleware('auth')->group(function (){
    Route::get('/',[adminController::class,'index'])->name('manager.index');
    Route::get('/education-list',[educationController::class,'list'])->name('manager.education.list');
    Route::post('education-changeStatus', [educationController::class,'changeStatus'])->name('manager.education.changeStatus');
    Route::get('/education-add',[educationController::class,'add'])->name('manager.edication.add');
    Route::post('/education-add',[educationController::class,'addPost'])->name('manager.edication.add.post');


}
);


//Log  view
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
//log view
