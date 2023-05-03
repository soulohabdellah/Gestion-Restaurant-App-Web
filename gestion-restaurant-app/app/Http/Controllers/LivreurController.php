<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livreur;
class LivreurController extends Controller
{
////Deconnexion livreur
    public function getDeconnexion()
    {
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
        session()->forget('id_livreur');
        session()->forget('nom_livreur');
        session()->forget('prenom_livreur');

        return view('authentifications/authentificationLivreur');
        }
    }
////Changer les attributs de livreur par livreur
    function updateSetting(Request $request){
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
        $id_livreur = session('id_livreur');
        $livreur = Livreur::find($id_livreur);
        $livreur->email = $request->Email;
        $livreur->nom = $request->Nom;
        $livreur->prenom = $request->Prenom;
        $livreur->telephone = $request->Telephone;
        $livreur->password = bcrypt($request->Password);
        $livreur->save();
        $message="Bien modifié";
        return view('settings/settingLivreur')->with(['livreur' => $livreur, 'message' => $message]);
    }
}
    ////Affichage de page setting pour livreur
    public function getSetting(){
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
        $id_livreur = session('id_livreur');
        $livreur = Livreur::find($id_livreur);
        return view('settings/settingLivreur')->with('livreur', $livreur);
        }

    }
    ////Affichage dashboard de livreur au livreur
    public function getDashboard(){
        if(!$this->isConnectedLivreur()){

            return view('authentifications/authentificationLivreur');

        }else{
        return view('dashboards/dashboardLivreur');
        }

    }
    ////Affichage de page d'ajout de livreur au administrateur
    function addLivreur(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        return view('gestionLivreurs/ajouterLivreur');
        }
    }
    ////Ajouter livreur au base de donnée par administrateur
    public function creerLivreur(Request $request)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $livreur = new Livreur;
        $livreur->email = $request->Email;
        $livreur->nom = $request->Nom;
        $livreur->prenom = $request->Prenom;
        $livreur->telephone = $request->Telephone;
        $livreur->CIN = $request->CIN;
        $livreur->date_recrutement = $request->date_recrutement;
        $livreur->password = bcrypt($request->Password);
        $livreur->save();
        $listlivreurs= Livreur::all();
        return view('gestionLivreurs/gestionLivreur')->with('listLivreurs', $listlivreurs);
        }
    }
    ////Modifier les attributs de livreur par administrateur
    public function modifyLivreur(Request $request,$id_livreur)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $livreur = Livreur::find($id_livreur);
        $livreur->email = $request->Email;
        $livreur->nom = $request->Nom;
        $livreur->prenom = $request->Prenom;
        $livreur->telephone = $request->Telephone;
        $livreur->CIN = $request->CIN;
        $livreur->date_recrutement = $request->date_recrutement;
        $livreur->password = bcrypt($request->Password);
        $livreur->save();
        $listlivreur= Livreur::all();
        return view('gestionLivreurs/gestionLivreur')->with('listLivreurs', $listlivreur);
        }
    }
////Affichage de page de gestion des livreurs au administrateur
    public function gestionLivreur(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $listlivreurs= Livreur::all();
        return view('gestionLivreurs/gestionLivreur')->with('listLivreurs', $listlivreurs);
        }
      
    }
////Suppression livreur par administrateur
    public function deleteLivreur($id_livreur)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $livreur = Livreur::find($id_livreur);
        
        if (!$livreur) {
            return redirect()->back()->with('error', 'Le livreur que vous essayez de supprimer n\'existe pas.');
        }
        
        $livreur->delete();
        
        return redirect()->back()->with('success', 'Le livreur a été supprimé avec succès.');
    }
}
////Affichage de page de modification du livreur au administrateur
    public function updateLivreur($id_livreur)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        $livreur = Livreur::find($id_livreur);
        
        if (!$livreur) {
            return redirect()->back()->with('error', 'Le livreur que vous essayez de modifier n\'existe pas.');
        }

        
        return view('gestionLivreurs/modifierLivreur')->with('livreur',  $livreur);
    }
}
////Affichage authentification pour livreur
    public function getAuthentificationLivreur(){
        return view('authentifications/authentificationLivreur');

    }
////Verification identité de livreur
    public function verifierLivreur(Request $request)
    {
        $emailForm = $request->Email;
        $passwordForm = $request->Password;
    
        $livreur = Livreur::where('email', $emailForm)->first();
    
        if ($livreur && password_verify($passwordForm, $livreur->password)) {
            session(['id_livreur' => $livreur->id, 'nom_livreur' => $livreur->nom, 'prenom_livreur' => $livreur->prenom]);
            return view('dashboards/dashboardLivreur');
        } else {
            return view('authentifications/authentificationLivreur')->with('message', 'Email ou mot de passe incorrecte');
        }
    }
}
