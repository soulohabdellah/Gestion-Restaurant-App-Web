<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    //Changer les attributs de categorie par administrateur
    public function modifyCategorie(Request $request,$id_categorie)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $categorie = Categorie::find($id_categorie);
        $categorie->description = $request->Description;
        $categorie->nom = $request->Nom;
        
        $categorie->save();
        $listCategories= Categorie::all();
        return view('gestionCategories/gestionCategorie')->with('listCategories', $listCategories);
        }
    }
    ////Afficher les données a changer au administrateur
    public function updateCategorie($id_categorie)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $categorie = Categorie::find($id_categorie);
        
        if (!$categorie) {
            return redirect()->back()->with('error', 'La categorie que vous essayez de modifier n\'existe pas.');
        }
 
        return view('gestionCategories/modifierCategorie')->with('categorie',  $categorie);
    }
}
//Creation de categorie par administrateur
    public function creerCategorie(Request $request)
    {
        if(!$this->isConnectedAdministrateur()){
            return view('authentifications/authentificationAdministrateur');
        }else{
        $categorie = new Categorie;
        $categorie->nom = $request->Nom;
        $categorie->description = $request->Description;

        $categorie->save();
        $listCategories= Categorie::all();
        return view('gestionCategories/gestionCategorie')->with('listCategories', $listCategories);
        }
    }
    ////Affichage de page de ajouter produit pour administrateur
    function addCategorie(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{
        return view('gestionCategories/ajouterCategorie');
        }
    }
    ////Affichage de interface de gestion des categorie au administrateur
    function gestionCategorie(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $listCategories= Categorie::all();
        return view('gestionCategories/gestionCategorie')->with('listCategories', $listCategories);
        }
      
    }
    ////Suupression de categorie par administrateur
    public function deleteCategorie($id_categorie)
    {
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $categorie = Categorie::find($id_categorie);
        
        if (!$categorie) {
            return redirect()->back()->with('error', 'La categorie que vous essayez de supprimer n\'existe pas.');
        }
        
        $categorie->delete();
        
        return redirect()->back()->with('success', 'La categorie a été supprimé avec succès.');
        
    }
}
}
