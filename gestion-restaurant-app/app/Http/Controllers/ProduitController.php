<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
class ProduitController extends Controller
{
    function getProduits(){
        $listProduits= Produit::all();
        return view('menu')->with('listProduits', $listProduits);


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
        return view('gestionProduit')->with('produit', $listProduits);
      
    }
}
