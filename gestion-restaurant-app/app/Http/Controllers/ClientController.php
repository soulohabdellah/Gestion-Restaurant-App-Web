<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    ////Deconnexion client
    public function getDeconnexion()
    {
        if(!$this->isConnectedClient()){
            return view('authentifications/authentificationClient');

        }else{

        session()->forget('id_client');
        session()->forget('nom_client');
        session()->forget('prenom_client');

        return view('authentifications/authentificationClient');
        }
    }
    ////Creation de compte client par client
    public function inscriptionClient(Request $request)
    {
        $client = new Client;
        $client->email = $request->Email;
        $client->nom = $request->Nom;
        $client->prenom = $request->Prenom;
        $client->telephone = $request->Telephone;
        $client->adresse = $request->Adresse;
        $client->password = bcrypt($request->Password);

        $client->save();
        session(['id_client' => $client->id, 'nom_client' => $client->nom, 'prenom_client' => $client->prenom]);
        return view('dashboards/dashboardClient');

    }
    ////Changer les informations de client
    function updateSetting(Request $request){
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{
        $id_client = session('id_client');
        $client = Client::find($id_client);
        $client->email = $request->Email;
        $client->nom = $request->Nom;
        $client->prenom = $request->Prenom;
        $client->telephone = $request->Telephone;
        $client->adresse = $request->Adresse;
        $client->password = bcrypt($request->Password);
        $client->save();
        $message="Bien modifié";
        return view('settings/settingClient')->with(['client' => $client, 'message' => $message]);
        }
    }
    ////Afficher la page de setting au client
    public function getSetting(){
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{        
        $id_client = session('id_client');
        $client = Client::find($id_client);
        return view('settings/settingClient')->with('client', $client);
        }
        }
    ////Afficher le dashboard client au client
    public function getDashboard(){
        if(!$this->isConnectedClient()){

            return view('authentifications/authentificationClient');

        }else{
        return view('dashboards/dashboardClient');
        }

    }
    ////Afficher la page de ajouter client au administrateur
    function addClient(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        return view('gestionClients/ajouterClient');
        }
    }
    /////Creation de client par administrateur
    public function creerClient(Request $request)
    {   if(!$this->isConnectedAdministrateur()){
        return view('authentifications/authentificationAdministrateur');
    }else{

        $client = new Client;
        $client->email = $request->Email;
        $client->nom = $request->Nom;
        $client->prenom = $request->Prenom;
        $client->telephone = $request->Telephone;
        $client->adresse = $request->Adresse;
        $client->password = bcrypt($request->Password);
        $client->save();
        $listClients= Client::all();
        return view('gestionClients/gestionClient')->with('listClients', $listClients);
    }
    }
    ////Changer les informations de client par administrateur
    public function modifyClient(Request $request,$id_client)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $client = Client::find($id_client);
        $client->email = $request->Email;
        $client->nom = $request->Nom;
        $client->prenom = $request->Prenom;
        $client->telephone = $request->Telephone;
        $client->adresse = $request->Adresse;
        $client->password = bcrypt($request->Password);
        $client->save();
        $listClients= Client::all();
        return view('gestionClients/gestionClient')->with('listClients', $listClients);
        }
    }
////Afficher la page de gestion client au administrateur
    public function gestionClient(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $listClients= Client::all();
        return view('gestionClients/gestionClient')->with('listClients', $listClients);
        }
      
    }
////Supprimer client par admin
    public function deleteClient($id_client)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $client = Client::find($id_client);
        
        if (!$client) {
            return redirect()->back()->with('error', 'Le client que vous essayez de supprimer n\'existe pas.');
        }
        
        $client->delete();
        
        return redirect()->back()->with('success', 'Le client a été supprimé avec succès.');
    }
    }
////Afficher la page de modification client par administrateur
    public function updateClient($id_client)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $client = Client::find($id_client);
        
        if (!$client) {
            return redirect()->back()->with('error', 'Le client que vous essayez de supprimer n\'existe pas.');
        }

        
        return view('gestionClients/modifierClient')->with('client',  $client);
    }
    }
////La page d'authentification des clients
    public function getAuthentificationClient(){
        return view('authentifications/authentificationClient');

    }
////La page de inscription pour client
    public function getCreateCompte(){
        return view('authentifications/creerCompteClient');

    }
////Verification authentification client
    public function verifierClient(Request $request)
    {
        $emailForm = $request->Email;
        $passwordForm = $request->Password;
    
        $client = Client::where('email', $emailForm)->first();
    
        if ($client && password_verify($passwordForm, $client->password)) {
            session(['id_client' => $client->id, 'nom_client' => $client->nom, 'prenom_client' => $client->prenom]);
            return view('dashboards/dashboardClient');
        } else {
            return view('authentifications/authentificationClient')->with('message', 'Email ou mot de passe incorrecte');
        }
    }
}
