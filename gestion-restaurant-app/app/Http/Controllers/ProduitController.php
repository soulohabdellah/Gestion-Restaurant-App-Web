<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
class ProduitController extends Controller
{
    function getProduits(){
        $listProduits= Produit::all();
        return view('home')->with('listProduits', $listProduits);


    }
    function getProduit($id_produit){
        $produit = Produit::where('id_produit', $id_produit)->first();
        return view('produit')->with('produit', $produit);
      
    }
}
