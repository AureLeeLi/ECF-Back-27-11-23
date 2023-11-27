<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatelasController;
use App\Http\Controllers\CategoryController;
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
Route::get('/categories/{id}', [CategoryController::class, 'show']); //listing des matelas référencés par catégories