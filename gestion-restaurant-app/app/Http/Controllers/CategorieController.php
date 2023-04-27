<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    public function modifyCategorie(Request $request,$id_categorie)
    {

        $categorie = Categorie::find($id_categorie);
        $categorie->description = $request->Description;
        $categorie->nom = $request->Nom;
        
        $categorie->save();
        $listCategories= Categorie::all();
        return view('gestionCategories/gestionCategorie')->with('listCategories', $listCategories);
    }
    public function updateCategorie($id_categorie)
    {
        $categorie = Categorie::find($id_categorie);
        
        if (!$categorie) {
            return redirect()->back()->with('error', 'La categorie que vous essayez de modifier n\'existe pas.');
        }
 
        return view('gestionCategories/modifierCategorie')->with('categorie',  $categorie);
    }
    public function creerCategorie(Request $request)
    {

        $categorie = new Categorie;
        $categorie->nom = $request->Nom;
        $categorie->description = $request->Description;

        $categorie->save();
        $listCategories= Categorie::all();
        return view('gestionCategories/gestionCategorie')->with('listCategories', $listCategories);
    }
    function addCategorie(){
        return view('gestionCategories/ajouterCategorie');
    }
    function gestionCategorie(){
        $listCategories= Categorie::all();
        return view('gestionCategories/gestionCategorie')->with('listCategories', $listCategories);
      
    }
    public function deleteCategorie($id_categorie)
    {
        $categorie = Categorie::find($id_categorie);
        
        if (!$categorie) {
            return redirect()->back()->with('error', 'La categorie que vous essayez de supprimer n\'existe pas.');
        }
        
        $categorie->delete();
        
        return redirect()->back()->with('success', 'La categorie a été supprimé avec succès.');
    }
}
