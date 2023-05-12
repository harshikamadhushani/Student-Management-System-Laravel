<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Route::prefix('/edit')->group(function(){
    Route::get('/',[EditController::class,"index"])->name('EditProfile');
    Route::get('/edit/{st_id}',[EditController::class,"edit"])->name('EditProfile.edit');
    Route::put('/update/{st_id}',[EditController::class,"update"])->name('EditProfile.update');
});


Route::prefix('/home')->group(function(){
    Route::get('/',[HomeController::class,"index"])->name('home');
    Route::get('/{st_id}/delete',[HomeController::class,"delete"])->name('home.delete');
    Route::get('/{st_id}/status',[HomeController::class,"status"])->name('home.status');
    //Route::get('/edit/{st_id}',[HomeController::class,"editP"])->name('EditProfile.edit');

});




Route::prefix('/insert')->group(function(){

    Route::get('/',[RegisterController::class,"index"])->name('records');
    Route::post('/insert',[RegisterController::class,"store"])->name('register.store');


});



Route::get('/login', function () {
    return view('login');
})->middleware(['auth', 'verified'])->name('dashboard');


/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/


    Route::prefix('/home')->group(function(){
        Route::get('/',[HomeController::class,"index"])->name('home');
        Route::get('/{st_id}/delete',[HomeController::class,"delete"])->name('home.delete');
        Route::get('/{st_id}/status',[HomeController::class,"status"])->name('home.status');

    });



require __DIR__.'/auth.php';
