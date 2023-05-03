<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Item;
use App\Models\Statut;

class CommandeController extends Controller
{
////Etape dans procedure de commander la ou on choisit type de commande
    function addTypeCommande(Request $request){
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{
        $typeCommande = $request->input('commande');

        if ($typeCommande == 'domicile') {
            session(['informations_commande' => 'domicile']);

        } else {
            session(['informations_commande' => 'sur place']);
        }
        return view('informationsCommande')->with('message', 'Tu commande maintenent !');
    }
    }
////Etape finale dans le processuce de commander de creation de commande 
    function getCommanderMaintenent(Request $request) {
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{
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
}
////Afficher l'historiques du commande au client
    function getHistorique(){
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{
            $listCommandes = Commande::where('id_client', session('id_client'))->get();
            return view('historiquesClient')->with('listCommandes', $listCommandes);

        }
       
    }
////Afficher les produits de chaque comande au client
    function getCommande($id_commande){
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{
        $listItems = Item::where('id_de_commande', $id_commande)->get();
        return view('commandeItem')->with('listItems', $listItems);
    }
}
////Afficher la liste des commande sur place au serveur
    function getServeurCommandes(){
        if(!$this->isConnectedServeur()){
            return view('authentifications/authentificationServeur');

        }else{
        $listCommandes = Commande::where('id_serveur', session('id_serveur'))->get();
        return view('gestionCommandesServeur/gestionCommande')->with('listCommandes', $listCommandes);
        }
////Afficher les produits de chaque commande sur place au serveur
    }function getServeurCommande($id_commande){
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{

        $listItems = Item::where('id_de_commande', $id_commande)->get();
        return view('gestionCommandesServeur/commandeItem')->with('listItems', $listItems);
        }
    }
////Afficher les commandes a livrer au livreur
    function getLivreurCommandes(){
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
        $listCommandes = Commande::where('id_livreur', session('id_livreur'))->get();

        return view('gestionCommandesLivreur/gestionCommande')->with('listCommandes', $listCommandes);
        }
    }
    //Afficher les produits d'une commande a livrer au livreur
    function getLivreurCommande($id_commande){
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{

        $listItems = Item::where('id_de_commande', $id_commande)->get();
        return view('gestionCommandesLivreur/commandeItem')->with('listItems', $listItems);
        }
    }
    //Afficher la commande a livrer avec le statut pour donner l'accees au livreur de le changer
    function updateLivreurCommandes($id_commande) {
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
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
    }
    ////Modification de statut de commande a livrer
    function modifyLivreurCommandes(Request $request, $id_commande) {
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
        $commande = Commande::find($id_commande);
        $commande->id_statut = $request->statut;
        $commande->save();
        $listCommandes = Commande::where('id_livreur', session('id_livreur'))->get();
        return view('gestionCommandesLivreur/gestionCommande')->with('listCommandes', $listCommandes);
        }
    }
    //Afficher la commande sur place avec le statut pour donner l'accees au serveur de le changer

    function updateServeurCommandes($id_commande) {
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{
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
    }
        ////Modification de statut de commande a sur place

    function modifyServeurCommandes(Request $request, $id_commande) {
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{
        $commande = Commande::find($id_commande);
        $commande->id_statut = $request->statut;
        $commande->save();
        $listCommandes = Commande::where('id_serveur', session('id_serveur'))->get();
        return view('gestionCommandesServeur/gestionCommande')->with('listCommandes', $listCommandes);
    }
    }
////Afficher les commandes a livrer au livreur
function getAdministrateurCommandes(){
    if(!$this->isConnectedAdministrateur()){

        return view('authentifications/authentificationAdministrateur');

    }else{
    $listCommandes = Commande::all();

    return view('gestionCommandesAdministrateur/gestionCommande')->with('listCommandes', $listCommandes);
    }
}
////Modification de statut de commande par administrateur

        function modifyAdministrateurCommandes(Request $request, $id_commande) {
            if(!$this->isConnectedAdministrateur()){
    
                return view('authentifications/authentificationAdministrateur');
    
            }else{
            $commande = Commande::find($id_commande);
            $commande->id_statut = $request->statut;
            $commande->save();
            $listCommandes = Commande::all();
            return view('gestionCommandesAdministrateur/gestionCommande')->with('listCommandes', $listCommandes);
        }
        }
        //Afficher la commande avec le statut pour donner l'accees au administrateur de le changer

        function updateAdministrateurCommandes($id_commande) {
            if(!$this->isConnectedAdministrateur()){
    
                return view('authentifications/authentificationAdministrateur');
    
            }else{
            $commande = Commande::find($id_commande);
            $listStatuts= Statut::all();
            if (!$commande) {
                return redirect()->back()->with('error', 'La commande que vous essayez de modifier n\'existe pas.');
            }
     
            return view('gestionCommandesAdministrateur/modifierCommande')->with([
                'commande' => $commande,
                'listStatuts' => $listStatuts
            ]);
        }
        }
        //Afficher les produits d'une commande au administrateur
        function getAdministrateurCommande($id_commande){
            if(!$this->isConnectedAdministrateur()){
    
                return view('authentifications/authentificationAdministrateur');
    
            }else{
    
            $listItems = Item::where('id_de_commande', $id_commande)->get();
            return view('gestionCommandesAdministrateur/commandeItem')->with('listItems', $listItems);
            }
        }
        //Payer commande (Changer l'etat du commande)
        function payerCommande($id_commande){
            if(!$this->isConnectedClient()){
    
                return view('authentifications/authentificationClient');
    
            }else{
    
            $commande = Commande::find($id_commande);
            $commande->payee = true;
            $commande->save();
            return redirect('/client-historique');

            }

        }
    
}
