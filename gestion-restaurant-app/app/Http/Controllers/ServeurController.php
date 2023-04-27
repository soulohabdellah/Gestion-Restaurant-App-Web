<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serveur;
class ServeurController extends Controller
{
    function isConnected(){
       
        if(session('id_serveur')){
            return true;
        }else{
            return false;
        }
    }
    public function getDeconnexion()
    {
        session()->forget('id_serveur');
        session()->forget('nom_serveur');
        session()->forget('prenom_serveur');

        return view('authentifications/authentificationServeur');
    }
    function updateSetting(Request $request){
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
    public function getSetting(){
        $id_serveur = session('id_serveur');
        $serveur = Serveur::find($id_serveur);
        return view('settings/settingServeur')->with('serveur', $serveur);

    }
    public function getDashboard(){
        return view('dashboards/dashboardServeur');

    }
    function addServeur(){
        return view('gestionServeurs/ajouterServeur');
    }
    public function creerServeur(Request $request)
    {

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
    public function modifyServeur(Request $request,$id_serveur)
    {

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

    public function gestionServeur(){
        $listServeurs= Serveur::all();
        return view('gestionServeurs/gestionServeur')->with('listServeurs', $listServeurs);
      
    }

    public function deleteServeur($id_serveur)
    {
        $serveur = Serveur::find($id_serveur);
        
        if (!$serveur) {
            return redirect()->back()->with('error', 'Le serveur que vous essayez de supprimer n\'existe pas.');
        }
        
        $serveur->delete();
        
        return redirect()->back()->with('success', 'Le serveur a été supprimé avec succès.');
    }

    public function updateServeur($id_serveur)
    {
        $serveur = Serveur::find($id_serveur);
        
        if (!$serveur) {
            return redirect()->back()->with('error', 'Le serveur que vous essayez de supprimer n\'existe pas.');
        }

        
        return view('gestionServeurs/modifierServeur')->with('serveur',  $serveur);
    }
    public function getAuthentificationServeur(){
        return view('authentifications/authentificationServeur');

    }
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
