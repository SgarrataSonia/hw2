<?php

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

//Pagina visualizzata per prima
Route::get('/', function () {
    return redirect('login');
});

//Signup
Route::get('signup', 'App\Http\Controllers\RegisterController@signup_form');
Route::post('signup', 'App\Http\Controllers\RegisterController@do_signup');
Route::post('check_username', 'App\Http\Controllers\RegisterController@controllo_username');
Route::post('check_email', 'App\Http\Controllers\RegisterController@controllo_email');
Route::post('check_login', 'App\Http\Controllers\RegisterController@controllo_login');

//Login
Route::get('login', 'App\Http\Controllers\RegisterController@login_form');
Route::post('login', 'App\Http\Controllers\RegisterController@do_login');

//Home
Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('logout', 'App\Http\Controllers\HomeController@logout');
Route::get('recipe_list', 'App\Http\Controllers\HomeController@carica_contenuti');
Route::post('add_recipe', 'App\Http\Controllers\HomeController@add_ricettario');

//Ricettario
Route::get('ricettario', 'App\Http\Controllers\RecipeController@ricettario');
Route::get('carica_prefers', 'App\Http\Controllers\RecipeController@ricette_preferite');
Route::post('remove_prefers', 'App\Http\Controllers\RecipeController@rimuovi_ricetta');
Route::post('API_search', 'App\Http\Controllers\RecipeController@ricerca_canzone');

//Profilo
Route::get('profile', 'App\Http\Controllers\ProfileController@credentials');
Route::post('modifica_credenziali', 'App\Http\Controllers\ProfileController@modifica');


