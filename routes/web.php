<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatelasController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\LoginController;
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

//Home Controller
Route::get('/', [HomeController::class, 'index']); //page d'accueil literie 3000

//Matelas Controller
Route::get('/catalogue', [MatelasController::class, 'index']); //listing des matelas du catalogue
Route::get('/catalogue/ajout', [MatelasController::class, 'create']); //formulaire d'ajout d'une référence
Route::post('/catalogue/ajout', [MatelasController::class, 'store']); //validation de l'ajout
Route::get('/catalogue/{id}/modifier', [MatelasController::class, 'edit']); //formulaire de modification d'une référence
Route::post('/catalogue/{id}/modifier', [MatelasController::class, 'update']); //validation des modifications
Route::get('/catalogue/{id}/supprimer', [MatelasController::class, 'destroy']); //suppresion de la référence de la bdd


//Categories Controller
Route::get('/categories', [CategoryController::class, 'index']); //listing des catégories de matelas
Route::get('/categories/ajout', [CategoryController::class, 'create']); //formulaire d'ajout d'une catégorie
Route::post('/categories/ajout', [CategoryController::class, 'store']); //validation de l'ajout
Route::get('/categories/{id}', [CategoryController::class, 'show']); //listing des matelas référencés par catégories
Route::get('/categories/{id}/supprimer', [CategoryController::class, 'destroy']); //suppresion de la catégorie


//Marque Controller
Route::get('/matelassiers', [MarqueController::class, 'index']); 
Route::get('/matelassiers/ajout', [MarqueController::class, 'create']); 
Route::post('/matelassiers/ajout', [MarqueController::class, 'store']); 
Route::get('/matelassiers/{id}', [MarqueController::class, 'show']);
Route::get('/matelassiers/{id}/supprimer', [MarqueController::class, 'destroy']); 

//Login Controller
//Authentification
Route::get('/login', [LoginController::class, 'login'])->name('login');//afficher le formulaire login
Route::post('/login', [LoginController::class, 'authenticate']);//traiter le formulaire login
Route::get('/logout', [LoginController::class, 'logout']);//deconnexion
