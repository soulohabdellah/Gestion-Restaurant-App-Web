<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    function isConnected(){
       
        if(session('id_client')){
            return true;
        }else{
            return false;
        }
    }
    public function getDeconnexion()
    {
        session()->forget('id_client');
        session()->forget('nom_client');
        session()->forget('prenom_client');

        return view('authentifications/authentificationClient');
    }
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
    
    function updateSetting(Request $request){
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
    public function getSetting(){
        if($this->isConnected()){
        $id_client = session('id_client');
        $client = Client::find($id_client);
        return view('settings/settingClient')->with('client', $client);
        }else{
            return redirect('authentification-client');
        }}

    
    public function getDashboard(){
        return view('dashboards/dashboardClient');

    }
    function addClient(){
        return view('gestionClients/ajouterClient');
    }
    public function creerClient(Request $request)
    {

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
    public function modifyClient(Request $request,$id_client)
    {

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

    public function gestionClient(){
        $listClients= Client::all();
        return view('gestionClients/gestionClient')->with('listClients', $listClients);
      
    }

    public function deleteClient($id_client)
    {
        $client = Client::find($id_client);
        
        if (!$client) {
            return redirect()->back()->with('error', 'Le client que vous essayez de supprimer n\'existe pas.');
        }
        
        $client->delete();
        
        return redirect()->back()->with('success', 'Le client a été supprimé avec succès.');
    }

    public function updateClient($id_client)
    {
        $client = Client::find($id_client);
        
        if (!$client) {
            return redirect()->back()->with('error', 'Le client que vous essayez de supprimer n\'existe pas.');
        }

        
        return view('gestionClients/modifierClient')->with('client',  $client);
    }

    public function getAuthentificationClient(){
        return view('authentifications/authentificationClient');

    }
    public function getCreateCompte(){
        return view('authentifications/creerCompteClient');

    }
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
