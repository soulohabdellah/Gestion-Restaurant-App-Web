<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function searchClient(Request $request){
        if($request->input('categorie')){
            $listProduits = Produit::where('id_categorie', $request->input('categorie'))->get();


        }else if($request->Search){
            $listProduits = Produit::where('nom', $request->Search)->get();
        }
        
        $listCategorie= Categorie::all();
        return view('menu')->with([
            'listProduits' => $listProduits,
            'listCategorie' => $listCategorie
        ]);

    }
    public function updateProduit($id_produit)
    {
        $produit = Produit::find($id_produit);
        $listCategorie= Categorie::all();
        if (!$produit) {
            return redirect()->back()->with('error', 'Le produit que vous essayez de modifier n\'existe pas.');
        }
 
        return view('gestionProduits/modifierProduit')->with([
            'produit' => $produit,
            'listCategorie' => $listCategorie
        ]);
    }

    public function deleteProduit($id_produit)
    {
        $produit = Produit::find($id_produit);
        
        if (!$produit) {
            return redirect()->back()->with('error', 'Le produit que vous essayez de supprimer n\'existe pas.');
        }
        
        $produit->delete();
        
        return redirect()->back()->with('success', 'Le produit a été supprimé avec succès.');
    }

    public function modifyProduit(Request $request, $id_produit)
    {

        $produit = Produit::find($id_produit);
        $produit->nom = $request->Nom;
        $produit->description = $request->Description;
        $uploadedFile = $request->file('Image');
        if ($uploadedFile) {
            $uploadedFileUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            $produit->image = $uploadedFileUrl;
        }
        $produit->temp = $request->input('Temp');
        $produit->frite = $request->input('Frite') ? true : false;
        $produit->boisson = $request->input('Boisson') ? true : false;
        $produit->sauce = $request->input('Sauce') ? true : false;
        $produit->prix = $request->Prix;
        $produit->count_in_stock = $request->Count;
        $produit->id_categorie = $request->categorie;
        $produit->save();
        $listProduits = Produit::all();
        return view('gestionProduits/gestionProduit')->with('listProduits', $listProduits);
    }

    function creerProduit(Request $request)
    {
        $produit = new Produit;
        $produit->nom = $request->Nom;
        $produit->description = $request->Description;
        if ($request->hasFile('Image') && $request->file('Image')->isValid()) {
            $uploadedFileUrl = Cloudinary::upload($request->file('Image')->getRealPath())->getSecurePath();
            $produit->image = $uploadedFileUrl;
        } else {
            return redirect()->back()->with('error', 'Le fichier image n\'a pas été correctement téléchargé.');
        }
        $produit->temp = $request->input('Temp');

        $produit->frite = $request->input('Frite') ? true : false;
        $produit->boisson = $request->input('Boisson') ? true : false;
        $produit->sauce = $request->input('Sauce') ? true : false;
        $produit->prix = $request->Prix;
        $produit->count_in_stock = $request->Count;
        $produit->id_categorie = $request->categorie;
        $produit->save();
        $listProduits = Produit::all();
        return view('gestionProduits/gestionProduit')->with('listProduits', $listProduits);
    }

    function addProduit()
    {
        $listCategorie = Categorie::all();
        return view('gestionProduits/ajouterProduit')->with('listCategorie', $listCategorie);
    }
    function getProduits(Request $request){
        if($request->input('categorie')){
            $listProduits = Produit::where('id_categorie', $request->input('categorie'))->get();


        }else{
            $listProduits= Produit::all();
        }
        
        $listCategorie= Categorie::all();
        return view('menu')->with([
            'listProduits' => $listProduits,
            'listCategorie' => $listCategorie
        ]);


    }
    function getProduit($id_produit){
        $produit = Produit::find($id_produit);
        return view('produit')->with('produit', $produit);
      
    }
    function getPanier(){
        $listProduits= Produit::all();
        return view('panier')->with('produit', $listProduits);
      
    }
    function gestionProduit(){
        $listProduits= Produit::all();
        return view('gestionProduits/gestionProduit')->with('listProduits', $listProduits);
      
    }
}
