<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;


  
  
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('create-contact', 'ContactController@create')->name('create-contact');
Route::post('store-contact', 'ContactController@store')->name('store-contact');
Route::get('edit-contact/{id}', 'ContactController@edit')->name('edit-contact');
Route::post('update-contact/{id}', 'ContactController@update')->name('update-contact');
Route::delete('delete-contact/{id}', 'ContactController@destroy')->name('delete-contact');


