<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdministrateurController;

Route::get('/home', function () {
    return view('home');
});
Route::get('/a-propos', function () {
    return view('apropos');
});
//Payement client 
Route::get('/commande-payer/{id}', [CommandeController::class, 'payerCommande']);

//Gestion commande administrateur
Route::get('/commande-administrateur', [CommandeController::class, 'getAdministrateurCommandes']);
Route::get('consulte-commande-administrateur/{id}', [CommandeController::class, 'getAdministrateurCommande']);
Route::get('/update-commande-administrateur/{id}', [CommandeController::class, 'updateAdministrateurCommandes']);
Route::post('/modify-commande-administrateur/{id}', [CommandeController::class, 'modifyAdministrateurCommandes']);
//Gestion commande serveur
Route::get('/commande-serveur', [CommandeController::class, 'getServeurCommandes']);
Route::get('consulte-commande-serveur/{id}', [CommandeController::class, 'getServeurCommande']);
Route::get('/update-commande-serveur/{id}', [CommandeController::class, 'updateServeurCommandes']);
Route::post('/modify-commande-serveur/{id}', [CommandeController::class, 'modifyServeurCommandes']);
//Gestion commande livreur
Route::get('/commande-livreur', [CommandeController::class, 'getLivreurCommandes']);
Route::get('consulte-commande-livreur/{id}', [CommandeController::class, 'getLivreurCommande']);
Route::get('/update-commande-livreur/{id}', [CommandeController::class, 'updateLivreurCommandes']);
Route::post('/modify-commande-livreur/{id}', [CommandeController::class, 'modifyLivreurCommandes']);

//Procedure de commander
Route::post('/commander-maintenant', [CommandeController::class, 'getCommanderMaintenent']);
Route::post('/type-commande', [CommandeController::class, 'addTypeCommande']);

//Client historique :
Route::get('/client-historique', [CommandeController::class, 'getHistorique']);
Route::get('/consulte-commande/{id}', [CommandeController::class, 'getCommande']);
//Rechercher
Route::post('/search-client', [ProduitController::class, 'searchClient']);

//Creation compte client par le client
Route::get('/creer-compte-client', [ClientController::class, 'getCreateCompte']);
Route::post('/inscription-client', [ClientController::class, 'inscriptionClient']);

//Setting
Route::get('/setting-administrateur', [AdministrateurController::class, 'getSetting']);
Route::post('/setting-administrateur', [AdministrateurController::class, 'updateSetting']);

Route::get('/setting-client', [ClientController::class, 'getSetting']);
Route::post('/setting-client', [ClientController::class, 'updateSetting']);

Route::get('/setting-serveur', [ServeurController::class, 'getSetting']);
Route::post('/setting-serveur', [ServeurController::class, 'updateSetting']);

Route::get('/setting-livreur', [LivreurController::class, 'getSetting']);
Route::post('/setting-livreur', [LivreurController::class, 'updateSetting']);

//Deconnexion
Route::get('/deconnexion-administrateur', [AdministrateurController::class, 'getDeconnexion']);
Route::get('/deconnexion-client', [ClientController::class, 'getDeconnexion']);
Route::get('/deconnexion-serveur', [ServeurController::class, 'getDeconnexion']);
Route::get('/deconnexion-livreur', [LivreurController::class, 'getDeconnexion']);

//Dashboards
Route::get('/dashboard-administrateur', [AdministrateurController::class, 'getDashboard']);
Route::get('/dashboard-client', [ClientController::class, 'getDashboard']);
Route::get('/dashboard-serveur', [ServeurController::class, 'getDashboard']);
Route::get('/dashboard-livreur', [LivreurController::class, 'getDashboard']);

//gestion interface client
Route::get('/menu', [ProduitController::class, 'getProduits']);
Route::get('/produit/{id}', [ProduitController::class, 'getProduit']);
Route::get('/panier', [ProduitController::class, 'getPanier']);

//gestion authentification client 
Route::get('/authentification-client', [ClientController::class, 'getAuthentificationClient']);
Route::post('/auhthentification-client/verifier-client', [ClientController::class, 'verifierClient']);

//gestion authentification serveur
Route::get('/authentification-serveur', [ServeurController::class, 'getAuthentificationServeur']);
Route::post('/authentification-serveur/verifier-serveur', [ServeurController::class, 'verifierServeur']);

//gestion authentification livreur
Route::get('/authentification-livreur', [LivreurController::class, 'getAuthentificationLivreur']);
Route::post('/authentification-livreur/verifier-livreur', [LivreurController::class, 'verifierLivreur']);

//gestion authentification administrateur
Route::get('/authentification-administrateur', [AdministrateurController::class, 'getAuthentificationAdministrateur']);
Route::post('/authentification-administrateur/verifier-administrateur', [AdministrateurController::class, 'verifierAdministrateur']);

//gestion messages
Route::get('/contact', [MessageController::class, 'getFormContact']);
Route::get('/gestion-message', [MessageController::class, 'gestionMessage']);
Route::post('/creer-message', [MessageController::class, 'creerMessage']);
Route::get('/delete-message/{id}', [MessageController::class, 'deleteMessage']);
Route::get('modify-message/{id}', [MessageController::class, 'modifyMessage']);
//gestion clients
Route::get('/gestion-client', [ClientController::class, 'gestionClient']);
Route::get('/delete-client/{id}', [ClientController::class, 'deleteClient']);
Route::get('/update-client/{id}', [ClientController::class, 'updateClient']);
Route::post('/update-client/modify-client/{id}', [ClientController::class, 'modifyClient']);
Route::get('/ajouter-client', [ClientController::class, 'addClient']);
Route::post('/creer-client', [ClientController::class, 'creerClient']);
//gestion categories
Route::get('/gestion-categorie', [CategorieController::class, 'gestionCategorie']);
Route::get('/delete-categorie/{id}', [CategorieController::class, 'deleteCategorie']);
Route::get('/ajouter-categorie', [CategorieController::class, 'addCategorie']);
Route::post('/creer-categorie', [CategorieController::class, 'creerCategorie']);
Route::get('/update-categorie/{id}', [CategorieController::class, 'updateCategorie']);
Route::post('/update-categorie/modify-categorie/{id}', [CategorieController::class, 'modifyCategorie']);
//gestion produits
Route::get('/gestion-produit', [ProduitController::class, 'gestionProduit']);
Route::get('/delete-produit/{id}', [ProduitController::class, 'deleteProduit']);
Route::get('/ajouter-produit', [ProduitController::class, 'addProduit']);
Route::post('/creer-produit', [ProduitController::class, 'creerProduit']);
Route::get('/update-produit/{id}', [ProduitController::class, 'updateProduit']);
Route::post('/update-produit/modify-produit/{id}', [ProduitController::class, 'modifyProduit']);
//gestion serveurs
Route::get('/gestion-serveur', [ServeurController::class, 'gestionServeur']);
Route::get('/delete-serveur/{id}', [ServeurController::class, 'deleteServeur']);
Route::get('/update-serveur/{id}', [ServeurController::class, 'updateServeur']);
Route::post('/update-serveur/modify-serveur/{id}', [ServeurController::class, 'modifyServeur']);
Route::get('/ajouter-serveur', [ServeurController::class, 'addServeur']);
Route::post('/creer-serveur', [ServeurController::class, 'creerServeur']);
//gestion livreurs
Route::get('/gestion-livreur', [LivreurController::class, 'gestionLivreur']);
Route::get('/delete-livreur/{id}', [LivreurController::class, 'deleteLivreur']);
Route::get('/update-livreur/{id}', [LivreurController::class, 'updateLivreur']);
Route::post('/update-livreur/modify-livreur/{id}', [LivreurController::class, 'modifyLivreur']);
Route::get('/ajouter-livreur', [LivreurController::class, 'addLivreur']);
Route::post('/creer-livreur', [LivreurController::class, 'creerLivreur']);


Route::get('/gestion-commande', [CommandeController::class, 'gestionCommande']);
Route::get('/gestion-livreur', [LivreurController::class, 'gestionLivreur']);
Route::get('/gestion-produit', [ProduitController::class, 'gestionProduit']);
Route::get('/gestion-serveur', [ServeurController::class, 'gestionServeur']);

