<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Item;
use App\Models\Statut;

class CommandeController extends Controller
{
    function isConnectedClient(){
       
        if(session('id_client')){
            return true;
        }else{
            return false;
        }
    }
    function isConnectedAdministrateur(){
       
        if(session('id_administrateur')){
            return true;
        }else{
            return false;
        }
    }
    function isConnectedServeur(){
       
        if(session('id_serveur')){
            return true;
        }else{
            return false;
        }
    }
    function isConnectedLivreur(){
       
        if(session('id_livreur')){
            return true;
        }else{
            return false;
        }
    }
    function addTypeCommande(Request $request){
        $typeCommande = $request->input('commande');

        if ($typeCommande == 'domicile') {
            session(['informations_commande' => 'domicile']);

        } else {
            session(['informations_commande' => 'sur place']);
        }
        return view('informationsCommande')->with('message', 'Tu commande maintenent !');


    }
    function getCommanderMaintenent(Request $request) {
        $panier = json_decode($request->input('panier'));
    
        // Vérifier que le panier n'est pas vide
        if (empty($panier)) {
            return redirect('/menu');
        }
    
        // Vérifier que toutes les quantités sont supérieures à zéro
        foreach ($panier as $objet) {
            if ($objet->quantite <= 0) {
                return redirect('/menu');
            }
        }
    
        // Vérifier si le client est connecté
        if (!$this->isConnectedClient()) {
            return view('authentifications/authentificationClient');
        }
        // Vérifier si le client choisit le type de commande
        if (!(session('informations_commande'))) {
            return view('informationsCommande');
        }
    
    
        $commande = new Commande;
        $commande->date_commande = date('Y-m-d H:i:s');
        $commande->id_client = session('id_client');
    
        // Déterminer le type de livraison
        if (session('informations_commande') == 'domicile') {
            $commande->id_livreur = session('id_livreur'); 
            $commande->id_type = 1;           
        } else {
            $commande->id_serveur = session('id_serveur');
            $commande->id_type = 2;  
        }
    
        // Calculer le prix total
        $prix = 0;
        foreach ($panier as $objet) {
            $prix += ($objet->prix * $objet->quantite);
        }                        
        $commande->prix_total = $prix;
        $commande->id_statut = 2;  
        $commande->save();
    
        // Enregistrer les articles de la commande
        foreach ($panier as $objet) {
            $item = new Item;
            $item->id_produit = $objet->id;
            $item->quantite = $objet->quantite;
            $item->prix_item = ($objet->prix * $objet->quantite);
            $item->id_de_commande = $commande->id;
            $item->save();
        }   
    
        session()->forget('informations_commande');
        $listCommandes = Commande::where('id_client', session('id_client'))->get();
        return view('historiquesClient')->with('listCommandes', $listCommandes);
    }
    function getHistorique(){
        $listCommandes = Commande::where('id_client', session('id_client'))->get();

        return view('historiquesClient')->with('listCommandes', $listCommandes);
    }
    function getCommande($id_commande){

        $listItems = Item::where('id_de_commande', $id_commande)->get();
        return view('commandeItem')->with('listItems', $listItems);
    }
    function getServeurCommandes(){
        $listCommandes = Commande::where('id_serveur', session('id_serveur'))->get();

        return view('gestionCommandesServeur/gestionCommande')->with('listCommandes', $listCommandes);

    }function getServeurCommande($id_commande){

        $listItems = Item::where('id_de_commande', $id_commande)->get();
        return view('gestionCommandesServeur/commandeItem')->with('listItems', $listItems);
    }

    function getLivreurCommandes(){
        $listCommandes = Commande::where('id_livreur', session('id_livreur'))->get();

        return view('gestionCommandesLivreur/gestionCommande')->with('listCommandes', $listCommandes);

    }function getLivreurCommande($id_commande){

        $listItems = Item::where('id_de_commande', $id_commande)->get();
        return view('gestionCommandesLivreur/commandeItem')->with('listItems', $listItems);
    }
    function updateLivreurCommandes($id_commande) {
        $commande = Commande::find($id_commande);
        $listStatuts= Statut::all();
        if (!$commande) {
            return redirect()->back()->with('error', 'La commande que vous essayez de modifier n\'existe pas.');
        }
 
        return view('gestionCommandesLivreur/modifierCommande')->with([
            'commande' => $commande,
            'listStatuts' => $listStatuts
        ]);
    }
    function modifyLivreurCommandes(Request $request, $id_commande) {
        $commande = Commande::find($id_commande);
        $commande->id_statut = $request->statut;
        $commande->save();
        $listCommandes = Commande::where('id_livreur', session('id_livreur'))->get();
        return view('gestionCommandesLivreur/gestionCommande')->with('listCommandes', $listCommandes);
    }

    function updateServeurCommandes($id_commande) {
        $commande = Commande::find($id_commande);
        $listStatuts= Statut::all();
        if (!$commande) {
            return redirect()->back()->with('error', 'La commande que vous essayez de modifier n\'existe pas.');
        }
 
        return view('gestionCommandesServeur/modifierCommande')->with([
            'commande' => $commande,
            'listStatuts' => $listStatuts
        ]);
    }
    function modifyServeurCommandes(Request $request, $id_commande) {
        $commande = Commande::find($id_commande);
        $commande->id_statut = $request->statut;
        $commande->save();
        $listCommandes = Commande::where('id_serveur', session('id_serveur'))->get();
        return view('gestionCommandesServeur/gestionCommande')->with('listCommandes', $listCommandes);
    }


    
}
