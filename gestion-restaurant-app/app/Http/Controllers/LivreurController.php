<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livreur;
class LivreurController extends Controller
{
    function isConnected(){
       
        if(session('id_livreur')){
            return true;
        }else{
            return false;
        }
    }
    public function getDeconnexion()
    {
        session()->forget('id_livreur');
        session()->forget('nom_livreur');
        session()->forget('prenom_livreur');

        return view('authentifications/authentificationLivreur');
    }
    function updateSetting(Request $request){
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
    public function getSetting(){
        $id_livreur = session('id_livreur');
        $livreur = Livreur::find($id_livreur);
        return view('settings/settingLivreur')->with('livreur', $livreur);

    }
    public function getDashboard(){
        return view('dashboards/dashboardLivreur');

    }
    function addLivreur(){
        return view('gestionLivreurs/ajouterLivreur');
    }
    public function creerLivreur(Request $request)
    {

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
    public function modifyLivreur(Request $request,$id_livreur)
    {

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

    public function gestionLivreur(){
        $listlivreurs= Livreur::all();
        return view('gestionLivreurs/gestionLivreur')->with('listLivreurs', $listlivreurs);
      
    }

    public function deleteLivreur($id_livreur)
    {
        $livreur = Livreur::find($id_livreur);
        
        if (!$livreur) {
            return redirect()->back()->with('error', 'Le livreur que vous essayez de supprimer n\'existe pas.');
        }
        
        $livreur->delete();
        
        return redirect()->back()->with('success', 'Le livreur a été supprimé avec succès.');
    }

    public function updateLivreur($id_livreur)
    {
        $livreur = Livreur::find($id_livreur);
        
        if (!$livreur) {
            return redirect()->back()->with('error', 'Le livreur que vous essayez de supprimer n\'existe pas.');
        }

        
        return view('gestionLivreurs/modifierLivreur')->with('livreur',  $livreur);
    }
    public function getAuthentificationLivreur(){
        return view('authentifications/authentificationLivreur');

    }
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
