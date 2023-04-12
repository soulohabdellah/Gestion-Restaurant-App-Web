<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ServeurController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/menu', [ProduitController::class, 'getProduits']);
Route::get('/produit/{id}', [ProduitController::class, 'getProduit']);
Route::get('/panier', [ProduitController::class, 'getPanier']);

Route::get('/gestion-categorie', [CategorieController::class, 'gestionCategorie']);

//gestion clients
Route::get('/gestion-client', [ClientController::class, 'gestionClient']);
Route::get('/delete-client/{id}', [ClientController::class, 'deleteClient']);
Route::get('/update-client/{id}', [ClientController::class, 'updateClient']);
Route::post('/ajouter-client', [ClientController::class, 'addClient']);


Route::get('/gestion-commande', [CommandeController::class, 'gestionCommande']);
Route::get('/gestion-livreur', [LivreurController::class, 'gestionLivreur']);
Route::get('/gestion-produit', [ProduitController::class, 'gestionProduit']);
Route::get('/gestion-serveur', [ServeurController::class, 'gestionServeur']);