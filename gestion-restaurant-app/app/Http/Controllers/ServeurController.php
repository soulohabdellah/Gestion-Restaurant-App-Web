<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serveur;
class ServeurController extends Controller
{
////Deconnexion de serveur
    public function getDeconnexion()
    {
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{

        session()->forget('id_serveur');
        session()->forget('nom_serveur');
        session()->forget('prenom_serveur');

        return view('authentifications/authentificationServeur');}
    }
    ////Changer les informations de serveur par le serveur
    function updateSetting(Request $request){
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{
        $id_serveur = session('id_serveur');
        $serveur = Serveur::find($id_serveur);
        $serveur->email = $request->Email;
        $serveur->nom = $request->Nom;
        $serveur->prenom = $request->Prenom;
        $serveur->telephone = $request->Telephone;
        $serveur->password = bcrypt($request->Password);
        $serveur->save();
        $message="Bien modifié";
        return view('settings/settingServeur')->with(['serveur' => $serveur, 'message' => $message]);
        }
    }
    ////Affichage de page de setting au serveur
    public function getSetting(){
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{
        $id_serveur = session('id_serveur');
        $serveur = Serveur::find($id_serveur);
        return view('settings/settingServeur')->with('serveur', $serveur);
        }

    }
    ////Affichage de dashboard de serveur
    public function getDashboard(){
        if(!$this->isConnectedServeur()){

            return view('authentifications/authentificationServeur');

        }else{
        return view('dashboards/dashboardServeur');
        }
    }
    ////Affichage de l'ajout de serveur par administrateur
    function addServeur(){
        if(!$this->isConnectedAdministrateur()){
            return view('authentifications/authentificationAdministrateur');
        }else{
        return view('gestionServeurs/ajouterServeur');
        }
    }
    ////Creation de serveur par administrateur
    public function creerServeur(Request $request)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $serveur = new Serveur;
        $serveur->email = $request->Email;
        $serveur->nom = $request->Nom;
        $serveur->prenom = $request->Prenom;
        $serveur->telephone = $request->Telephone;
        $serveur->CIN = $request->CIN;
        $serveur->date_recrutement = $request->date_recrutement;
        $serveur->password = bcrypt($request->Password);
        $serveur->save();
        $listServeurs= Serveur::all();
        return view('gestionServeurs/gestionServeur')->with('listServeurs', $listServeurs);
        }
    }
    ////Modification des données de serveur par administrateur
    public function modifyServeur(Request $request,$id_serveur)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $serveur = Serveur::find($id_serveur);
        $serveur->email = $request->Email;
        $serveur->nom = $request->Nom;
        $serveur->prenom = $request->Prenom;
        $serveur->telephone = $request->Telephone;
        $serveur->CIN = $request->CIN;
        $serveur->date_recrutement = $request->date_recrutement;
        $serveur->password = bcrypt($request->Password);
        $serveur->save();
        $listServeur= Serveur::all();
        return view('gestionServeurs/gestionServeur')->with('listServeurs', $listServeur);
    }
}
////Affichage de page de gestion des serveurs par administrateur
    public function gestionServeur(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $listServeurs= Serveur::all();
        return view('gestionServeurs/gestionServeur')->with('listServeurs', $listServeurs);
      
    }
}
////Suppression serveur par administrateur
    public function deleteServeur($id_serveur)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $serveur = Serveur::find($id_serveur);
        
        if (!$serveur) {
            return redirect()->back()->with('error', 'Le serveur que vous essayez de supprimer n\'existe pas.');
        }
        
        $serveur->delete();
        
        return redirect()->back()->with('success', 'Le serveur a été supprimé avec succès.');
    }
}
////Affichage la page de modification de serveur par administrateur
    public function updateServeur($id_serveur)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $serveur = Serveur::find($id_serveur);
        
        if (!$serveur) {
            return redirect()->back()->with('error', 'Le serveur que vous essayez de supprimer n\'existe pas.');
        }

        
        return view('gestionServeurs/modifierServeur')->with('serveur',  $serveur);
    }
}
////Affichage la page authentification au serveurs
    public function getAuthentificationServeur(){
        return view('authentifications/authentificationServeur');

    }
////Verification de identité de authentification de serveur
    public function verifierServeur(Request $request)
    {
        $emailForm = $request->Email;
        $passwordForm = $request->Password;
    
        $serveur = Serveur::where('email', $emailForm)->first();
    
        if ($serveur && password_verify($passwordForm, $serveur->password)) {
            session(['id_serveur' => $serveur->id, 'nom_serveur' => $serveur->nom, 'prenom_serveur' => $serveur->prenom]);
            return view('dashboards/dashboardServeur');
        } else {
            return view('authentifications/authentificationServeur')->with('message', 'Email ou mot de passe incorrecte');
        }
    }
    
}
