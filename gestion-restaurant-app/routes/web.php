<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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
Route::get('/gestion-client', [ClientController::class, 'gestionClient']);
Route::get('/gestion-commande', [CommandeController::class, 'gestionCommande']);
Route::get('/gestion-livreur', [LivreurController::class, 'gestionLivreur']);
Route::get('/gestion-produit', [ProduitController::class, 'gestionProduit']);
Route::get('/gestion-serveur', [ServeurController::class, 'gestionServeur']);