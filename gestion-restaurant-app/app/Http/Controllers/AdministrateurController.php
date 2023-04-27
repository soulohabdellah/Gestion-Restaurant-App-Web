<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;

class AdministrateurController extends Controller
{
    function isConnected(){
       
        if(session('id_administrateur')){
            return true;
        }else{
            return false;
        }
    }
    public function getDeconnexion()
    {
        session()->forget('id_administrateur');
        session()->forget('name_administrateur');


        return view('authentifications/authentificationClient');
    }
    function updateSetting(Request $request){
        $id_administrateur = session('id_administrateur');
        $administrateur = Administrateur::find($id_administrateur);
        $administrateur->email = $request->Email;
        $administrateur->name = $request->Name;
       
        $administrateur->password = bcrypt($request->Password);
        $administrateur->save();
        $message="Bien modifié";
        return view('settings/settingAdministrateur')->with(['administrateur' => $administrateur, 'message' => $message]);
    }
    public function getSetting(){
        $id_administrateur = session('id_administrateur');
        $administrateur = Administrateur::find($id_administrateur);
        return view('settings/settingAdministrateur')->with('administrateur', $administrateur);

    }
    public function getAuthentificationAdministrateur(){
        return view('authentifications/authentificationAdministrateur');

    }
    public function getDashboard(){
        return view('dashboards/dashboardAdmin');

    }
    public function verifierAdministrateur(Request $request)
    {
        $emailForm = $request->Email;
        $passwordForm = $request->Password;
    
        $administrateur = Administrateur::where('email', $emailForm)->first();
    
        if ($administrateur && password_verify($passwordForm, $administrateur->password)) {
            session(['id_administrateur' => $administrateur->id, 'name_administrateur' => $administrateur->name]);
            return view('dashboards/dashboardAdmin');
        } else {
            return view('authentifications/authentificationAdministrateur')->with('message', 'Email ou mot de passe incorrecte');
        }
    }
}
